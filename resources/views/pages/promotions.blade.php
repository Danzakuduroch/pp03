@extends("index")

@section("title", "Акции")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <section class="promotions">
                @foreach($promotions as $promotion)
                    <article class="promotions__card">
                        <img class="promotions__img" src={{ $promotion->image }} alt="">
                        <div class="promotions__info">
                            <h2 class="promotions__title">{{ $promotion->title }}
                            </h2>
                            <p class="promotions__text"> {{ $promotion->description }}
                            </p>
                            <a class="promotions__link">Получить промокод</a>
                        </div>
                    </article>
                @endforeach
            </section>
        </div>
    </main>
@endsection
