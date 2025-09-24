@extends("index")

@section("title", "Аккаунт")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="account">
                <h2>Аккаунт</h2>
                <div class="account__inner">
                    <div class="account__left">
                        <img class="account__left-img-wrapper" src="/storage/account/account.png" alt="">
                        <p class="account__fio">{{ $user->name }}</p>
                        <p class="account__phone">{{ $user->phone }}</p>
                        <div class="account__community">
                            <div>
                                <p>Cyber x | community</p>
                            </div>
                            <div>
                                <p>Gold</p>
                                <p>5</p>
                            </div>
                        </div>
                    </div>
                    <div class="account__balance">
                        <p class="account__balance-title">Ваш баланс</p>
                        <p class="account__balance-value">{{ $user->balance }}р</p>
                        <div class="account__balance-links">
                            <a class="account__balance-add" href="{{ route('pay.card') }}">Пополнить по карте</a>
                            <a class="account__balance-sbp" href="{{ route('pay.sbp') }}">Пополнить по СБП</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
