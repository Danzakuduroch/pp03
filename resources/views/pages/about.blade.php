@extends("index")

@section("title", "О нас")

@section("main")
    <main class="main">
        <div class="main__inner container">
            <div class="about__inner">
                <img src="/storage/contacts/1.png" alt="">
                <section class="contacts">
                    <h2>информация о пк клубе</h2>
                    <p>+7 (495) 182-14-14</p>
                    <p>info@cyberx-franchise.ru</p>
                    <p>
                        ООО «РИКИС»
                        ИНН: 2368010296
                        ОГРН: 1182375044697
                    </p>
                    <p>Почтовый адрес: 352630, Краснодарский кр,
                        г. Белореченск, район Белореченский,
                        ул. Интернациональная, д. 30</p>
                </section>
            </div>
            <section class="reviews">
                <h2>Отзывы</h2>
                @foreach($reviews as $review)
                    <div class="review">
                        <img src={{ $review->avatar }} alt="">
                        <div class="review__info">
                            <p class="review__name">{{ $review->name }}</p>
                            <p class="review__text">{{ $review->text }}</p>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    </main>
@endsection
