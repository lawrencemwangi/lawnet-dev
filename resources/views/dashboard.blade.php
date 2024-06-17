<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <h1>List Orders</h1>

        <div class="order_container">
            <p>You have made <span class="items">1</span> Order</p>

            <div class="order_content">
                {{-- @foreach ($orders as $order) --}}
                    <ul>
                        <li>
                            <span class="order_number">
                                <span>orderASCX</span>
                            </span>

                            <span class="title" >
                                <span>Html</span>
                            </span>

                            <span class="price">
                                <span class="currency">Ksh. </span>
                                <span class="total_price">5,000</span>
                            </span>
                            
                            <span class="quantity">
                                <span class="quantities">2</span>
                            </span>

                            <span class="total_price">
                                <span class="currency">ksh. </span>
                                <span class="totals">30,000</span>
                            </span>

                            <div class="invoice">
                                <a href="#">Invoice</a>
                            </div>
                        </li>
                    </ul>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>