<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')
        
        <div class="admin">
            <h1>Orders</h1>
              
            <table>
                <thead>
                    <th>Order numbr</th>
                    <th>Names</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Status</th>
                    <th>Paid</th>
                    <th>Action</th>
                </thead>
                <tbody class="searchable">
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->first_name }}  {{ $order->last_name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td  class="{{ $order->status == 'pending' ? 'text-danger' : 'text-success'  }}">{{ $order->status }}</td>
                        <td>{{ $order->paid == 0 ? 'No' : 'Yes' }}</td>
                        <td>
                            <div class="icons">
                                <a href="#">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form id="deleteForm_" action="#" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="javascript:void(0);" onclick="deleteItem();">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>