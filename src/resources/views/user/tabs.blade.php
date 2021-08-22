<ul class="nav nav-tabs nav-justified mt-4">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user.show') }}">宿一覧</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('user/favorite') ? 'active' : '' }}" href="{{ route('user.favorite', ['id' => $auth->id]) }}">保存した宿</a>
    </li>
</ul>