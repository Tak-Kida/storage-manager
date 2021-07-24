@extends('layouts.layout')

@section('title', '注文の確認')

@section('content')
    <h3>この内容で登録します。よろしいですか？</h3>
    <form action="/order/add" method="post">
        <table>
            @csrf
            <tr>
                <th>商品名&#058; </th>
                <td>
                    {{ $item->name }}
                    <input name="item_id" type="hidden" value="{{ $request->item_id }}">
                </td>

            </tr>
            <tr>
                <th>数量&#058; </th>
                <td>
                    {{ $quantity }}
                    <input type="hidden" name="item_amount" value="{{ $quantity }}">
                </td>
            </tr>
            <tr>
                <th>注文代金（円）&#058; </th>
                <td>
                    ¥ {{ $total_price }} (税込)
                    <input type="hidden" name="order_total_price" value="{{ $total_price }}">
                </td>
            </tr>
            <tr>
                <th>注文者&#058; </th>
                <td>
                    {{ $user->name }}
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                </td>
            </tr>
            <input type="hidden" name="order_status" value="1">
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="注文を登録する">
                </td>
            </tr>
        </table>
    </form>
@endsection
