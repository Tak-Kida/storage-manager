@extends('layouts.layout')

@section('title', '注文一覧')
@section('css')
    <link href="{{ asset('css/order.css') }}" rel="stylesheet">
@endsection

@section('content')
    <table class="dataTable">
        <tr>
            <th>注文ID</th>
            <th>注文商品</th>
            <th>数量</th>
            <th>注文代金（円）</th>
            <th>注文者</th>
            <th>発注状況</th>
            <th></th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>

                <td>
                    @if ($order->item != null)
                        {{ $order->item->name }}
                    @endif
                </td>
                <td>{{ $order->item_amount }}</td>
                <td>{{ $order->order_total_price }}</td>

                <td>
                    @if ($order->user != null)
                        {{ $order->user->name }}
                    @endif
                </td>
                <td>{{ $status_name[$order->order_status] }}</td>
                <td class="form_advance">
                    <form action="/order/advance" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        @if ($order->order_status < 4 and $order->order_status != 0)
                            <button type="submit" name="advance" class="btn-submit">
                                発注状況を進める
                            </button>
                        @else
                            <p class="doneMessage">対応完了</p>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @unless(Auth::user()->user_category == 3)
        <ul class="pageLinkArea">
            <li><a href="order/add" class="pageLink">発注の追加</a></li>
        </ul>
    @endunless ()
@endsection
