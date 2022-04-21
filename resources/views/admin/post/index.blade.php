@extends('layouts.admin_layout')

@section('title', 'Все статьи')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h1 class="m-0">Все статьи</h1>
                    </div>
                    <div class="pull-right" style="float: right">
                        <a class="btn btn-primary" href="{{ route('post.create') }}"> Добавить новую статью</a>
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
                                <th style="width: 5%">
                                    ID
                                </th>
                                <th>
                                    Название
                                </th>
                                <th>
                                    Категория
                                </th>
                                <th>
                                    Дата добавления
                                </th>
                                <th style="width: 30%">Действия
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
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
                                        {{ $post['created_at'] }}
                                    </td>

                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('post.show', $post['id']) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Детали
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('post.edit', $post['id']) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Редактировать
                                        </a>
                                        <form action="{{ route('post.destroy', $post['id']) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                <i class="fas fa-trash">
                                                </i>
                                                Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
