@extends('layouts.admin')
@section('title', 'Все новости')
@section('content')
    <div class="card">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Название</th>
                    <th style="width: 150px">Изменить</th>
                    <th style="width: 40px">Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $item)
                <tr>
                    <td>{{$item['id']}}</td>
                    <td>{{$item['title']}}</td>
                    <td>
                        <a href="{{route('admin_news.edit', $item['id'])}}" class="btn btn-block btn-warning">Изменить</a>
                    </td>
                    <td>
                        <form action="{{route('admin_news.destroy', $item['id'])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-block btn-danger delete-btn">X</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
