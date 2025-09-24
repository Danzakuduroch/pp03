@extends("index")

@section("title", isset($promotion) ? "Редактировать акцию" : "Добавить акцию")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="admin">
                <h2>{{ isset($promotion) ? 'Редактировать акцию' : 'Добавить акцию' }}</h2>
                <form method="POST" action="{{ isset($promotion) ? route('admin.promotions.update', $promotion) : route('admin.promotions.store') }}" class="login__form">
                    @csrf
                    @if(isset($promotion))
                        @method('PUT')
                    @endif
                    <div class="login__field">
                        <label for="title">Название</label>
                        <input id="title" name="title" type="text" value="{{ old('title', $promotion->title ?? '') }}" required>
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="login__field">
                        <label for="image">Картинка (путь)</label>
                        <input id="image" name="image" type="text" value="{{ old('image', $promotion->image ?? '') }}" required>
                        @error('image')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="login__field">
                        <label for="description">Описание</label>
                        <textarea id="description" name="description" rows="6" class="textarea">{{ old('description', $promotion->description ?? '') }}</textarea>
                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit">Сохранить</button>
                </form>
            </section>
        </div>
    </main>
@endsection


