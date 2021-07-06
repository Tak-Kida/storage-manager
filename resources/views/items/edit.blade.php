@extends('layouts.layouts')

@section('title', 'Item.edit')

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
    <form action="/item/edit" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{ $form->id }}">
            <tr>
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
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
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
