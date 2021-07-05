@extends('layouts.layouts')

@section('title', 'item.add')

@section('content')
    <form action="/item/add" method="post">
        <table>
            @csrf
            {{-- <tr>
                <th>person id: </th>
                <td>
                    <input type="number" name="person_id">
                </td>
            </tr> --}}
            <tr>
                <th>item_name: </th>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <th>item_price: </th>
                <td>
                    <input type="number" name="price">
                </td>
            </tr>
            <tr>
                <th>item_left_amount: </th>
                <td>
                    <input type="number" name="left_amount">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="send">
                </td>
            </tr>
        </table>
    </form>
@endsection

@section('footer')
    copyright T.K.
@endsection
