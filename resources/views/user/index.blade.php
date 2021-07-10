@extends('layouts.layouts')

@section('title', 'user.index')

@section('content')
    <table>
        <tr>
            {{-- <th>Data</th> --}}
            <th>ID</th>
            <th>Name</th>
            <th>User_Category</th>
            <th>is_deleted</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->user_category }}</td>
                <td>{{ $user->is_deleted }}</td>
            </tr>
        @endforeach
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
