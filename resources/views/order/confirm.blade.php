@extends('layouts.layouts')

@section('title', 'order.confirm')

@section('content')
    <h3>この内容で登録します。よろしいですか？</h3>
    <form action="/order/add" method="post">
        <table>
            @csrf
            <tr>
                <th>item_name: </th>
                <td>
                    {{ $item->name }}
                    <input name="item_id" type="number" value="{{ $request->item_id }}">
                </td>

            </tr>
            <tr>
                <th>item_amount: </th>
                <td>
                    {{ $quantity }}
                    <input type="number" name="item_amount" value="{{ $quantity }}">
                </td>
            </tr>
            <tr>
                <th>order_total_price: </th>
                <td>
                    ¥ {{ $total_price }} (税込)
                    <input type="number" name="order_total_price" value="{{ $total_price }}">
                </td>
            </tr>
            <tr>
                <th>user_id: </th>
                <td>
                    {{ $user->name }}
                    <input type="number" name="user_id" value="{{ $user->id }}">
                </td>
            </tr>
            <tr>
                <th>order_status: </th>
                <td>
                    <input type="number" name="order_status" value="0">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="send">
                </td>
            </tr>
        </table>
    </form>
@endsection

@section('dev')
    <a href="http://localhost/order">Index</a></br>
    <a href="http://localhost/order/find">Find</a></br>
    <a href="http://localhost/order/add">Add</a></br>
    <a href="http://localhost/order/edit?id=1">Edit(id=1)</a></br>
    <a href="http://localhost/order/delete?id=1">Delete(id=1)</a></br>
@endsection

@section('footer')
    copyright T.K.
@endsection
