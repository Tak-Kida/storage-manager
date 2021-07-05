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
@endsection

@section('footer')
    copyright T.K.
@endsection
