@extends('layouts.admin')
@section('title', 'Настройки')
@section('content')
        <div class="card card-primary card-tabs">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
                </div>
            @endif
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Мин. заказ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Квиз</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">События</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <form action="{{route('admin.settings.min.order')}}" method="POST">
                            @csrf
                        <input type="text" value="@if($min_order != NULL) {{$min_order['value']}} @endif" name="sum" placeholder="999"> <br> <button type="submit" class="btn mt-1 btn-success">Сохранить</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Для кого букет?</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:150px">Изображение</th>
                                        <th>Для кого?</th>
                                        <th style="width: 100px;">Изменить</th>
                                        <th style="width: 100px;">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($block1 as $block)
                                    <tr>
                                        <td>
                                            <img src="{{$block['img']}}" width="100%" height="100px" alt="">
                                        </td>
                                        <td><span class="badge bg-danger">{{$block['title']}}</span></td>
                                        <td><button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#edit-modal{{$block['id']}}">Изменить</button></td>
                                        <td>
                                            <form action="{{route('admin.settings.block.delete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$block['id']}}" name="id">
                                            <button type="submit" class="btn btn-block btn-outline-danger delete-btn">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-who">Добавить</button>
                                </ul>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Тип сборки</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:150px">Изображение</th>
                                        <th>Тип</th>
                                        <th style="width: 100px;">Изменить</th>
                                        <th style="width: 100px;">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($block2 as $block)
                                        <tr>
                                            <td>
                                                <img src="{{$block['img']}}" width="100%" height="100px" alt="">
                                            </td>
                                            <td><span class="badge bg-danger">{{$block['title']}}</span></td>
                                            <td><button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#edit-modal{{$block['id']}}">Изменить</button></td>
                                            <td>
                                                <form action="{{route('admin.settings.block.delete')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{$block['id']}}" name="id">
                                                    <button type="submit" class="btn btn-block btn-outline-danger delete-btn">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-type">Добавить</button>
                                </ul>
                            </div>
                        </div>

{{--                        Тона --}}

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Оттенки цветов в букете</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:150px">Изображение</th>
                                        <th>Оттенок</th>
                                        <th style="width: 100px;">Изменить</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <img src="{{$block3_1['img']}}" width="100%" height="100px" alt="">
                                            </td>
                                            <td><span class="badge bg-danger">Насыщенные тона</span></td>
                                            <td><button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#edit-modal31">Изменить</button></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="{{$block3_2['img']}}" width="100%" height="100px" alt="">
                                            </td>
                                            <td><span class="badge bg-danger">Нежная пастель</span></td>
                                            <td><button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#edit-modal32">Изменить</button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
{{--                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-type">Добавить</button>--}}
                                </ul>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-header">
{{--                                <h3 class="card-title">Оттенки цветов в букете</h3>--}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:150px">Изображение</th>
                                        <th>Тип</th>
                                        <th style="width: 100px;">Изменить</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <img src="{{$block41['img']}}" width="100%" height="100px" alt="">
                                        </td>
                                        <td><span class="badge bg-danger">В упаковке</span></td>
                                        <td><button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#edit-modal41">Изменить</button></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <img src="{{$block42['img']}}" width="100%" height="100px" alt="">
                                        </td>
                                        <td><span class="badge bg-danger">Под ленту</span></td>
                                        <td><button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#edit-modal42">Изменить</button></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
{{--                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-type">Добавить</button>--}}
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">

                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Событие</th>
                                <th style="width: 40px;">Изменить</th>
                                <th style="width: 40px">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>{{$event['id']}}</td>
                                <td>{{$event['title']}}</td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#event-edit-{{$event['id']}}" class="btn btn-warning">Изменить</button>
                                </td>
                                <td><a href="{{route('settings.event.delete', $event['id'])}}" class="btn btn-danger">X</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <form action="{{route('settings.event.create')}}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Название события" class="form-control">
                            <button type="submit" class="btn btn-success mt-2">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

{{--    Modal who--}}
        <div class="modal" id="modal-who" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.settings.add.who')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Для кого букет?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <input type="hidden" name="block" value="1">
                            <input type="file" name="img"> <br>
                            <input type="text" name="name" placeholder="Название" class="form-control mt-2">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
{{--    End modal--}}

        {{--    Modal type--}}
        <div class="modal" id="modal-type" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.settings.add.who')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Для кого букет?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        type!!!
                        <div class="modal-body">
                            <input type="hidden" name="block" value="2">
                            <input type="file" name="img"> <br>
                            <input type="text" name="name" placeholder="Название" class="form-control mt-2">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--    End modal--}}

{{--    edit modal--}}
        @foreach($block1 as $block)
            <div class="modal" id="edit-modal{{$block['id']}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{route('admin.settings.block.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Изменить</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="{{$block['id']}}">
                                <input type="hidden" name="block" value="1">
                                <input type="file" value="{{$block['img']}}" name="img"> <br>
                                <input type="text" value="{{$block['title']}}" name="name" placeholder="Название" class="form-control mt-2">
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

        @foreach($block2 as $block)
            <div class="modal" id="edit-modal{{$block['id']}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{route('admin.settings.block.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Изменить</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="{{$block['id']}}">
                                <input type="hidden" name="block" value="2">
                                <input type="file" value="{{$block['img']}}" name="img"> <br>
                                <input type="text" value="{{$block['title']}}" name="name" placeholder="Название" class="form-control mt-2">
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

        <div class="modal" id="edit-modal31" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.settings.block.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$block3_1['id']}}">
                            <input type="hidden" name="block" value="31">
                            <input type="file" value="{{$block3_1['img']}}" name="img"> <br>
                            <input type="hidden" value="{{$block3_1['title']}}" name="name" placeholder="Название" class="form-control mt-2">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal" id="edit-modal32" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.settings.block.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$block3_2['id']}}">
                            <input type="hidden" name="block" value="32">
                            <input type="file" value="{{$block3_2['img']}}" name="img"> <br>
                            <input type="hidden" value="{{$block3_2['title']}}" name="name" placeholder="Название" class="form-control mt-2">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="modal" id="edit-modal41" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.settings.block.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$block41['id']}}">
                            <input type="hidden" name="block" value="41">
                            <input type="file" value="{{$block41['img']}}" name="img"> <br>
                            <input type="hidden" value="{{$block41['title']}}" name="name" placeholder="Название" class="form-control mt-2">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal" id="edit-modal42" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.settings.block.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$block42['id']}}">
                            <input type="hidden" name="block" value="42">
                            <input type="file" value="{{$block42['img']}}" name="img"> <br>
                            <input type="hidden" value="{{$block42['title']}}" name="name" placeholder="Название" class="form-control mt-2">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
{{--    end edit--}}

{{--Event edit--}}
        @foreach($events as $event)
        <div class="modal" id="event-edit-{{$event['id']}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('settings.event.edit', $event['id'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="name" value="{{$event['title']}}">
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
{{--end--}}
@endsection
