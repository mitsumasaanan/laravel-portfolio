<header id="header">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark text-white mb-5 base-bg">
            <a class="navbar-brand site-logo" href="{{ route('top') }}">タビログ <i class="fa fa-plane-departure"></i></a>
            
            @if(Auth::check())
                {{ Auth::user()->name }}さん、こんにちは
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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
                            <a class="nav-link" href="{{ route('register') }}">ユーザー登録 <i class="fa fa-user"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">ログイン<i class="fa fa-sign-in-alt"></i></a>
                        </li>
                        <li class="nav-item btn-success">
                            <a class="nav-link text-white" href="{{ route('login.guest') }}">ゲストログイン</a>
                        </li>

                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>