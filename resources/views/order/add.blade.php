@extends('layouts.layouts')

@section('title', 'order.add')

@section('content')
    <h4>注文する商品と数を入力して下さい</h4>
    <form action="/order/add_confirm" method="post">
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
