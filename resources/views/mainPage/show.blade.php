@extends('mainPage.header')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@section('content')
<section class="item-page">
    <div class="container">


        <div class="item-inside">
            <a href="javascript:void(0)" onclick="window.history.back()">Назад</a><br><br>
            <div class="item_top">
                <img src="{{ asset($post-> img) }}" alt="Товар" class="item-inside_img" >
                <div class="item-inside_content">

                    <h1>{{ $post->title }}</h1>
                    <p> {{ $post->text }}</p>
                    <div class="item-rating">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label for="star-5" title="Оценка «5»"><i class="icon-star"></i></label>
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"><i class="icon-star"></i></label>
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"><i class="icon-star"></i></label>
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"><i class="icon-star"></i></label>
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"><i class="icon-star"></i></label>
                    </div>


                    <br>
                    <span class="price">Итого: <span id="priceValueCount">{{ $post->price }}</span> тг.</span>
                    <br>
                    <br>
                    <p class="btn-holder"><a href="{{ url('add-to-cart/'.$post->id) }}" class="btn btn-warning btn-block text-center" role="button">Заказать</a> </p>



                    <div class='item-buttons'>
                        <div class="add-favorite"><i class="icon-hearth-stroke"></i>
                            <p class='favorite-text'>Добавить в избранное</p>
                        </div>
                        <div class="add-basket"><i class="icon-basket"></i>
                            <p class='text-basket'>Добавить в корзину</p>
                        </div>
                    </div>
                </div>
            </div>

            </p>
            <div class="item-content_tabs">
                <div class="item-content_tab active">Описание</div>
                <div class="item-content_tab">Отзывы</div>
                <div class="item-content_tab">Вопросы и ответы</div>
            </div>
            <div class="item-content_tab-content">
            </div>

        </div>
    </div>
</section>
@endsection()

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="asset('js/main.js')"></script>
<script>

</script>
</body>

</html>

