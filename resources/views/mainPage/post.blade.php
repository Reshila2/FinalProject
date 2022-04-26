@extends('mainPage.header')

@section('title', 'Products')

@section('content')

    <div class="container products">

        <div class="row">

            @foreach($posts as $post)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $post->img }}" width="500" height="300">
                        <div class="caption">
                            <h4>{{ $post->title }}</h4>
                            <p>{{ str_limit(strtolower($product->text), 50) }}</p>
                            <p><strong>Price: </strong> {{ $post->price }}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$post  ->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- End row -->

    </div>

@endsection
