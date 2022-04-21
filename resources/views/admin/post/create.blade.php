@extends('layouts.admin_layout')

@section('title', 'Добавить статью')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h1 class="m-0">Добавить статью</h1>

                    </div>
                    <div class="pull-right" style="float: right">
                        <a class="btn btn-primary" href="{{ route('post.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        placeholder="Введите название статьи" required>
                                </div>
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Выберите категорию</label>
                                        <select name="cat_id" class="form-control" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="feature_image">Описание статьи</label>
                                    <input type="text" name="text" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите oписание статьи" required>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Цена статьи</label>
                                    <input type="number" name="price" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите цену статьи" required>
                                </div>




                                <div class="form-group">
                                    <label for="feature_image">Изображение статьи</label>
                                    <img src="" alt="" class="img-uploaded" style="display: block; width: 300px">
                                    <input type="text" name="img" class="form-control" id="feature_image"
                                        name="feature_image" value="" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Выбрать изображение</a>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
