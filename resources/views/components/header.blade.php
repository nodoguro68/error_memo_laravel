<header class="l-header">
    <div class="l-header__inner">
        <h1 class="l-header__logo">
            error memo
        </h1>
        <nav class="l-header__nav">
            <ul class="l-header__nav-menu">
                @guest
                    <li class="l-header__nav-item">
                        <a href="{{ route('login') }}" class="l-header__nav-link">ログイン</a>
                    </li>
                    <li class="l-header__nav-item">
                        <a href="{{ route('register') }}" class="l-header__nav-link">新規登録</a>
                    </li>
                @endguest
                @auth
                    <li class="l-header__nav-item">
                        <button type="submit" form="logout" class="">ログアウト</button>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</header>