@extends('layouts.layouts')

@section('title', '')

@section('content')
    <h2 class="error_title">アクセスできないページです</h2>
    <p class="error_text">
        アクセスが許可されていません。<br>
        問題がある場合は、<br>
        システム管理者へお問い合わせください。
    </p>

@endsection

@section('dev')
    <a href="http://localhost/">Home</a></br>
@endsection

@section('footer')
    copyright T.K.
@endsection
