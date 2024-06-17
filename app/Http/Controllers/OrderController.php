<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::get()->all();

        return view('admin.orders.list_orders', compact('orders'));
    }

    public function list_orders()
    {
        $user = Auth::user();
          
        return view('dashboard');
    }

    public function check_out_cart()
    {
        $user = Auth::user();
        $cart = app(CartController::class)->calculate_cart_totals();

        if(empty($cart['items'])){
            return redirect()->route('service')->with('error' , [
                'message' => 'Oops! you don\'t any service in the cart to checkout',
                'duration' => $this->alert_message_duration,
            ]); 

        }else{

            return view('checkout', compact('cart', 'user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function post_checkout(Request $request)
    {
        $validated_data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'additional_infromation' => 'nullable|string',
        ]);

        //generating an order_number and getting user_id
        $order_number = 'Order/' . Str::random(5);
        $user_id = Auth::user()->id;

        //retrieve the session
        $cart = Session::get('cart', []);

        $cart = app(CartController::class)->calculate_cart_totals();
        $cart_total = $cart['sub_total'];

        //creating the Order in the database
        $order = Order::create([
            'order_number' => $order_number,
            'user_id' => $user_id,
            'first_name'=> $validated_data['first_name'],
            'last_name' => $validated_data['last_name'],
            'email' => $validated_data['email'],
            'phone_number' => $validated_data['phone_number'],
            'cart_items' => json_encode($cart),
            'additional_infromation' => $validated_data['additional_infromation'],
        ]); 

        Session::forget('cart', $cart);
        Session::forget('cart_count', array_sum(array_column($cart, 'quantity')));

        return redirect()->route('post_order');
    }

    public function post_order()
    {
        $order_number = Session('order_number');

        return view('post_order', compact('order_number'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
