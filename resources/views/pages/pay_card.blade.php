@extends("index")

@section("title", "Оплата картой")

@section("main")
<main class="main">
    <div class="main__inner container">
        <section class="payment payment--card">
            <h2>Пополнение по карте</h2>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form class="payment__form" method="POST" action="{{ route('payment.create') }}">
                @csrf
                <input type="hidden" name="payment_method" value="card">

                <div class="payment__field">
                    <label for="amount">Сумма, ₽</label>
                    <input id="amount" name="amount" type="number" min="10" step="10" placeholder="1000" required>
                    @error('amount')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="payment__field">
                    <label for="description">Описание (необязательно)</label>
                    <input id="description" name="description" type="text" placeholder="Пополнение баланса">
                    @error('description')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="payment__field">
                    <label for="card">Номер карты</label>
                    <input id="card" name="card" type="text" placeholder="0000 0000 0000 0000" required>
                </div>

                <div class="payment__grid">
                    <div class="payment__field">
                        <label for="expiry">Срок</label>
                        <input id="expiry" name="expiry" type="text" placeholder="MM/YY" required>
                    </div>
                    <div class="payment__field">
                        <label for="cvc">CVC</label>
                        <input id="cvc" name="cvc" type="password" placeholder="***" required>
                    </div>
                </div>

                <button type="submit">Оплатить</button>
            </form>

            <div class="payment__info">
                <p><strong>Тестовые данные для карты:</strong></p>
                <p>Номер: 4242 4242 4242 4242</p>
                <p>Срок: 12/25</p>
                <p>CVC: 123</p>
            </div>
        </section>
    </div>
</main>
@endsection