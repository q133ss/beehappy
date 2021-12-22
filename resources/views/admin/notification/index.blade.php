@extends('layouts.admin')
@section('title', 'Все уведомления')
@section('content')

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
    @endif

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Название</th>
                <th style="width: 150px">Изменить</th>
                <th style="width: 40px">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notifications as $notif)
            <tr>
                <td>{{$notif['id']}}</td>

                <td>{{$notif['title']}}</td>

                <td>
                    <a href="{{route('admin.notifications.edit', $notif['id'])}}"  class="btn btn-block btn-primary">Изменить</a>
                </td>
                <td>
                    <form action="{{route('admin.notifications.destroy', $notif['id'])}}" method="POST">
                        @csrf
                        <button href="#" class="btn btn-block btn-danger delete-btn">X</button>
                    </form>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /.row -->
@endsection
