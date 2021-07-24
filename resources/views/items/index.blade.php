@extends('layouts.layout')

@section('title', '在庫一覧')
@section('css')
    <link href="{{ asset('css/item.css') }}" rel="stylesheet">
@endsection

@section('content')
    <table class="dataTable">
        <tr>
            {{-- <th>Data</th> --}}
            <th>ID&#058;</th>
            <th>商品名&#058;</th>
            <th>単価（円）&#058;</th>
            <th>在庫量（個）&#058;</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->left_amount }}</td>
            </tr>
        @endforeach
    </table>
    <ul class="pageLinkArea">
        <li><a href="item/add" class="pageLink">商品追加</a></li>
        <li><a href="item/export" class="pageLink">CSVエクスポート</a></li>
    </ul>
@endsection
