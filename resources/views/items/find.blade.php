@extends('layouts.layouts')

@section('title', 'Item.find')

@section('content')
    <form action="/item/find" method="post">
        @csrf
        <tr>
            <th>id: </th>
            <td><input type="number" name="input" value="{{ $input }}"></td>
        </tr>
        {{-- <tr>
                <th>name: </th>
                <td><input type="text" name="name" value="{{ $form->name }}"></td>
            </tr>
            <tr>
                <th>price: </th>
                <td><input type="number" name="price" value="{{ $form->price }}"></td>
            </tr>
            <tr>
                <th>left amount: </th>
                <td><input type="number" name="left_amount" value="{{ $form->left_amount }}"></td>
            </tr> --}}
        <tr>
            <th></th>
            <td><input type="submit" value="send"></td>
        </tr>
    </form>
    @if (isset($item))
        <table>
            <tr>
                <th>Data</th>
            </tr>
            <tr>
                <td>{{ $item->getData() }}</td>
            </tr>
        </table>
        </br>
    @endif
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
