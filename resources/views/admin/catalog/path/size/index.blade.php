@extends('layouts.admin')
@section('title', 'Патч размера')
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
                    <th>Главный</th>
                    <th>Товар</th>
                    <th>Статус</th>
                    <th>Цена</th>
                    <th>Балы</th>
                    <th>Скидка</th>
                    <th style="width: 40px">Изменить</th>
                    <th style="width: 40px">Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($path as $item)
{{--                    @dd($item['main'])--}}
                    <tr>
                        <td>{{$item['locable_type']}}</td>
                        <td>@if($item['locable_type'] == 'App\Models\City')
                                {{@App\Models\City::find($item['locable_id'])->title }}
                            @elseif($item['locable_type'] == 'App\Models\Region')
                                {{@App\Models\Region::find($item['locable_id'])->title}}
                            @elseif($item['locable_type'] == 'App\Models\Country')
                                {{@App\Models\Country::find($item['locable_id'])->title}}
                            @endif</td>
                        <td>@if($item['main'] == false) Нет @else Да @endif</td>
                        <td>
                            @php
                            $product = App\Models\Product::find($item['product_id']);
                            @endphp
                            {{$product['name']}}
                        </td>
                        <td>{{$item['size_id']}}</td>
                        <td>{{$item['status']}}</td>
                        <td>{{$item['price']}}</td>
                        <td>{{$item['score']}}</td>
                        <td>{{$item['sale']}}</td>
                        <td><a href="#" data-toggle="modal" data-target="#exampleModal{{$item['id']}}" class="btn btn-warning">Изменить</a></td>
                        <td>
                            <form action="{{route('admin.path.size.delete', $item['id'])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-block btn-danger delete-btn">X</button>
                            </form>
                        </td>
                    </tr>
                    {{--    Modal edit--}}
                    <form action="{{route('admin.path.size.edit', $item['id'])}}" method="POST">
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
                                            <option value="App\Models\City" @if($item['locable_type'] == 'City') selected @endif>City</option>
                                            <option value="App\Models\Region" @if($item['locable_type'] == 'Region') selected @endif>Region</option>
                                            <option value="App\Models\Country" @if($item['locable_type'] == 'Country') selected @endif>Country</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Главный</label>
                                        <select name="main" id="">
                                            <option value="1">Да</option>
                                            <option value="0" @if($item['main'] == 0) selected @endif>Нет</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Локация</label>
                                        <input type="text" name="model_id" value="{{$item['locable_id']}}" placeholder="17" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Товар</label>
                                        <select name="product_id" id="" class="form-control">
                                            @foreach($products as $product)
                                                <option value="{{$product['id']}}" @if($product['id'] == $item['product_id']) selected @endif>{{$product['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Размер</label>
                                        <select name="size_id" id="" class="form-control">
                                            @foreach($sizes as $size)
                                                <option value="{{$size['id']}}" @if($size['id'] == $item['size_id']) selected @endif>{{$size['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Статус</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1" @if($item['status'] == 1) selected @endif>Активен</option>
                                            <option value="0" @if($item['status'] == 0) selected @endif>Выключен</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Цена</label>
                                        <input type="text" name="price" class="form-control" value="{{$item['price']}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Балы</label>
                                        <input type="text" name="score" class="form-control" value="{{$item['score']}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Скидка</label>
                                        <input type="text" name="sale" class="form-control" value="{{$item['sale']}}">
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
        <form action="{{route('admin.path.size.create')}}" method="POST">
            @csrf
            <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Создать</h5>
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
                                <label for="">Главный</label>
                                <select name="main" id="">
                                    <option value="1">Да</option>
                                    <option value="0" >Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Товар</label>
                                <select name="product_id" id="" class="form-control">
                                    @foreach($products as $product)
                                        <option value="{{$product['id']}}">{{$product['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Размер</label>
                                <select name="size_id" id="" class="form-control">
                                    @foreach($sizes as $size)
                                        <option value="{{$size['id']}}" @if(isset($item['size_id']) && $size['id'] == $item['size_id']) selected @endif>{{$size['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Статус</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1">Активен</option>
                                    <option value="0">Выключен</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Цена</label>
                                <input type="text" name="price" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Балы</label>
                                <input type="text" name="score" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Скидка</label>
                                <input type="text" name="sale" class="form-control">
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
