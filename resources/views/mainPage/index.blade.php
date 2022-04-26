@extends('mainPage.header')

@section('content')
    <div class="container">
        <h1 class="text-center mt-3">Tours</h1>
        <form action="{{route('home')}}" method="get" class="searchable">
            <div class="mb-3" >
                <label for="exampleFormControlInput1" class="form-label">Search</label>
                <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="number" class="form-control" id="exampleFormControlInput1" placeholder="Write cash which you have">

            </div>
            <div class="mb-3">
                <div class="form-label">Выберите категорию</div>
                <select name="cat_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @if(isset($_GET['cat_id'])) @if($_GET['cat_id']==$category->id) selected @endif @endif>{{ $category['title'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-primary">Поиск</button>
        </form>
        <div class="row mt-5">
            @foreach($posts as $post)
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <a href="{{ url('/tour',$post->id) }}">
                                <p class="card-title">{{$post->title}}</p>
                                <img src="{{ $post['img'] }}" alt="" class="img-uploaded"
                                     style="display: block; width: 300px"></a>
                            <h3 class=" bold"> {{ $post['price'] }}</h3>
                            <a class="bid size2 ta-center" href = "{{ url('/tour',$post->id) }}">
                                Подробнее
                            </a>
                            </a>

                            <a href="{{ url('/tour',$post->id) }}" class="card-title">
                                <p class="btn-holder"><a href="{{ url('add-to-cart/'.$post->id) }}" class="btn btn-warning btn-block text-center" role="button">Заказать</a> </p>
{{--                            <h4 class="btn btn-primary">{{$post-> category['title']}}</h4>--}}



                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {!! $posts->links() !!}
    </div>
@endsection
