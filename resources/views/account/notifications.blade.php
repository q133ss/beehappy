@extends('layouts.account')
@section('title', 'Уведомления')
@section('content')
    <div class="header-profile__notif" style="height: auto">
        <div class="header-profile__notif-title">Уведомления</div>
        <div class="header-profile__notif-table">
            <div class="header-profile__notif-table-last">
                <div class="header-profile__notif-table-last-time">
                    <div class="header-profile__notif-table-last-time-day">Сегодня</div>
                    <div class="header-profile__notif-table-last-time-date">Дата</div>
                </div>
                <ul class="header-profile__notif-table-last-list">
                    @if($notifications_current->count() == 0)
                        <li class="header-profile__notif-table-last-item">
                            <div class="header-profile__notif-table-last-item-text-title">
                                Уведомлений нет
                            </div>
                        </li>
                    @endif
                    @foreach($notifications_current as $notification)
                    <li class="header-profile__notif-table-last-item">
                        <div class="header-profile__notif-table-last-item-img"></div>
                        <div class="header-profile__notif-table-last-item-text">
                            <div class="header-profile__notif-table-last-item-text-title">{{$notification['title']}}</div>
                            <div class="header-profile__notif-table-last-item-text-add">{!! $notification['text'] !!}</div>
                        </div>
                        <div class="header-profile__notif-table-last-item-date">
                            <div class="header-profile__notif-table-last-item-date-time">{{mb_substr($notification['created_at'], 10, 6)}}</div>
                            <div class="header-profile__notif-table-last-item-date-day">{{mb_substr($notification['created_at'], 0, 10)}}</div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="header-profile__notif-table-prev">
                <div class="header-profile__notif-table-prev-time">
                    <div class="header-profile__notif-table-prev-time-day">Прошлые уведомления</div>
                    <div class="header-profile__notif-table-prev-time-date">Дата</div>
                </div>
                <ul class="header-profile__notif-table-prev-list">
                    @foreach($notifications_old as $notification)
                    <li class="header-profile__notif-table-prev-item">
                        <div class="header-profile__notif-table-prev-item-img"></div>
                        <div class="header-profile__notif-table-prev-item-text">
                            <div class="header-profile__notif-table-prev-item-text-title">{{$notification['title']}}</div>
                            <div class="header-profile__notif-table-prev-item-text-add">{!! $notification['text'] !!}</div>
                        </div>
                        <div class="header-profile__notif-table-prev-item-date">
                            <div class="header-profile__notif-table-prev-item-date-time">{{mb_substr($notification['created_at'], 10, 6)}}</div>
                            <div class="header-profile__notif-table-prev-item-date-day">{{mb_substr($notification['created_at'], 0, 10)}}</div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>

{{--            <button class="header-profile__notif-table-btn" id="profileNotifBtnOpen">Смотреть еще</button>--}}
{{--            <ul class="header-profile__notif-table-prev-list display-n" id="profileNotifBtnAdd">--}}
{{--                <li class="header-profile__notif-table-prev-item">--}}
{{--                    <div class="header-profile__notif-table-prev-item-img"></div>--}}
{{--                    <div class="header-profile__notif-table-prev-item-text">--}}
{{--                        <div class="header-profile__notif-table-prev-item-text-title">Flowow. com</div>--}}
{{--                        <div class="header-profile__notif-table-prev-item-text-add">Адрес: 350002 г. Краснодар ул. Фабричная д.21Электронная почта: INFO@BEEHAPPY24.RU Телефоны: 8 (800) 505 7233</div>--}}
{{--                    </div>--}}
{{--                    <div class="header-profile__notif-table-prev-item-date">--}}
{{--                        <div class="header-profile__notif-table-prev-item-date-time">16.55</div>--}}
{{--                        <div class="header-profile__notif-table-prev-item-date-day">12.01.22</div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="header-profile__notif-table-prev-item">--}}
{{--                    <div class="header-profile__notif-table-prev-item-img"></div>--}}
{{--                    <div class="header-profile__notif-table-prev-item-text">--}}
{{--                        <div class="header-profile__notif-table-prev-item-text-title">Flowow. com</div>--}}
{{--                        <div class="header-profile__notif-table-prev-item-text-add">Адрес: 350002 г. Краснодар ул. Фабричная д.21Электронная почта: INFO@BEEHAPPY24.RU Телефоны: 8 (800) 505 7233</div>--}}
{{--                    </div>--}}
{{--                    <div class="header-profile__notif-table-prev-item-date">--}}
{{--                        <div class="header-profile__notif-table-prev-item-date-time">16.55</div>--}}
{{--                        <div class="header-profile__notif-table-prev-item-date-day">12.01.22</div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="header-profile__notif-table-prev-item">--}}
{{--                    <div class="header-profile__notif-table-prev-item-img"></div>--}}
{{--                    <div class="header-profile__notif-table-prev-item-text">--}}
{{--                        <div class="header-profile__notif-table-prev-item-text-title">Flowow. com</div>--}}
{{--                        <div class="header-profile__notif-table-prev-item-text-add">Адрес: 350002 г. Краснодар ул. Фабричная д.21Электронная почта: INFO@BEEHAPPY24.RU Телефоны: 8 (800) 505 7233</div>--}}
{{--                    </div>--}}
{{--                    <div class="header-profile__notif-table-prev-item-date">--}}
{{--                        <div class="header-profile__notif-table-prev-item-date-time">16.55</div>--}}
{{--                        <div class="header-profile__notif-table-prev-item-date-day">12.01.22</div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <button class="header-profile__notif-table-btn display-n" id="profileNotifBtnClose">Свернуть</button>--}}
        </div>
    </div>

    <script>
        $('.header-profile__menu-list-notification').addClass('header-profile__menu-list-active')
    </script>
@endsection
