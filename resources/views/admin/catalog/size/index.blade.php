@extends('layouts.admin')
@section('title', 'Размеры')
@section('content')
    <div class="card-body p-0">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success mr-4" data-toggle="modal" data-target="#create-modal">Добавить</button>
            </div>
        <table class="table table-sm">
            <thead>
            <tr>
                <th style="width: 100px;">Иконка</th>
                <th>Название</th>
                <th style="width: 200px">Изменить</th>
                <th style="width: 40px">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sizes as $tag)
                <tr>
                    <td><img src="{{$tag['icon']}}" width="100%" height="100px" alt=""></td>
                    <td>{{$tag['name']}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit-modal{{$tag['id']}}" class="btn btn-block btn-warning">Изменить</button>
                    </td>
                    <td>
                        <form action="{{route('admin.catalog.size.delete', $tag['id'])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger delete-btn">X</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success mr-4" data-toggle="modal" data-target="#create-modal">Добавить</button>
        </div>
    </div>


    @foreach($sizes as $tag)
        <div class="modal" id="edit-modal{{$tag['id']}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.catalog.size.edit', $tag['id'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$tag['id']}}">
                            <input type="hidden" name="block" value="1">
                            <input type="file" value="{{$tag['img']}}" name="img"> <br>
                            <input type="text" value="{{$tag['name']}}" name="name" placeholder="Название" class="form-control mt-2">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <div class="modal" id="create-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('admin.catalog.size.create', $tag['id'])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Добавить</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" required name="img"> <br>
                        <input type="text" required name="name" placeholder="Название" class="form-control mt-2">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
