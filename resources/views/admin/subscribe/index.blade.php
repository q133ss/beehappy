@extends('layouts.admin')
@section('title', 'Подписка')
@section('meta')
    <link href="/admin_panel/plugins/select2/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="card-body p-0">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif
        <table class="table table-sm">
            <thead>
            <tr>
                <th style="width: 100px;">Название</th>
                <th>Цена</th>
                <th style="width: 200px">Изменить</th>
                <th style="width: 40px">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subscribes as $category)
                <tr>
                    <td>
                        {{$category['title']}}
                    </td>
                    <td>
                        {{$category['price']}}
                    </td>
                    <td>
                        <button data-toggle="modal" data-target="#edit-modal{{$category['id']}}" class="btn btn-block btn-warning">Изменить</button>
                    </td>
                    <td>
                        <form action="{{route('admin.category.delete', $category['id'])}}" method="POST">
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


    @foreach($subscribes as $category)
        <div class="modal" id="edit-modal{{$category['id']}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.subscribe.update', $category['id'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" required name="title" value="{{$category['title']}}" placeholder="Название" class="form-control mt-2">
                            <textarea name="description" id="" cols="30" class="form-control mt-2" rows="10">{{$category['description']}}</textarea>
                            <input type="text" name="price" value="{{$category['price']}}" placeholder="Цена" class="form-control mt-2">
                            <input type="text" name="salePrice" value="{{$category['salePrice']}}" placeholder="Цена со скидкой" class="form-control mt-2">
                            <input type="text" name="bals" value="{{$category['bals']}}" placeholder="Балы" class="form-control mt-2">

                            <div class="form-group mt-2">
                                @foreach((array)json_decode($category['gifts']) as $gift)
                                <input type="text" name="gifts[]" class="form-control mt-2" value="{{$gift}}" placeholder="Название подарка">
                                @endforeach
                                <div id="addit_fields"></div>
                                <span class="btn btn-default mt-1" onclick="add_field()">+</span>
                            </div>

                            <select class="js-example-basic-multiple" style="width: 100%; margin: 0 auto;" name="products[]" multiple="multiple">
                                @foreach($products as $product)
                                    <option value="{{$product['id']}}" @if(in_array($product['id'], (array)json_decode($category['products']))) selected @endif>{{$product['name']}}</option>
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
                <form action="{{route('admin.subscribe.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Добавить</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" required name="title" placeholder="Название" class="form-control mt-2">
                        <textarea name="description" id="" cols="30" class="form-control mt-2" rows="10"></textarea>
                        <input type="text" name="price" placeholder="Цена" class="form-control mt-2">
                        <input type="text" name="salePrice" placeholder="Цена со скидкой" class="form-control mt-2">
                        <input type="text" name="bals" placeholder="Балы" class="form-control mt-2">

                        <div class="form-group">
                            <input type="text" name="gifts[]" class="form-control" placeholder="Название подарка">
                            <div id="addit_fields"></div>
                            <span class="btn btn-default mt-1" onclick="add_field()">+</span>
                        </div>

                        <select class="js-example-basic-multiple" style="width: 100%; margin: 0 auto;" name="products[]" multiple="multiple">
                            @foreach($products as $product)

                            <option value="{{$product['id']}}">{{$product['name']}}</option>
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
@section('scripts')
    <script src="/admin_panel/plugins/select2/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Выберите товары',
            });
            $('.select2-container--default').addClass('mt-2')
        });


        function add_field(){
            $('#addit_fields').append('<input type="text" name="gifts[]" class="form-control" placeholder="Название подарка">');
        }
    </script>
@endsection
