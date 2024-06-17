<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">

        <div class="order_container">
           <div class="order_items">
                <p>Your  order <strong> Order/As2wK </strong> has been placed successfully thanks for placing the order</p>
            
                <div class="button">
                    <button type="submit">
                        <a href="{{ route('list_orders') }}">View Order</a>
                    </button>
                    <button type="submit">
                        <a href="{{ route('service') }}">Continue Shopping</a>
                    </button>
                </div>
           </div>
        </div>
    </div>
    @include('partials.footer')
</x-app-layout>