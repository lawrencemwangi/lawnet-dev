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
        return view('cart');
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

            //it it does exist it add a new quantity to the cart
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
