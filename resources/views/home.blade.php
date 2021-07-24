@extends('layouts.layout')

@section('title', 'ホーム')
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <p class="welcomeMessage">ようこそ、{{ $user->name }} さん</p>
    <div class="borderLine"></div>
    {{-- 在庫発注管理者でログイン時 --}}
    @if ($user->user_category == 1)
        <ul class="notificationMessage">
            @if (count($order_unconfirm) == 0)
                <li>未確認の注文はありません。</li>
            @else
                <li>未確認の注文が{{ count($order_unconfirm) }}件あります！</li>
            @endif
            @if (count($order_unreceive) == 0)
                <li>未受け取りの注文はありません。</li>
            @else
                <li>未受け取りの注文が{{ count($order_unreceive) }}件あります！</li>
            @endif
        </ul>
    @endif

    {{-- 在庫受注社でログイン時 --}}
    @if ($user->user_category == 3)
        <ul class="notificationMessage">
            @if (count($order_undone) == 0)
                <li>未発注の注文はありません。</li>
            @else
                <li>未発注の注文が{{ count($order_undone) }}件あります！</li>
            @endif
        </ul>
    @endif
    <div class="borderLine"></div>

    <ul class="index_link">
        <li><a href="/order">注文一覧&#8594;</a><br></li>
        @if ($user->user_category != 3)
            <li><a href="/item">商品一覧&#8594;</a><br></li>
            <li><a href="/user">登録者一覧&#8594;</a><br></li>
        @endif
    </ul>
@endsection

@section('footer')
    copyright T.K.
@endsection
