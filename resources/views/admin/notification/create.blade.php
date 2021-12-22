@extends('layouts.admin')
@section('title', 'Добавить уведомление')
@section('content')
    <div class="card card-primary">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif

        <form action="{{ route('admin.notifications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Распродажа!">
                </div>

                <div class="form-group">
                    <label>Текст уведомления</label>
                    <textarea class="form-control" name="text" rows="3" placeholder="Текст ..."></textarea>
                </div>



                <div class="card bg-gradient-primary" id="users_table">
                    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Пользователи
                        </h3>
                        <!-- card tools -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body" style="display: block;">


                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Имя</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($users as $user)
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['name']}}</td>
                                    <td>
                                        <input type="checkbox" name="users_id[]" style="height: 1.25rem; width: 1rem;" value="{{$user['id']}}"> <br>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                    <!-- /.card-body-->
                    <div class="card-footer bg-transparent" style="display: block;">
                        <div class="row">
                            Выберите пользователей, которым нужно отправить уведомление
                        </div>
                        <!-- /.row -->
                    </div>
                </div>



                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="all_users" type="checkbox" id="customCheckbox1" value="option1">
                        <label for="customCheckbox1" class="custom-control-label" onclick="all_users()">Для всех пользователей?</label>
                    </div>
                </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>

    <script>
        function all_users(){

            if($('#users_table').is(':visible')){
                $('#users_table').hide();
            }else{
            $('#users_table').show();
        }
        }
    </script>
@endsection

