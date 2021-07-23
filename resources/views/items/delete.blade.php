@extends('layouts.layout')

@section('title', 'Item.delete')

@section('content')
    <form action="/item/delete" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{ $form->id }}">
            <tr>
                <th>name: </th>
                <td>{{ $form->name }}</td>
            </tr>
            <tr>
                <th>price: </th>
                <td>{{ $form->price }}</td>
            </tr>
            <tr>
                <th>left amount: </th>
                <td>{{ $form->left_amount }}</td>
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
