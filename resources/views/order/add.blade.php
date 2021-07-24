@extends('layouts.layout')

@section('title', '注文の追加')

@section('content')
    <h4>注文する商品と数を入力して下さい</h4>
    <form action="/order/add_confirm" method="post">
        <table>
            @csrf
            <tr>
                <th>商品&#058; </th>
                <td>
                    <select name="item_id">
                        <option hidden>選択してください</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} (残 &#058; {{ $item->left_amount }})
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>数量&#058; </th>
                <td>
                    <input type="number" name="item_amount">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="確認へ進む">

                </td>
            </tr>
        </table>
    </form>
@endsection
