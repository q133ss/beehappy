@extends('layouts.admin')
@section('title', 'Товары')
@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
    @endif
    <div class="my-header d-flex justify-content-between">
    <form action="{{route('admin.product.search')}}" method="GET" class="row w-100">
    <input type="text" name="search" class="form-control col-2" placeholder="Поиск">
    <button class="btn btn-success col-1 ml-2 mb-3" type="submit">Поиск</button>
    </form>

    <select class="form-control" style="width: 125px" onchange="location.href='/admin/product/filter/'+$(this).val()">
        <option selected disabled>Категория</option>
        @foreach($categories as $category)
            <option value="{{$category['id']}}">{{\App\Models\Category::TYPES[$category['type']]}} | {{$category['name']}}</option>
        @endforeach
    </select>
        <a href="{{route('admin.product.create')}}" type="button" class="btn mb-3 ml-2 btn-success">Добавить</a>
    </div>

    <table class="table table-sm">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Изображение</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Скидка</th>
            <th>Категория</th>
            <th>Балы</th>
            <th>Статус</th>
            <th style="width: 40px">Изменить</th>
            <th style="width: 40px">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product['id']}}</td>
            <td><img src="{{$product['img']}}" height="100px" width="100px" alt=""></td>
            <td>
                {{$product['name']}}
            </td>
            <td>
                {{$product['price']}}
            </td>
            <td>{{$product['sale']}}</td>
            <td>{{$product->category['name']}}</td>
            <td>{{$product->score}}</td>
            <td>
                @if($product->status == 1)
                    Активен
                @else
                    Выключен
                @endif
            </td>
            <td><a href="{{route('admin.products.edit', $product['id'])}}" type="button" class="btn btn-warning">Изменить</a></td>
            <td><button type="button" class="btn btn-danger">Х</button></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <style>
        .pagination{
            margin-bottom: 0;
        }
    </style>
    <div class="d-flex justify-content-between">
    {{$products->links()}}
        <a href="{{route('admin.product.create')}}" type="button" class="btn btn-success">Добавить</a>
    </div>
@endsection
