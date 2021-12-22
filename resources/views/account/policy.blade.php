@extends('layouts.account')
@section('title', 'Договор')
@section('content')
    <div class="header-profile__policy">
        <div class="header-profile__policy-add">Политика конфиденциальности</div>
        <div class="header-profile__policy-title">1. Обрабатываемые данные</div>
        <div class="header-profile__policy-text">
            1.1. Мы не осуществляем сбор ваших персональных данных с использованием Сайта.
            <br><br>
            1.2. Все данные, собираемые на Сайте, предоставляются и принимаются в обезличенной форме (далее – «Обезличенные данные»).
            <br><br>
            1.3. Обезличенные данные включают следующие сведения, которые не позволяют вас идентифицировать:
            <br><br>
            1.3.1. Информацию, которую вы предоставляете о себе самостоятельно с использованием онлайн-форм и программных модулей Сайта, включая имя или номер телефона и/или адрес электронной почты.
        </div>
        <button class="header-profile__policy-btn" id="headerProfilePolicyOpen">
            <a href="#">Читать далее</a>
        </button>
        <div class="header-profile__policy-texts display-n" id="headerProfilePolicyAdd">
            <div class="header-profile__policy-title ">1. Обрабатываемые данные</div>
            <div class="header-profile__policy-text">
                1.1. Мы не осуществляем сбор ваших персональных данных с использованием Сайта.
                <br><br>
                1.2. Все данные, собираемые на Сайте, предоставляются и принимаются в обезличенной форме (далее – «Обезличенные данные»).
                <br><br>
                1.3. Обезличенные данные включают следующие сведения, которые не позволяют вас идентифицировать:
                <br><br>
                1.3.1. Информацию, которую вы предоставляете о себе самостоятельно с использованием онлайн-форм и программных модулей Сайта, включая имя или номер телефона и/или адрес электронной почты.
            </div>
            <div class="header-profile__policy-text">
                1.1. Мы не осуществляем сбор ваших персональных данных с использованием Сайта.
                <br><br>
                1.2. Все данные, собираемые на Сайте, предоставляются и принимаются в обезличенной форме (далее – «Обезличенные данные»).
                <br><br>
                1.3. Обезличенные данные включают следующие сведения, которые не позволяют вас идентифицировать:
                <br><br>
                1.3.1. Информацию, которую вы предоставляете о себе самостоятельно с использованием онлайн-форм и программных модулей Сайта, включая имя или номер телефона и/или адрес электронной почты.
            </div>
        </div>
        <button class="header-profile__policy-btn display-n" id="headerProfilePolicyClose">
            <a href="#">Свернуть</a>
        </button>
    </div>

    <script>
        $('.header-profile__menu-list-policy').addClass('header-profile__menu-list-active')
    </script>
@endsection
