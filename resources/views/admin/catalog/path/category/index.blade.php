@extends('layouts.admin')
@section('title', 'Патч категории')
@section('content')
        <div class="card-body p-0">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
                </div>
            @endif
            <div class="wrap d-flex justify-content-between">
                <div>
                    <form action="" class="d-flex">
                    <input type="text" value="{{@$_GET['search']}}" name="search" class="form-control mr-2" placeholder="Поиск">
                    <button type="submit" class="btn btn-success">Поиск</button>
                    </form>
                </div>
                <div>
                    <button type="button" class="btn btn-success mr-4" data-toggle="modal" data-target="#modalCreate">Добавить</button>
                </div>
            </div>
            <table class="table table-sm">
                <thead>
                <tr>
                    <th style="width: 100px;">Локация</th>
                    <th>Название локации</th>
                    <th>Категория</th>
                    <th>Статус</th>
                    <th>Наценка</th>
                    <th style="width: 40px">Изменить</th>
                    <th style="width: 40px">Удалить</th>
                </tr>
                </thead>
                <tbody>

                @foreach($path as $item)
                    <tr>
                        <td>{{$item['locable_type']}}</td>
                        <td>
                            @if($item['locable_type'] == 'App\Models\City')
                                {{@App\Models\City::find($item['locable_id'])->title }}
                            @elseif($item['locable_type'] == 'App\Models\Region')
                                 {{@App\Models\Region::find($item['locable_id'])->title}}
                            @elseif($item['locable_type'] == 'App\Models\Country')
                                {{@App\Models\Country::find($item['locable_id'])->title}}
                            @endif
                        </td>
                        <td>{{App\Models\Category::find($item['category_id'])->name}}</td>
                        <td>@if($item['status'] == 1) Активен @else Выключен @endif</td>
                        <td>{{$item['charge']}}</td>
                        <td><a href="#" data-toggle="modal" data-target="#exampleModal{{$item['id']}}" class="btn btn-warning">Изменить</a></td>
                        <td>
                            <form action="{{route('admin.path.category.delete', $item['id'])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-block btn-danger delete-btn">X</button>
                            </form>
                        </td>
                    </tr>
                    {{--    Modal edit--}}
                    <form action="{{route('admin.path.category.edit', $item['id'])}}" method="POST">
                    @csrf
                    <div class="modal fade" id="exampleModal{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$item['model']}} #{{$item['model_id']}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Модель</label>
                                        <select name="model" id="" class="form-control">
                                            <option value="App\Models\City" @if($item['model'] == 'City') selected @endif>City</option>
                                            <option value="App\Models\Region" @if($item['model'] == 'Region') selected @endif>Region</option>
                                            <option value="App\Models\Country" @if($item['model'] == 'Country') selected @endif>Country</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">ID модели</label>
                                        <input type="text" name="model_id" value="{{$item['model_id']}}" placeholder="17" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">ID категории</label>
                                        <input type="text" name="category_id" value="{{$item['category_id']}}" placeholder="17" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Статус</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1" @if($item['status'] == 1) selected @endif>Активен</option>
                                            <option value="0" @if($item['status'] == 0) selected @endif>Выключен</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Наценка</label>
                                        <input type="text" name="charge" class="form-control" value="{{$item['charge']}}">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    {{--    end Modal --}}
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success mr-4" data-toggle="modal" data-target="#modalCreate">Добавить</button>
            </div>
        </div>

        {{--    Modal create--}}
        <form action="{{route('admin.path.category.create')}}" method="POST">
            @csrf
            <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Создать патч</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Модель</label>
                                <select name="model" id="" class="form-control">
                                    <option value="App\Models\City">City</option>
                                    <option value="App\Models\Region">Region</option>
                                    <option value="App\Models\Country">Country</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">ID модели</label>
                                <input type="text" name="model_id" placeholder="17" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">ID категории</label>
                                <input type="text" name="category_id" placeholder="17" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Статус</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1">Активен</option>
                                    <option value="0">Выключен</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Наценка</label>
                                <input type="text" name="charge" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{--    end Modal --}}
@endsection
