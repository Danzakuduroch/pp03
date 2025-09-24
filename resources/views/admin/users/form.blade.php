@extends("index")

@section("title", isset($user) ? "Редактировать пользователя" : "Добавить пользователя")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="admin">
                <h2>{{ isset($user) ? 'Редактировать пользователя' : 'Добавить пользователя' }}</h2>
                <form method="POST" action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}" class="login__form">
                    @csrf
                    @if(isset($user))
                        @method('PUT')
                    @endif
                    <div class="login__field">
                        <label for="name">Имя</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name ?? '') }}" required>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="login__field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email ?? '') }}" required>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="login__field">
                        <label for="password">Пароль {{ isset($user) ? '(оставьте пустым чтобы не изменять)' : '' }}</label>
                        <input id="password" name="password" type="password" {{ isset($user) ? '' : 'required' }}>
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit">Сохранить</button>
                </form>
            </section>
        </div>
    </main>
@endsection


