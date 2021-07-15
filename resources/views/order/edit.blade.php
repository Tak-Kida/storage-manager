@extends('layouts.layouts')

@section('title', 'Order.edit')

@section('content')
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/order/edit_confirm" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{ $order->id }}">
            <tr>
                <th>Item Name: </th>
                <td>
                    <select name="item_id">
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $order->item_id) selected @endif>{{ $item->id }}: {{ $item->name }} (残 :
                                {{ $item->left_amount }})
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Order Amount: </th>
                <td><input type="number" name="item_amount" value="{{ $order->item_amount }}"></td>
            </tr>
            <tr>
                <th>Order Status: </th>
                <td><select type="number" name="order_status">
                        @foreach ([1, 2, 3, 4] as $number)
                            <option value="{{ $number }}" @if ($number == $order->order_status) selected @endif>{{ $status_name[$number] }}
                            </option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
    <form action="/order/delete" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{ $order->id }}">
            <input type="hidden" name="item_id" value="{{ $order->item_id }}">
            <tr>
                <th>Order Amount:</th>
                <td><input type="submit" value="delete"></td>
            </tr>
        </table>
    </form>
    <p>{{ $order }}</p>
    <p>{{ $item }}</p>
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
