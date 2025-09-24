@extends("index")

@section("title", "Оплата по СБП")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="payment payment--sbp">
                <h2>Пополнение по СБП</h2>
                <div class="payment__field">
                    <label for="amount">Сумма, ₽</label>
                    <input id="amount" name="amount" type="number" min="10" step="10" placeholder="1000">
                </div>
                <div class="payment__qr">
                    <p>Сканируйте QR-код для оплаты:</p>
                    <img src="/assets/images/qr.png" alt="QR код СБП" style="max-width:240px">
                </div>
            </section>
        </div>
    </main>
@endsection


