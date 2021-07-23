{{-- header用のCSS --}}
@section('css')
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
@endsection

<div class="pageTitle">
    <a class="btn-return" href="javascript:history.go(-1)">←</a>
    <h2>@yield('title')</h2>
</div>
<ul class="userMenu">
    <li class="userName">使用者&#058;{{ Auth::user()->name }}</li>
    <li><a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}
        </a></li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    {{-- <li class="btn-logout">ログアウト</li> --}}
</ul>
