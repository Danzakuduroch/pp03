@extends("index")

@section("title", "Админ: Главная")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="admin">
                <h2>Админ-панель</h2>
                <div class="admin__cards">
                    <a class="admin__card" href="{{ route('admin.promotions.index') }}">
                        <span>Акции</span>
                        <strong>{{ $promotionsCount }}</strong>
                    </a>
                    <a class="admin__card" href="{{ route('admin.users.index') }}">
                        <span>Пользователи</span>
                        <strong>{{ $usersCount }}</strong>
                    </a>
                </div>
            </section>
        </div>
    </main>
@endsection


