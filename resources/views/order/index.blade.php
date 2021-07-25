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
            @if (Auth::user()->user_category == 0)
                <th class="th_orderStatus">発注状況ステータス</th>
            @endif
            <th>発注状況</th>
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
                @if (Auth::user()->user_category == 0)
                    <td>{{ $status_name[$order->order_status] }}</td>
                @endif
                <td class="form_advance">
                    <form action="/order/advance" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        {{-- 在庫発注管理者(1)でログイン時 --}}
                        @switch(Auth::user()->user_category)
                            {{-- 在庫発注管理者(1)でログイン時 --}}
                            @case(1)
                                @switch($order->order_status)
                                    @case(1)
                                        <button type="submit" name="advance" class="btn-submit">
                                            発注する
                                        </button>
                                    @break
                                    @case(2)
                                        <p class="statusMessage">発注業者が確認中</p>
                                    @break
                                    @case(3)
                                        <button type="submit" name="advance" class="btn-submit">
                                            受取済みにする
                                        </button>
                                    @break
                                    @default
                                        <p class="statusMessage">対応完了</p>
                                @endswitch
                            @break

                            {{-- 在庫発注社員(2)でログイン時 --}}
                        @case(2)
                            @if ($order->order_status == 1)
                                <p class="statusMessage">管理者が確認中</p>
                            @else
                                <p class="statusMessage">対応完了</p>
                            @endif
                        @break

                        {{-- 在庫受注社(3)でログイン時 --}}
                    @case(3)
                        @if ($order->order_status == 2)
                            <button type="submit" name="advance" class="btn-submit">
                                発注済みにする
                            </button>
                        @else
                            <p class="statusMessage">管理者が確認中</p>
                        @endif
                    @break
                    @default
                        <button type="submit" name="advance" class="btn-submit">
                            ステータスを進める
                        </button>

                @endswitch
            </form>
        </td>
    </tr>





@endforeach
</table>
@unless(Auth::user()->user_category == 3)
<ul class="pageLinkArea">
    <li><a href="order/add" class="pageLink">発注の追加</a></li>
</ul>
@endunless
@endsection
