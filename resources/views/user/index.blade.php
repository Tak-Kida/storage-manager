@extends('layouts.layout')

@section('title', '登録者一覧')

@section('content')
    <table class="dataTable">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>権限</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $category_name[$user->user_category] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
