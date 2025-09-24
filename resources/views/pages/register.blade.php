@extends("index")

@section("title", "Регистрация")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="login">
                <h2>Регистрация</h2>
                <form method="POST" action="{{ route('register.perform') }}" class="login__form">
                    @csrf
                    <div class="login__field">
                        <label for="name">Имя</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="login__field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="login__field">
                        <label for="password">Пароль</label>
                        <input id="password" name="password" type="password" required>
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="login__field">
                        <label for="password_confirmation">Подтвердите пароль</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required>
                    </div>
                    <button type="submit">Зарегистрироваться</button>
                </form>
            </section>
        </div>
    </main>
@endsection


