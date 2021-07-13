@extends('layouts.layouts')

@section('title', 'Order.result')

@section('content')
    {{-- <table>
        <tr>
            <th>ID</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Order Amount</th>
            <th>Total Price</th>
            <th>Order User ID</th>
            <th>Order User Name</th>
            <th>Order Status</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->item_id }}</td>
                <td>
                    @if ($order->item != null)
                        {{ $order->item->getData()->name }}
                    @endif
                </td>
                <td>{{ $order->item_amount }}</td>
                <td>{{ $order->order_total_price }}</td>
                <td>{{ $order->user_id }}</td>
                <td>
                    @if ($order->user != null)
                        {{ $order->user->getData() }}
                    @endif
                </td>
                <td>{{ $order->order_status }}</td>
            </tr>
        @endforeach
    </table> --}}
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Left</th>
        </tr>
        @if (isset($item))
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->left_amount }}</td>
            </tr>

        @endif
    </table>
    <p>{{ $item }}</p>
    <p>発注前在庫量：{{ $storage }}</p>
    <p>発注量：{{ $quantity }}</p>
    </br>
    <p>発注後在庫量：{{ $result }}</p>
@endsection

@section('dev')
    <a href="http://localhost/order">Index</a></br>
    <a href="http://localhost/order/add">Add</a></br>
    <a href="http://localhost/order/edit?id=1">Edit(id=1)</a></br>
    <a href="http://localhost/order/delete?id=1">Delete(id=1)</a></br>
@endsection

@section('footer')
    copyright T.K.
@endsection
