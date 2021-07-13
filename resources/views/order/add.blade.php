@extends('layouts.layouts')

@section('title', 'order.add')

@section('content')
    <form action="/order/add" method="post">
        <table>
            @csrf
            <tr>
                <th>item_id: </th>
                <td>
                    <select name="item_id">
                        <option hidden>選択してください</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} (残 : {{ $item->left_amount }})
                            </option>
                        @endforeach
                    </select>
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
    @if (Auth::check())
        <p>USER: {{ $user->id }}</p>
        <p>USER: {{ $user->name }}</p>
    @endif
    <p>{{ $item->left_amount }}</p>
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
