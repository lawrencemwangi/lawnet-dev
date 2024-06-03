<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
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
        //
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
    public function store(Request $request)
    {
        $validated =$request->vlaidate([
            'additional_infromation' => 'nullable|max:120',
        ]);

        $order = new Order;

        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->phone_number = $request->input('phone_number');
        $order->json_encode('cart');
        $order->additional_infromation = $request->input('additional_infromation');

        $order->save();

        return redirect()->route('')->with('success', [
            'message' => 'Order placed successfully',
            'duration' => $this->alert_message_message,
        ]);
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
