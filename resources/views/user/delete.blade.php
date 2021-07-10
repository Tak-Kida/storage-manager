@extends('layouts.layouts')

@section('title', 'User.delete')

@section('content')
    <form action="/user/delete" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{ $form->id }}">
            <input type="hidden" name="name" value="{{ $form->name }}">
            <input type="hidden" name="user_category" value="{{ $form->user_category }}">

            <tr>
                <th>name: </th>
                <td>{{ $form->name }}</td>
            </tr>
            <tr>
                <th>Category: </th>
                <td>{{ $form->user_category }}</td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    @endsection

    @section('dev')
        <a href="http://localhost/user">Index</a></br>
        {{-- <a href="http://localhost/user/find">Find</a></br> --}}
        <a href="http://localhost/register">Register</a></br>
        <a href="http://localhost/user/edit?id=1">Edit(id=1)</a></br>
        <a href="http://localhost/user/delete?id=1">Delete(id=1)</a></br>
    @endsection

    @section('footer')
        copyright T.K.
    @endsection
