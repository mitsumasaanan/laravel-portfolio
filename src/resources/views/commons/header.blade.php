<header id="header">
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark text-white mb-5 bg-info">
            <a class="navbar-brand site-logo" href="{{ route('top') }}">タビログ</a>
            <ul class="navbar-nav ml-auto mr-3">

                @if(Auth::check())

                    <li class="nav-item">
                        <a class="nav-link" href="{{-- {{ route('articles.create') }} --}}"><i class="fas fa-pen mr-2"></i>投稿する</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{-- {{ route('user.show') }} --}}">マイページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout').submit();">ログアウト</a>
                        <form id="logout" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
                    </li>

                @endif
            </ul>
        </nav>
    </div>
</header>