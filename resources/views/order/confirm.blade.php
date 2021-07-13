@extends('layouts.layouts')

@section('title', 'order.add')

@section('content')
    <form action="/order/add" method="post">
        <table>
            @csrf
            <tr>
                <th>item_id: </th>
                <td>
                    <input type="number" name="item_id">
                </td>
            </tr>
            <tr>
                <th>item_amount: </th>
                <td>
                    <input type="number" name="item_amount">
                </td>
            </tr>
            <tr>
                <th>order_total_price: </th>
                <td>
                    <input type="number" name="order_total_price">
                </td>
            </tr>
            <tr>
                <th>user_id: </th>
                <td>
                    <input type="number" name="user_id">
                </td>
            </tr>
            <tr>
                <th>order_status: </th>
                <td>
                    <input type="number" name="order_status">
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
    <a href="http://localhost/item">Index</a></br>
    <a href="http://localhost/item/find">Find</a></br>
    <a href="http://localhost/item/add">Add</a></br>
    <a href="http://localhost/item/edit?id=1">Edit(id=1)</a></br>
    <a href="http://localhost/item/delete?id=1">Delete(id=1)</a></br>
@endsection

@section('footer')
    copyright T.K.
@endsection
