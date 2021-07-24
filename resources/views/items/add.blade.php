@extends('layouts.layout')

@section('title', '商品追加')

@section('content')
    <form action="/item/add" method="post">
        <table>
            @csrf
            <tr>
                <th>商品名&#058; </th>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <th>商品単価(円)&#058; </th>
                <td>
                    <input type="number" name="price">
                </td>
            </tr>
            <tr>
                <th>商品在庫量(個)&#058; </th>
                <td>
                    <input type="number" name="left_amount">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="登録">
                </td>
            </tr>
        </table>
    </form>
@endsection
