@extends('layouts.admin')
@section('title', 'Категория')
@section('content')
    <div class="card-body p-0">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif
            <a class="btn btn-success ml-4" href="{{route('admin.category')}}">Назад</a>
        <table class="table table-sm">
            <thead>
            <tr>
                <th style="width: 100px;">Иконка</th>
                <th>Название</th>
                <th>Тип</th>
                <th style="width: 200px">Изменить</th>
                <th style="width: 40px">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sub_cats as $cat)
                <tr>
                    <td><img src="{{$cat['img']}}" width="100%" height="100px" alt=""></td>
                    <td>{{$cat['name']}}</td>
                    <td>
                        {{\App\Models\Category::TYPES[$cat['type']]}}
                    </td>
                    <td>
                        <button data-toggle="modal" data-target="#edit-modal{{$cat['id']}}" class="btn btn-block btn-warning">Изменить</button>
                    </td>
                    <td>
                        <form action="{{route('admin.category.delete', $cat['id'])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger delete-btn">X</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success mr-4" data-toggle="modal" data-target="#create-modal">Добавить подкатегорию</button>
        </div>
    </div>


    @foreach($sub_cats as $cat)
        <div class="modal" id="edit-modal{{$cat['id']}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.subcategory.edit', $cat['id'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @php
                                $cat_ = App\Models\Category::find($cat_id);
                            @endphp
                            <input type="hidden" name="id" value="{{$cat_['id']}}">
                            <input type="hidden" name="block" value="1">
                            <input type="hidden" name="parent" value="{{$cat_['id']}}">
                            <input type="file" value="{{$cat['img']}}" name="img"> <br>
                            <input type="text" value="{{$cat['name']}}" name="name" placeholder="Название" class="form-control mt-2">
                            <input type="hidden" name="type" value="{{$cat_['type']}}">
                            <label for="">Статус</label>
                            <select name="status" id="">
                                <option value="Нет" @if($cat['status'] == 0) selected @endif>Активна</option>
                                <option value="Да">Отключена</option>
                            </select>
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
                <form action="{{route('admin.sub.create', $cat_id)}}" method="POST" enctype="multipart/form-data">
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
                        <input type="hidden" name="type" value="{{$cat_['type']}}">
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
