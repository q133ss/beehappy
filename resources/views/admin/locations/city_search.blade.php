@extends('layouts.admin')
@section('title', 'Города')
@section('content')
    <div class="card-body p-0">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif
            <form action="{{route('admin.city.search')}}" class="mb-2 ml-0 row">
                <input type="text" name="search" class="col-2 form-control" value="{{$request->search}}" placeholder="Название города">
                <button type="submit" class="btn btn-outline btn-outline-primary ml-2">Поиск</button>
            </form>
        <table class="table table-sm">
            <thead>
            <tr>
                <th style="width: 100px;">Название</th>
                <th>Наценка</th>
                <th style="width: 200px">Изменить</th>
                <th style="width: 40px">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cities as $country)
                <tr>
                    <td>{{$country['title']}}</td>
                    <td>{{$country['charge']}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit-modal{{$country['id']}}" class="btn btn-block btn-warning">Изменить</button>
                    </td>
                    <td>
                        <form action="{{route('admin.city.delete', $country['id'])}}" method="POST">
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


    @foreach($cities as $country)
        <div class="modal" id="edit-modal{{$country['id']}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.city.edit', $country['id'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$country['id']}}">
                            <input type="text" value="{{$country['title']}}" name="name" placeholder="Название" class="form-control">
                            <input type="text" value="{{$country['charge']}}" name="charge" placeholder="Наценка" class="form-control mt-2">
                            <select name="region" id="">
                                @foreach($regions as $region)
                                <option value="{{$region['id']}}" @if($region['id'] == $country['region_id']) selected @endif>{{$region['title']}}</option>
                                @endforeach
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
                <form action="{{route('admin.city.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Добавить</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" required name="name" placeholder="Название" class="form-control">
                        <input type="text" required name="charge" placeholder="Наценка" class="form-control mt-2">
                        <select name="region" id="">
                            @foreach($regions as $region)
                            <option value="{{$region['id']}}">{{$region['title']}}</option>
                            @endforeach
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

@endsection
