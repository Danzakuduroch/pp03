@extends("index")

@section("title", "Оплата картой")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="payment payment--card">
                <h2>Пополнение по карте</h2>
                <form class="payment__form">
                    <div class="payment__field">
                        <label for="amount">Сумма, ₽</label>
                        <input id="amount" name="amount" type="number" min="10" step="10" placeholder="1000">
                    </div>
                    <div class="payment__field">
                        <label for="card">Номер карты</label>
                        <input id="card" name="card" type="text" placeholder="0000 0000 0000 0000">
                    </div>
                    <div class="payment__grid">
                        <div class="payment__field">
                            <label for="expiry">Срок</label>
                            <input id="expiry" name="expiry" type="text" placeholder="MM/YY">
                        </div>
                        <div class="payment__field">
                            <label for="cvc">CVC</label>
                            <input id="cvc" name="cvc" type="password" placeholder="***">
                        </div>
                    </div>
                    <button type="button">Оплатить</button>
                </form>
            </section>
        </div>
    </main>
@endsection


