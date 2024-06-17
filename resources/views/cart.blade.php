<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <h1>Cart</h1>
        <p>You have <span class="items" >{{ Session::get('cart_count', 0) }} </span>Services  in your cart</p>

        <div class="cart_container">
            <div class="cart_content">
                @foreach ($cart['items'] as $service)
                <ul>
                    <li class="cart-item" data-item-id="{{ $service['id'] }}">
                        <span class="title">
                            <span>{{ $service['title']}}</span>
                        </span>

                        <span class="price">
                            <span class="currency">Ksh. </span>
                            <span class="total_price">{{ $service['price'] }}</span>
                        </span>

                        <span class="quantity">
                            <form class="service_form" action="{{ route('update_cart', $service['id']) }}" method="post">
                                @csrf
                                
                                <input type="number" class="service_quantity" name="quantity"  min="1" value="{{ $service['quantity'] }}" >
                            </form>
                        </span>

                        <span class="totals">
                            <span class="currency">Ksh. </span>
                            <span class="sub_total">{{ number_format($service['price'] * $service['quantity'], 2) }}</span>
                        </span>

                        <span class="delete_service" >
                            <form action="{{ route('delete_cart_item', $service['id']) }}" method="post">
                                @csrf

                                <button type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </span>
                    </li>
                </ul>
                @endforeach
            </div>

            <div class="cart_checkout">
                <h3>Order Summary</h3>
                <p>
                    <span>Cart Totals</span>
                    <span class="price">ksh. {{ number_format($cart['sub_total'], 2) }}</span>
                </p>

                <div class="check_out">
                    <a href="{{ route('check_out') }}">Check Out</a>
                </div>                
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script>   
        $(document).ready(function() {
            function updateTotalPrice() {
                let grandTotal = 0;
                $('.cart-item').each(function() {
                    const quantity = parseInt($(this).find('.service_quantity').val());
                    const price = parseFloat($(this).find('.total_price').text());
                    const totalPrice = quantity * price;
                    $(this).find('.sub_total').text(totalPrice.toFixed(2));
                    grandTotal += totalPrice;
                });
                $('#cart_total').text(grandTotal.toFixed(2));
            }

            function sendUpdateRequest(item, quantity) {
                const itemId = item.data('item-id');
                $.ajax({
                    url: '/change-quantity/' + itemId,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        quantity: quantity
                    },
                    success: function(response) {
                        console.log('Quantity updated successfully');
                        updateTotalPrice();
                    },
                    error: function() {
                        console.log('Error updating quantity');
                    }
                });
            }
        });
    </script>
</x-app-layout>