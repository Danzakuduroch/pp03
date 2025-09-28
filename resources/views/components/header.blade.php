<header class="header">
    <div class="header__inner container">
        <img class="logo" src="/assets/images/logo.png" alt="логотип">
        <nav class="nav">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href={{ route("about") }}>
                        О нас
                    </a>
                </li>
                <li class="nav__item">
                    <a href={{ route("promotions") }}>
                        Акции
                    </a>
                </li>
                @auth
                <li class="nav__item">
                    <a href={{ route("account") }}>
                        Аккаунт
                    </a>
                </li>
                <li class="nav__item">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            Выход
                        </button>
                    </form>
                </li>
                @else
                <li class="nav__item">
                    <a href={{ route("login") }}>
                        Вход
                    </a>
                </li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
