<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = $this->calculate_cart_totals();
        return view('cart',compact('cart'));
    }


    public function add_to_cart($serviceId)
    {
        //checking of the service id if it exist it continues else it give an error
        $service = Service::find($serviceId);

        if(!$service){
            return redirect()->route('service')->with('error', [
                'message' => 'Service not found',
                'duration' => $this->alert_message_duration,
            ]);
        }

        $cart = Session::get('cart', []);

        //if the service exist in the cart it should increment the quantity
        if(isset($cart[$serviceId])){
            if (!isset($cart[$serviceId]['quantity'])) {
                $cart[$serviceId]['quantity'] = 1;
            } else {
                $cart[$serviceId]['quantity']++;
            }
        }else{

            //if it does not exist a new quantity is add to the cart
            $cart[$serviceId] = [
                'id' => $service->id,
                'title' => $service->title,
                'slug' => $service->slug,
                'price' => $service->price,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);
        Session::put('cart_count', array_sum(array_column($cart, 'quantity')));

        
        return redirect()->back()->with('success', [
            'message' => 'Service add to cart successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    public function Change_quantity( request $request , $serviceId )
    {
        $request->validate([
            'quantity' => ['required', 'numeric', 'min:1'],
        ]);
        
        $cart = Session::get('cart', []);

        foreach($cart as &$service){
            if($service['id'] == $serviceId){
                $service['quantity'] = $request->input('quantity');
                $service['totals'] = $service['price'] * $service['quantity'];
                break;
            }
        }

        Session::put('cart', $cart);
        Session::put('cart_count', array_sum(array_column($cart, 'quantity')));

        
        return redirect()->route('cart')->with('success', [
            'message' => 'Quantity updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    
    public function calculate_cart_totals()
    {
        $cart = ['items' => []];
        $sub_total = 0;

        foreach(Session::get('cart', []) as $serviceId => $item){
            $price = $item['price'];

            $item['totals'] = $item['price'] * $item['quantity'];
            $sub_total  += $item['totals'];
            $cart['items'] [$serviceId] =$item;
        }

        $cart['sub_total'] = $sub_total;

        return $cart;
    }


    public function delete_cart_item( $serviceId )
    {
        $cart = Session::get('cart', []);

        if(isset($cart[$serviceId])){
            unset($cart[$serviceId]);

            Session::put('cart', $cart);
            Session::put('cart_count', array_sum(array_column($cart, 'quantity')));

            return redirect()->route('cart')->with('success', [
                'message' => 'service deleted from the cart successfully',
                'duration' => $this->alert_message_duration,
            ]);
        }
    }
}

