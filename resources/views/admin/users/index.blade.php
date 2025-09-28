@extends("index")

@section("title", "Админ: Пользователи")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="admin">
                <div class="admin__header">
                    <h2>Пользователи</h2>
                    <a class="btn" href="{{ route('admin.users.create') }}">Добавить</a>
                </div>
                <div class="table">
                    <div class="table__row table__row--head">
                        <div class="table__cell">ID</div>
                        <div class="table__cell">Имя</div>
                        <div class="table__cell">Email</div>
                        <div class="table__cell table__cell--actions">Действия</div>
                    </div>
                    @foreach ($users as $user)
                        <div class="table__row">
                            <div class="table__cell" data-label="ID">{{ $user->id }}</div>
                            <div class="table__cell" data-label="Имя">{{ $user->name }}</div>
                            <div class="table__cell" data-label="Email">{{ $user->email }}</div>
                            <div class="table__cell table__cell--actions" data-label="Действия">
                                <form method="POST" class="topup">
                                    @csrf
                                    <input class="topup__input" type="number" name="amount" min="1" placeholder="Сумма">
                                    <button class="btn btn--sm" formaction="{{ route('admin.users.topup', $user) }}" type="submit">Пополнить</button>
                                </form>
                                <a class="btn btn--sm" href="{{ route('admin.users.edit', $user) }}">Редактировать</a>
                                <form method="POST" class="users__form" action="{{ route('admin.users.destroy', $user) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn--sm btn--danger" type="submit" onclick="return confirm('Удалить?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection


