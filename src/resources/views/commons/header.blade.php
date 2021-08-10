<header id="header">
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark text-white mb-5 bg-info">
            <a class="navbar-brand site-logo" href="{{ route('top') }}">タビログ <i class="fa fa-plane-departure"></i></a>
            @if(Auth::check())
                {{ Auth::user()->name }}さん、こんにちは
            @endif
            <ul class="navbar-nav ml-auto mr-3">

                @if(Auth::check())
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accomodations.create') }}">投稿する<i class="fas fa-sticky-note mr-2"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.show') }}">マイページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout').submit();">ログアウト<i class="fa fa-sign-out-alt"></i></a>
                        <form id="logout" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン<i class="fa fa-sign-in-alt"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">ユーザー登録 <i class="fa fa-user"></i></a>
                    </li>

                @endif
            </ul>
        </nav>
    </div>
</header>