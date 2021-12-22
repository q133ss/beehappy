@extends('layouts.admin')
@section('title', 'Заказы')
@section('content')
    <div class="card-body p-0">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif
        <form action="{{route('admin.city.search')}}" class="mb-2 ml-0 row">
            <input type="text" name="search" class="col-2 form-control" placeholder="# заказа">
            <button type="submit" class="btn btn-outline btn-outline-primary ml-2">Поиск</button>
        </form>
        <table class="table table-sm">
            <thead>
            <tr>
                <th style="width: 100px;">#</th>
                <th>Имя получателя</th>
                <th style="width: 200px">Телефон получателя</th>
                <th style="width: 400px">Адрес</th>
                <th style="width: 150px">Время доставки</th>
                <th style="width: 150px">Статус</th>
                <th style="width: 40px">Подробнее</th>
                <th style="width: 40px">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order['id']}}</td>
                    <td>{{$order['receiver_name'] ? $order['receiver_name']:$order['customer_name']}}</td>
                    <td>{{$order['receiver_phone'] ? $order['receiver_phone']:$order['customer_phone']}}</td>
                    <td>Г. {{$order['delivery_city']}} Ул. {{$order['delivery_city']}}, д. {{$order['home_number']}} Э.{{$order['entrance']}} Кв. {{$order['entrance']}}</td>
                    <td>{{$order['delivery_time']}}</td>
                    <td>@if($order['status'] == 1 || $order['status'] == 0)
                            <span class="text-danger">В обработке</span>
                        @elseif($order['status'] == 2)
                            <span class="text-primary">Выполняется</span>
                        @elseif($order['status'] == 3)
                            <span class="text-success">Доставляется</span>
                        @elseif($order['status'] == 4)
                            <span class="text-info">Завершен</span>
                        @endif</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit-modal{{$order['id']}}" class="btn btn-block btn-primary">Подробнее</button>
                    </td>

                    <td>
                        <form action="{{route('admin.city.delete', $order['id'])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger delete-btn">X</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt2">
            {{$orders->links()}}
        </div>
    </div>


    @foreach($orders as $order)
        <div class="modal" id="edit-modal{{$order['id']}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Имя покупателя: {{$order['customer_name']}}</p>
                            <p>Телефон покупателя: {{$order['customer_phone']}}</p>
                            <p>Имя получателя: {{$order['receiver_name']}}</p>
                            <p>Телефон получателя:{{$order['receiver_phone']}}</p>
                            <p>Адрес: Город: {{$order['delivery_city']}} Улица: {{$order['delivery_city']}}, дом: {{$order['home_number']}} этаж:{{$order['entrance']}} Кв. {{$order['entrance']}}</p>
                            <p>Время доставки: {{$order['delivery_time']}}</p>
                            <p>Доставка за пределы города: {{$order['deliver_outside']}}</p>
                            <p>Звонок получателю перед отправкой: @if($order['call_customer'] == 'on') Да @else Нет @endif</p>
                            <p>Отправить фото букета на Whatsapp: @if($order['give_photo'] == 'on') Да @else Нет @endif</p>
                            <p>Текст бесплатной открытки: {{$order['card_text']}}</p>
                            <p>Текст большой открытки: {{$order['big_card_text']}}</p>
                            <p>Цена доставки: {{$order['delivery_price']}}</p>
                            <p>
                                Товары: <br>
                                @foreach($order->orderProducts as $product)
                                <hr>
                                    ID товара: {{$product['product_id']}} <br>
                                    Название товара: {{App\Models\Product::find($product['product_id'])->name}} <br>
                                    Размер: {{App\Models\Size::find($product['size_id'])->name}} <br>
                                    Цвет: {{App\Models\Color::find($product['color_id'])->name}} <br>
                                    Цена: {{$product['price']}} <br>
                                    Баллы: {{$product['score']}} <br>
                                    Цена: {{$product['sale']}} <br>
                                    Наценка: {{$product['charge']}} <br>
                                    Кол-во: {{$product['qty']}} <br>
                                <a href="{{route('admin.products.edit', $product['product_id'])}}" class="btn btn-dark btn-sm mt-2">Изменить</a>
                                <hr>
                                @endforeach
                            </p>
                            <p>Статус: @if($order['status'] == 1 || $order['status'] == 0)
                                    <span class="text-danger">В обработке</span>
                                @elseif($order['status'] == 2)
                                    <span class="text-primary">Выполняется</span>
                                @elseif($order['status'] == 3)
                                    <span class="text-success">Доставляется</span>
                                @elseif($order['status'] == 4)
                                    <span class="text-info">Завершен</span>
                                @endif</p>
                            <form action="{{route('admin.orders.photo.create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Фото готового букета</label>
                                    <input type="hidden" name="order_id" value="{{$order['id']}}">
                                    <input type="file" class="form-control-file" name="img">
                                    Текущее:
                                    @if(empty($order->orderPhotos))
                                        Отсутствует
                                    @else
                                    <br>
                                    @foreach($order->orderPhotos as $photo)
                                    <img src="{{$photo['img']}}" width="500px" height="500px" alt=""> <br>
                                    @endforeach
                                    @endif
                                    <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>

                </div>
            </div>
        </div>
    @endforeach

@endsection
