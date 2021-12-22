@extends('layouts.admin')
@section('title', 'Изменить новость')
@section('content')
    <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif
        <form action="{{route('admin_news.update', $news['id'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input type="text" name="title" class="form-control" value="{{$news['title']}}" id="exampleInputEmail1" placeholder="Название">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Изображение</label> <br>
                    <input type="file" id="exampleInputPassword1" name="img">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Баннер</label> <br>
                    <input type="file" name="banner" id="exampleInputFile">
                </div>
                <div class="form-group">
                    <label for="">Текст</label> <br>
                    <textarea name="content" rows="30" cols="100">{{$news['content']}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </div>
@endsection
