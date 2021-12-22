@extends('layouts.account')
@section('title', 'Проверить статус заказа')
@section('content')
    <div class="header-profile__status">
        <div class="header-profile__status-info">
            <div class="header-profile__status-info-text">Введите № заказа</div>
            <input type="text" class="header-profile__status-info-input" placeholder="№ заказа">
            <button class="header-profile__status-info-btn" type="button" data-bs-toggle="modal" data-bs-target="#profileStatusModel"><a href="#">Проверить статус заказа</a></button>
            <div class="modal fade" id="profileStatusModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content header-profile__status-info-model">
                        <button type="button" class="btn-close header-profile__status-info-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.3281 22.3296L40.2735 40.275" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22.1313 40.4727L40.4712 22.1328" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </button>
                        <p>😉 <br>Все в порядке, уже собираем ! ! ! </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-profile__status-img">
            <div class="header-profile__status-img-item">
                Мемоджи
            </div>
        </div>
    </div>

    <script>
        $('.header-profile__menu-list-status').addClass('header-profile__menu-list-active')
    </script>
@endsection
