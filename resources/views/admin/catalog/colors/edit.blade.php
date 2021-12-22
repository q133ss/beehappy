@extends('layouts.admin')
@section('title', 'Цвета')
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
                <th>HEX</th>
                <th style="width: 200px">Изменить</th>
                <th style="width: 40px">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($colors as $color)
                <tr>
                    <td>{{$color['name']}}</td>
                    <td>{{$color['hex']}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit-modal{{$color['id']}}" class="btn btn-block btn-warning">Изменить</button>
                    </td>
                    <td>
                        <form action="{{route('admin.catalog.color.delete', $color['id'])}}" method="POST">
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


    @foreach($colors as $color)
        <div class="modal" id="edit-modal{{$color['id']}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.catalog.color.edit', $color['id'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$color['id']}}">
                            <input type="text" value="{{$color['hex']}}" name="name" placeholder="Название" class="form-control mt-2">
                            <input type="text" value="{{$color['name']}}" name="hex"> <br>
                            <small><a href="https://www.google.com/search?q=%23ffffff&sxsrf=AOaemvJaR876U_jcexKEaVlq8kKARIqEsQ%3A1639150010126&ei=unGzYarPBuLorgTFxY7wCw&ved=0ahUKEwiqlNjQxdn0AhVitIsKHcWiA74Q4dUDCA4&uact=5&oq=%23ffffff&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECc6BwgjELADECc6BwgAEEcQsAM6CAgAEIAEELEDOgUILhCABDoFCAAQgARKBAhBGABKBAhGGABQfFiyA2D3BGgBcAJ4AIABVIgB6wGSAQEzmAEAoAEByAEKwAEB&sclient=gws-wiz" target="_blank">Ссылка</a></small>
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
                <form action="{{route('admin.catalog.color.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Добавить</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" required name="name" placeholder="Название"> <br>
                        <input type="text" required name="hex" placeholder="#f1f1f1" class="form-control mt-2">
                        <small><a href="https://www.google.com/search?q=%23ffffff&sxsrf=AOaemvJaR876U_jcexKEaVlq8kKARIqEsQ%3A1639150010126&ei=unGzYarPBuLorgTFxY7wCw&ved=0ahUKEwiqlNjQxdn0AhVitIsKHcWiA74Q4dUDCA4&uact=5&oq=%23ffffff&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECc6BwgjELADECc6BwgAEEcQsAM6CAgAEIAEELEDOgUILhCABDoFCAAQgARKBAhBGABKBAhGGABQfFiyA2D3BGgBcAJ4AIABVIgB6wGSAQEzmAEAoAEByAEKwAEB&sclient=gws-wiz" target="_blank">Ссылка</a></small>
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
