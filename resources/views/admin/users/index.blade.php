@extends('layouts.admin')
@section('title', 'Пользователи')
@section('content')
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Роль</th>
                <th style="width: 40px">Редактировать</th>
                <th style="width: 40px">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user->roles->pluck('name')}}</td>
                <td><a href="{{route('admin.users.edit', $user['id'])}}" class="btn btn-warning">Изменить</a></td>
                <td><a href="#" class="btn btn-danger delete-btn">X</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
