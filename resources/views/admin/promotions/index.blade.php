@extends("index")

@section("title", "Админ: Акции")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="admin">
                <div class="admin__header">
                    <h2>Акции</h2>
                    <a class="btn" href="{{ route('admin.promotions.create') }}">Добавить</a>
                </div>
                <div class="table">
                    <div class="table__row table__row--head">
                        <div class="table__cell">ID</div>
                        <div class="table__cell">Название</div>
                        <div class="table__cell">Картинка</div>
                        <div class="table__cell table__cell--actions">Действия</div>
                    </div>
                    @foreach ($promotions as $promotion)
                        <div class="table__row">
                            <div class="table__cell">{{ $promotion->id }}</div>
                            <div class="table__cell">{{ $promotion->title }}</div>
                            <div class="table__cell">{{ $promotion->image }}</div>
                            <div class="table__cell table__cell--actions">
                                <a class="btn btn--sm" href="{{ route('admin.promotions.edit', $promotion) }}">Редактировать</a>
                                <form class="promotions__form" method="POST" action="{{ route('admin.promotions.destroy', $promotion) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" type="submit" onclick="return confirm('Удалить?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection


