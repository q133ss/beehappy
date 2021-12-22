<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.0/animate.min.css"/>
    <script src="https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/css/style.min.css">
    @yield('meta')
</head>
<body>
<div class="status-wrapper">


    <div class="header-profile">
        <div class="header-profile__burger">
            <div class="header-profile__burger-bg">
                <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.1278 16.887H7.08217C6.46207 16.887 5.95947 16.3844 5.95947 15.7643C5.95947 15.1442 6.46207 14.6416 7.08217 14.6416H22.1275C22.7476 14.6416 23.2502 15.1442 23.2502 15.7643C23.2502 16.3844 22.7479 16.887 22.1278 16.887Z" fill="#16B8C3"/>
                    <path d="M22.1278 9.84012H7.08217C6.46207 9.84012 5.95947 9.33753 5.95947 8.71742C5.95947 8.09732 6.46207 7.59473 7.08217 7.59473H22.1275C22.7476 7.59473 23.2502 8.09732 23.2502 8.71742C23.2505 9.33753 22.7479 9.84012 22.1278 9.84012Z" fill="#16B8C3"/>
                    <path d="M22.1278 2.79325H7.08217C6.46207 2.79325 5.95947 2.29065 5.95947 1.67055C5.95947 1.05045 6.46207 0.547852 7.08217 0.547852H22.1275C22.7476 0.547852 23.2502 1.05045 23.2502 1.67055C23.2502 2.29065 22.7479 2.79325 22.1278 2.79325Z" fill="#16B8C3"/>
                    <path d="M2.25778 3.26557C3.09051 3.26557 3.76557 2.59051 3.76557 1.75778C3.76557 0.925058 3.09051 0.25 2.25778 0.25C1.42506 0.25 0.75 0.925058 0.75 1.75778C0.75 2.59051 1.42506 3.26557 2.25778 3.26557Z" fill="#16B8C3"/>
                    <path d="M2.25778 10.2255C3.09051 10.2255 3.76557 9.55047 3.76557 8.71774C3.76557 7.88502 3.09051 7.20996 2.25778 7.20996C1.42506 7.20996 0.75 7.88502 0.75 8.71774C0.75 9.55047 1.42506 10.2255 2.25778 10.2255Z" fill="#16B8C3"/>
                    <path d="M2.25778 17.1865C3.09051 17.1865 3.76557 16.5114 3.76557 15.6787C3.76557 14.846 3.09051 14.1709 2.25778 14.1709C1.42506 14.1709 0.75 14.846 0.75 15.6787C0.75 16.5114 1.42506 17.1865 2.25778 17.1865Z" fill="#16B8C3"/>
                </svg>

            </div>
        </div>
        <div class="header-profile__logo">
            <div class="header-profile__logo-img" onclick="location.href='/'">
                <svg width="50" height="75" viewBox="0 0 50 75" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="50" height="75" fill="url(#pattern0)"/>
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0" transform="translate(-0.01) scale(0.01 0.00666667)"/>
                        </pattern>
                        <image id="image0" width="102" height="150" xlink:href="data:image/png;base64,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"/>
                    </defs>
                </svg>

            </div>
            <div class="header-profile__logo-text">
                BeEhappy
            </div>
        </div>
        <div class="header-profile__client">
            <div class="header-profile__client-img" style="background-image: url('{{Auth::user()->avatar_url}}'); background-size: cover"></div>
            <div class="header-profile__client-name">{{Auth::user()->name}}</div>
        </div>
    </div>


    <div class="header-profile__menu">
        <ul class="header-profile__menu-list">
            <div class="header-profile__menu-list-close">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.28564 6.28516L18.0004 17.9999" stroke="#16B8C3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.15674 18.1289L18.1289 6.1567" stroke="#16B8C3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </div>
            <li class="header-profile__menu-list-status">
                <a href="{{route('profile.index')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>Проверить статус заказа</p>
                </a>
            </li>
            <li class="header-profile__menu-list-order">
                <a href="{{route('profile.orders')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>Мои заказы</p>
                </a>
            </li>
            <li class="header-profile__menu-list-chosen">
                <a href="{{route('profile.favorite')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>Избранное</p>
                </a>
            </li>
            <li class="header-profile__menu-list-balls">
                <a href="{{route('profile.balls')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <h3>Бонусные баллы</h3>
                    <p>+{{Auth::user()->scores}} баллов </p>
                </a>
            </li>
            <li class="header-profile__menu-list-notification">
                <a href="{{route('profile.notifications')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <h3>Уведомления</h3>
                    <div class="header-profile__menu-list-notification-count">0</div>
                </a>
            </li>
            <li class="header-profile__menu-list-event">
                <a href="{{route('profile.event')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>Календарь событий</p>
                </a>
            </li>
            <li class="header-profile__menu-list-stock">
                <a href="{{route('profile.stock')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>Календарь скидок</p>
                </a>
            </li>

            <li class="header-profile__menu-list-donat">
                <a href="{{route('profile.donat')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>Благодарность менеджеру</p>
                </a>
            </li>
            <li class="header-profile__menu-list-histor">
                <a href="{{route('profile.history')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>История просмотров</p>
                </a>
            </li>
            <li class="header-profile__menu-list-offers">
                <a href="{{route('profile.offer')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>Договор оферты</p>
                </a>
            </li>
            <li class="header-profile__menu-list-policy">
                <a href="{{route('profile.policy')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>Политика конфиденциальности</p>
                </a>
            </li>
            <li class="header-profile__menu-list-profil">
                <a href="{{route('profile.settings')}}">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1245 0C12.1693 0 11.2936 0.304774 10.5216 0.905874C9.78159 1.48215 9.28887 2.21615 8.9988 2.74989C8.70873 2.21612 8.21601 1.48215 7.47596 0.905874C6.70404 0.304774 5.82829 0 4.87308 0C2.20745 0 0.197266 2.19535 0.197266 5.10659C0.197266 8.25174 2.70512 10.4036 6.50168 13.6612C7.14639 14.2145 7.87716 14.8415 8.6367 15.5103C8.73682 15.5986 8.8654 15.6472 8.9988 15.6472C9.1322 15.6472 9.26079 15.5986 9.3609 15.5103C10.1205 14.8414 10.8512 14.2144 11.4963 13.6609C15.2925 10.4036 17.8003 8.25174 17.8003 5.10659C17.8003 2.19535 15.7901 0 13.1245 0Z" fill="url(#paint0_linear)"/>
                        <defs>
                            <linearGradient id="paint0_linear" x1="8.9988" y1="0" x2="8.9988" y2="15.6472" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#16B8C3"/>
                                <stop offset="1" stop-color="#281AC8"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p>Настройка профиля</p>
                </a>
            </li>
            <li class="header-profile__menu-list-btn">
                <a href="/"><p>Вернуться к сайту</p></a>
            </li>
            <li class="header-profile__menu-list-btn">
                <a href="{{route('logout.perform')}}"><p>Выйти</p></a>
            </li>
        </ul>
        @yield('content')
    </div>


    <footer class="footer">
        <div class="containers">
            <div class="footer__block">
                <div class="footer__block-media-logo">
                    <div class="footer__block-media-logo-item">
                        <div class="footer__block-media-logo-img">
                            <img src="/img/logo.png" alt="logo">
                        </div>
                        <div class="footer__block-media-logo-title">BeEhappy</div>
                    </div>
                </div>
                <div class="footer__block-hr"></div>
                <div class="footer__block-text">
                    <div class="footer__block-text-catalog">
                        <div class="footer__block-text-catalog-title">Категории</div>
                        <ul class="footer__block-text-catalog-list">
                            <li class="footer__block-text-catalog-item">Конструктор букетов</li>
                            <li class="footer__block-text-catalog-item">Букет на вкус флориста</li>
                            <li class="footer__block-text-catalog-item">Добавить к букету</li>
                            <li class="footer__block-text-catalog-item">Подборки</li>
                            <li class="footer__block-text-catalog-item">Монобукеты</li>
                            <li class="footer__block-text-catalog-item">Оплата доставки за город</li>
                        </ul>
                    </div>
                    <div class="footer__block-text-info">
                        <div class="footer__block-text-info-title">Информация</div>
                        <ul class="footer__block-text-info-list">
                            <li class="footer__block-text-info-item">Популярные вопросы</li>
                            <li class="footer__block-text-info-item">Новости и скидки</li>
                            <li class="footer__block-text-info-item">Оплата</li>
                            <li class="footer__block-text-info-item">О нас</li>
                            <li class="footer__block-text-info-item">Договор оферты</li>
                            <li class="footer__block-text-info-item">Политика конфиденциальности</li>
                            <li class="footer__block-text-info-item">Контакты</li>
                        </ul>
                    </div>
                    <div class="footer__block-text-logo">
                        <div class="footer__block-text-logo-item">
                            <div class="footer__block-text-logo-img">
                                <img src="/img/logo.png" alt="logo">
                            </div>
                            <div class="footer__block-text-logo-title">BeEhappy</div>
                        </div>
                    </div>
                </div>
                <div class="footer__block-hr"></div>
                <div class="footer__block-contact">
                    <div class="footer__block-contact-title">
                        Сopyright © 2021 Beehapy
                    </div>
                    <ul class="footer__block-contact-tag">
                        <li class="footer__block-contact-tag-item">Terms</li>
                        <li class="footer__block-contact-tag-item">Privacy</li>
                        <li class="footer__block-contact-tag-item">Cookies</li>
                    </ul>
                    <ul class="footer__block-contact-social">
                        <li class="footer__block-contact-social-item">
                            <a href="#">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M7.5024 3.64868C5.37552 3.64868 3.65365 5.37243 3.65365 7.49743C3.65365 9.6243 5.3774 11.3462 7.5024 11.3462C9.62927 11.3462 11.3511 9.62243 11.3511 7.49743C11.3511 5.37056 9.6274 3.64868 7.5024 3.64868ZM7.5024 9.99555C6.12177 9.99555 5.00427 8.87743 5.00427 7.49743C5.00427 6.11743 6.1224 4.99931 7.5024 4.99931C8.8824 4.99931 10.0005 6.11743 10.0005 7.49743C10.0011 8.87743 8.88302 9.99555 7.5024 9.99555Z" fill="white"/>
                                        <path d="M10.5927 0.0479711C9.21272 -0.0164038 5.7946 -0.0132788 4.41335 0.0479711C3.1996 0.104846 2.12897 0.397971 1.26585 1.2611C-0.176649 2.7036 0.00772596 4.64734 0.00772596 7.49797C0.00772596 10.4155 -0.154774 12.3142 1.26585 13.7348C2.71397 15.1823 4.68585 14.993 7.50272 14.993C10.3927 14.993 11.3902 14.9948 12.4121 14.5992C13.8015 14.0598 14.8502 12.818 14.9527 10.5873C15.0177 9.20672 15.014 5.78922 14.9527 4.40797C14.829 1.77485 13.4158 0.177971 10.5927 0.0479711ZM12.7771 12.7805C11.8315 13.7261 10.5196 13.6417 7.4846 13.6417C4.3596 13.6417 3.10647 13.688 2.1921 12.7711C1.13898 11.723 1.3296 10.0398 1.3296 7.48797C1.3296 4.03484 0.975225 1.54797 4.44085 1.37047C5.2371 1.34235 5.47147 1.33297 7.47585 1.33297L7.50397 1.35172C10.8346 1.35172 13.4477 1.00297 13.6046 4.46797C13.6402 5.25859 13.6483 5.49609 13.6483 7.49734C13.6477 10.5861 13.7065 11.8467 12.7771 12.7805Z" fill="white"/>
                                        <path d="M11.5042 4.39628C12.001 4.39628 12.4036 3.99362 12.4036 3.49691C12.4036 3.0002 12.001 2.59753 11.5042 2.59753C11.0075 2.59753 10.6049 3.0002 10.6049 3.49691C10.6049 3.99362 11.0075 4.39628 11.5042 4.39628Z" fill="white"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="15" height="15" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        </li>
                        <li class="footer__block-contact-social-item">
                            <a href="#">
                                <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.6175 5.16086C11.3911 4.84586 11.4559 4.70571 11.6175 4.42414C11.6204 4.42093 13.4889 1.57564 13.6814 0.610714L13.6826 0.610071C13.7782 0.258428 13.6826 0 13.22 0H11.6892C11.2996 0 11.1199 0.221786 11.0236 0.469929C11.0236 0.469929 10.2443 2.52579 9.14173 3.85843C8.78589 4.2435 8.62138 4.36693 8.42712 4.36693C8.33146 4.36693 8.1827 4.2435 8.1827 3.89186V0.610071C8.1827 0.188357 8.07361 0 7.75102 0H5.3441C5.09968 0 4.95442 0.196714 4.95442 0.379929C4.95442 0.779786 5.50569 0.871714 5.56286 1.99671V4.43764C5.56286 4.9725 5.47477 5.07086 5.27935 5.07086C4.759 5.07086 3.49604 3.00664 2.7476 0.644143C2.59651 0.185786 2.44892 0.000642811 2.05632 0.000642811H0.525018C0.0880864 0.000642811 0 0.222428 0 0.470571C0 0.909 0.520351 3.08893 2.41975 5.96893C3.68563 7.93479 5.46836 9 7.09008 9C8.06486 9 8.18387 8.76343 8.18387 8.3565C8.18387 6.47807 8.09578 6.30064 8.58405 6.30064C8.81039 6.30064 9.20007 6.42407 10.1101 7.37229C11.1502 8.49664 11.3211 9 11.9033 9H13.434C13.8704 9 14.0915 8.76343 13.9643 8.29671C13.6732 7.31507 11.7062 5.29586 11.6175 5.16086Z" fill="white"/>
                                </svg>

                            </a>
                        </li>
                        <li class="footer__block-contact-social-item">
                            <a href="#">
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.6042 9.32664C15.0844 5.28444 14.3735 2.7325 13.0912 1.57825L13.0918 1.57758C11.0221 -0.393551 4.03227 -0.685297 1.55611 1.66611C0.444123 2.81633 0.052445 4.50444 0.00952139 6.59429C-0.0334023 8.6848 -0.0843741 12.6009 3.56481 13.6633H3.56816L3.56481 15.2857C3.56481 15.2857 3.53999 15.9429 3.95984 16.075C4.44005 16.2306 4.65735 15.9255 6.15096 14.1415C8.64858 14.3581 10.5667 13.8618 10.7847 13.7894C11.2891 13.6204 14.1428 13.2428 14.6042 9.32664ZM6.3971 13C6.3971 13 4.8163 14.9711 4.32469 15.4828C4.16373 15.6492 3.98734 15.6337 3.99002 15.3038C3.99002 15.0871 4.00209 12.6103 4.00209 12.6103C0.908235 11.7237 1.09066 8.38903 1.12419 6.64459C1.15773 4.89947 1.47697 3.47025 2.41861 2.50782C4.59095 0.470958 10.719 0.926351 12.2803 2.3938C14.1891 4.08593 13.5097 8.86656 13.5137 9.02953C13.1214 12.2984 10.8088 12.5057 10.3836 12.6472C10.2019 12.7076 8.51511 13.1415 6.3971 13Z" fill="white"/>
                                    <path d="M7.27154 2.89062C7.01333 2.89062 7.01333 3.29303 7.27154 3.29639C9.27487 3.31181 10.9247 4.70817 10.9429 7.26951C10.9429 7.53979 11.3386 7.53644 11.3352 7.26615H11.3345C11.3131 4.5063 9.51162 2.90605 7.27154 2.89062Z" fill="white"/>
                                    <path d="M9.90528 6.84506C9.89925 7.11199 10.2943 7.12473 10.2976 6.85445C10.3305 5.33267 9.39221 4.07917 7.62899 3.94704C7.37078 3.92826 7.34395 4.33403 7.60149 4.35281C9.13064 4.46883 9.93613 5.51241 9.90528 6.84506Z" fill="white"/>
                                    <path d="M9.4853 8.57597C9.15398 8.38416 8.81663 8.50354 8.67713 8.692L8.38538 9.06959C8.23716 9.26141 7.96017 9.23592 7.96017 9.23592C5.93873 8.70139 5.39816 6.58606 5.39816 6.58606C5.39816 6.58606 5.37335 6.29968 5.55846 6.14609L5.92331 5.84428C6.10573 5.69942 6.22109 5.35066 6.03531 5.00794C5.53901 4.11124 5.20568 3.80206 5.036 3.56463C4.85759 3.3413 4.58932 3.291 4.31032 3.4419H4.30428C3.72414 3.78126 3.08901 4.4164 3.29222 5.07032C3.63896 5.75978 4.27611 7.9576 6.30694 9.61821C7.26132 10.4036 8.77169 11.2084 9.41286 11.3942L9.4189 11.4036C10.0507 11.6142 10.665 10.9542 10.993 10.3566V10.3519C11.1385 10.0629 11.0902 9.78924 10.8776 9.61016C10.5007 9.24263 9.93197 8.83687 9.4853 8.57597Z" fill="white"/>
                                    <path d="M7.90665 5.44428C8.55117 5.48184 8.86371 5.81852 8.89724 6.50999C8.90932 6.78028 9.30166 6.7615 9.28959 6.49121C9.24667 5.58847 8.77585 5.08546 7.92811 5.03851C7.66989 5.02309 7.64575 5.42885 7.90665 5.44428Z" fill="white"/>
                                </svg>

                            </a>
                        </li>
                        <li class="footer__block-contact-social-item">
                            <a href="#">
                                <svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.88588 7.24974L5.63775 10.3209C5.99276 10.3209 6.14651 10.1867 6.33089 10.0256L7.9953 8.62583L11.4441 10.8484C12.0767 11.1586 12.5223 10.9952 12.6929 10.3363L14.9567 1.00177L14.9573 1.00122C15.158 0.178422 14.6192 -0.143326 14.0029 0.0585227L0.696378 4.54155C-0.211769 4.85175 -0.198019 5.29725 0.541999 5.49909L3.94396 6.43024L11.846 2.07921C12.2179 1.86251 12.556 1.98241 12.2779 2.19911L5.88588 7.24974Z" fill="white"/>
                                </svg>

                            </a>
                        </li>
                        <li class="footer__block-contact-social-item">
                            <a href="#">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.942 8.94235L10.9363 8.98922C9.56196 8.30422 9.41821 8.21297 9.24071 8.47922C9.11759 8.6636 8.75884 9.08172 8.65071 9.20547C8.54134 9.32735 8.43259 9.33672 8.24696 9.25235C8.05946 9.1586 7.45759 8.96172 6.74509 8.32422C6.19009 7.82735 5.81759 7.21797 5.70759 7.03047C5.52446 6.71422 5.90759 6.66922 6.25634 6.00922C6.31884 5.87797 6.28696 5.77485 6.24071 5.68172C6.19384 5.58797 5.82071 4.66922 5.66446 4.30297C5.51446 3.93797 5.36009 3.98422 5.24446 3.98422C4.88446 3.95297 4.62134 3.95797 4.38946 4.19922C3.38071 5.30797 3.63509 6.45172 4.49821 7.66797C6.19446 9.88797 7.09821 10.2967 8.75071 10.8642C9.19696 11.0061 9.60384 10.9861 9.92571 10.9398C10.2845 10.883 11.0301 10.4892 11.1857 10.0486C11.3451 9.60797 11.3451 9.24235 11.2982 9.15797C11.252 9.0736 11.1295 9.02672 10.942 8.94235Z" fill="white"/>
                                    <path d="M12.825 2.1559C8.01937 -2.48973 0.06625 0.879645 0.063125 7.43339C0.063125 8.74339 0.40625 10.0209 1.06 11.149L0 15.0003L3.95937 13.9678C8.9 16.6365 14.9975 13.0928 15 7.43715C15 5.45215 14.225 3.58402 12.8156 2.18027L12.825 2.1559ZM13.7513 7.41652C13.7475 12.1871 8.51062 15.1665 4.36875 12.7315L4.14375 12.5978L1.8 13.2071L2.42812 10.929L2.27875 10.6946C-0.29875 6.59152 2.6625 1.22902 7.545 1.22902C9.20375 1.22902 10.7606 1.8759 11.9331 3.04777C13.105 4.20965 13.7513 5.76652 13.7513 7.41652Z" fill="white"/>
                                </svg>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


</div>


<script src="/js/script.min.js"></script>
</body>
</html>
