@extends("index")

@section("title", "Вход")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="login">
                <h2>Вход</h2>
                <form method="POST" action="{{ route('login.perform') }}" class="login__form">
                    @csrf
                    <div class="login__field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
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
                        <label>
                            <input type="checkbox" name="remember"> Запомнить меня
                        </label>
                    </div>
                    <button type="submit">Войти</button>
                </form>
            </section>
        </div>
    </main>
@endsection


