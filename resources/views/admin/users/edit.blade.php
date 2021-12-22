@extends('layouts.admin')
@section('title', 'Изменить пользователя')
@section('content')
    <form action="{{route('admin.users.update', $user['id'])}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Имя</label>
            <input type="text" name="name" class="form-control" value="{{$user['name']}}">
        </div>
        <div class="form-group">
            <label for="">Фото профиля</label>
            <input type="file" name="avatar" class="form-control-file">
            Текущее:<br>
            <img src="{{$user['avatar_url']}}" width="100px" height="100px" alt="">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" value="{{$user['email']}}" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Телефон</label>
            <input type="text" value="{{$user['phone']}}" name="phone" class="form-control">
        </div>


        <div class="form-group">
            <label for="">Дата рождения</label>
            <div class="form-group">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" name="date_of_birthday" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Балы</label>
            <input type="text" value="{{$user['scores']}}" name="scores" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Роль</label>
            <select name="role" id="">
                <option value="admin">Админ</option>
                <option value="user">Пользователь</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
@endsection
