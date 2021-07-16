@extends('layouts.layouts')

@section('title', 'item.index')

@section('content')
    <table>
        <tr>
            {{-- <th>Data</th> --}}
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Left</th>
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
    <a href="item/export">CSVエクスポート</a></br>
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
