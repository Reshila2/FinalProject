@extends('layouts.admin_layout')

@section('title', 'Все статьи')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Детали поста :     {{ $post['title'] }}</h2>
                    </div>
                    <div class="pull-right" style="float: right">
                        <a class="btn btn-primary" href="{{ route('post.index') }}"> Назад</a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 5%" >
                                ID
                            </th>
                            <th>
                                Название
                            </th>
                            <th>
                                Категория
                            </th>
                            <th>
                                Изображение
                            </th>
                            <th>
                                Описание
                            </th>
                            <th>
                                Цена
                            </th>
                            <th>
                                Последнее изменение
                            </th>

                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    {{ $post['id'] }}
                                </td>
                                <td>
                                    {{ $post['title'] }}
                                </td>
                                    <td>
                                {{ $post->category['title'] }}
                                </td>
                                <td>
                                <img src="{{ $post['img'] }}" alt="" class="img-uploaded"
                                style="display: block; width: 300px">
                                </td>
                                <td>
                                    {{ $post['text'] }}
                                </td>
                                <td>
                                {{ $post['price'] }}Т

                                </td>

                                <td>
                                {{$post['created_at']}}
                                </td>


                            </tr>


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
