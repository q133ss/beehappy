@extends('layouts.account')
@section('title', 'Заказы')
@section('content')
    <div class="header-profile__orders">
        <div class="header-profile__orders-table" style="height: auto">
            <div class="header-profile__orders-table-title">Текущие заказы</div>
            <div class="header-profile__orders-table-date">
                <div class="header-profile__orders-table-date-day">Дата</div>
                <div class="header-profile__orders-table-date-number">№ заказа</div>
            </div>
            <ul class="header-profile__orders-table-list">
                @foreach($orders_current as $order)
                        <li class="header-profile__orders-table-item">
                            <div class="header-profile__orders-table-item-number">
                                <div class="header-profile__orders-table-item-number-date">{{mb_substr($order['created_at'],0, 10)}}</div>
                                <div class="header-profile__orders-table-item-number-id">№ {{$order['id']}}</div>
                            </div>
                            <div class="header-profile__orders-table-info">
                                <button class="header-profile__orders-table-info-btn" type="button" data-bs-toggle="modal" data-bs-target="#profileOrdersModel-{{$order['id']}}"><p>Подробнее</p></button>
                                <div class="modal fade" id="profileOrdersModel-{{$order['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content header-profile__orders-table-info-model">
                                            <button type="button" class="btn-close header-profile__orders-table-info-close" data-bs-dismiss="modal" aria-label="Close">
                                                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.3281 22.3296L40.2735 40.275" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M22.1313 40.4727L40.4712 22.1328" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>

                                            </button>
                                            <div class="header-profile__orders-table-info-title">№ {{$order['id']}} </div>
                                            <ul class="header-profile__orders-table-info-table">
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Получатель:</div>
                                                    <div class="header-profile__orders-table-info-table-text">
                                                        @if($order['receiver_name'] != NULL)
                                                            {{$order['receiver_name']}}
                                                        @else
                                                            {{$order['customer_name']}}
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Время доставки:</div>
                                                    <div class="header-profile__orders-table-info-table-text">{{$order['delivery_time']}}</div>
                                                </li>
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Адрес доставки:</div>
                                                    <div class="header-profile__orders-table-info-table-text">г. {{$order['delivery_city']}}, ул
                                                        {{$order['street']}}
                                                        дом {{$order['home_number']}}, кв {{$order['flat']}}</div>
                                                </li>
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Дата доставки:</div>
                                                    <div class="header-profile__orders-table-info-table-text">{{$order['delivery_date']}}</div>
                                                </li>
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Номер телефона получателя:</div>
                                                    <div class="header-profile__orders-table-info-table-text">
                                                        @if($order['receiver_phone'] != NULL)
                                                            {{$order['receiver_phone']}}
                                                        @else
                                                            {{$order['customer_phone']}}
                                                        @endif
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="header-profile__orders-table-info-input">
                                                <input type="text" disabled placeholder="Текст" value="@if($order['big_card_text'] != NULL) {{$order['big_card_text']}} @elseif($order['card_text'] != NULL){{$order['card_text']}} @else Отсутствует @endif">
                                            </div>
                                            <ul class="header-profile__orders-table-info-list">
                                                @php
                                                    $product_ids = array();
                                                @endphp
                                                @foreach($order->orderProducts as $product)
                                                    @php
                                                        array_push($product_ids, $product['id']);
                                                    @endphp
                                                @endforeach
                                                @php
                                                    $products = App\Models\Product::whereIn('id', $product_ids)->get();
                                                @endphp

                                                @foreach($products as $product)
                                                    <li class="header-profile__orders-table-info-list-item">
                                                        <div class="header-profile__orders-table-info-list-img" style="background-image: url('{{$product['img']}}'); background-size: cover">
                                                        </div>
                                                        <div class="header-profile__orders-table-info-list-text">
                                                            <div class="header-profile__orders-table-info-list-text-title">{{$product['title']}}</div>
                                                            <div class="header-profile__orders-table-info-list-text-price">
                                                                <div class="header-profile__orders-table-info-list-text-price-sum">@if($product['salePrice'] != NULL) {{$product['salePrice']}} @else{{$product['price']}} @endif₽</div>
                                                                <div class="header-profile__orders-table-info-list-text-price-icon"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.7109 1.875H10.3594V1.05469C10.3594 0.473133 9.88624 0 9.30469 0C8.72313 0 8.25 0.473133 8.25 1.05469V1.34262C8.25 1.70693 8.00536 2.03128 7.65504 2.13136L7.3125 2.22923V2.22656C7.3125 2.03241 7.15509 1.875 6.96094 1.875H5.55469C5.36053 1.875 5.20312 2.03241 5.20312 2.22656V3.79688H1.05469C0.473133 3.79688 0 4.27001 0 4.85156V11.6484C0 11.7781 0.0713672 11.8972 0.185672 11.9584C0.237656 11.9862 0.294656 12 0.351539 12C0.419742 12 0.487758 11.9802 0.546562 11.9409L1.86427 11.0625H8.55469C9.13624 11.0625 9.60938 10.5894 9.60938 10.0078V6.32812H10.7109C11.4217 6.32812 12 5.74985 12 5.03906V3.16406C12 2.45327 11.4217 1.875 10.7109 1.875ZM5.90625 2.57812H6.60938V5.625H5.90625V2.57812ZM8.90625 10.0078C8.90625 10.2017 8.74854 10.3594 8.55469 10.3594H1.75781C1.68841 10.3594 1.62056 10.3799 1.56281 10.4184L0.703125 10.9916V4.85156C0.703125 4.65771 0.860836 4.5 1.05469 4.5H5.20312V5.97656C5.20312 6.17072 5.36053 6.32812 5.55469 6.32812H6.96094C7.14155 6.32812 7.29019 6.19186 7.31006 6.01657C7.62326 6.2163 7.99151 6.32812 8.37448 6.32812H8.90625V10.0078ZM11.2969 5.03906C11.2969 5.36215 11.034 5.625 10.7109 5.625H8.37448C7.94702 5.625 7.54781 5.40935 7.3125 5.05673V2.96051L7.84819 2.80746C8.49876 2.62158 8.95312 2.01921 8.95312 1.34262V1.05469C8.95312 0.860836 9.11084 0.703125 9.30469 0.703125C9.49854 0.703125 9.65625 0.860836 9.65625 1.05469V2.22656C9.65625 2.42072 9.81366 2.57812 10.0078 2.57812H10.7109C11.034 2.57812 11.2969 2.84098 11.2969 3.16406V5.03906Z" fill="white"/>
                                                                        <path d="M1.75781 6.60938H4.10156C4.29572 6.60938 4.45312 6.45197 4.45312 6.25781C4.45312 6.06366 4.29572 5.90625 4.10156 5.90625H1.75781C1.56366 5.90625 1.40625 6.06366 1.40625 6.25781C1.40625 6.45197 1.56366 6.60938 1.75781 6.60938Z" fill="white"/>
                                                                        <path d="M7.85156 7.3125H1.75781C1.56366 7.3125 1.40625 7.46991 1.40625 7.66406C1.40625 7.85822 1.56366 8.01562 1.75781 8.01562H7.85156C8.04572 8.01562 8.20312 7.85822 8.20312 7.66406C8.20312 7.46991 8.04572 7.3125 7.85156 7.3125Z" fill="white"/>
                                                                        <path d="M7.85156 8.71875H1.75781C1.56366 8.71875 1.40625 8.87616 1.40625 9.07031C1.40625 9.26447 1.56366 9.42188 1.75781 9.42188H7.85156C8.04572 9.42188 8.20312 9.26447 8.20312 9.07031C8.20312 8.87616 8.04572 8.71875 7.85156 8.71875Z" fill="white"/>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @if($order->orderPhotos->count() != 0)
                                                <div class="header-profile__orders-table-info-titles">Фото готового товара</div>
                                                <div class="header-profile__orders-table-info-slider">
                                                    <div class="swiper modelOrdersSliders">
                                                        <div class="swiper-wrapper">
                                                            @foreach($order->orderPhotos as $photo)
                                                                <div class="swiper-slide">
                                                                    <div class="header-profile__orders-table-info-slider-item">
                                                                        <div class="header-profile__orders-table-info-slider-content" data-bs-toggle="modal" data-bs-target="#exampleModal{{$order['id']}}" style="background-image: url('{{$photo['img']}}'); background-size: cover"></div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="swiper-sliders">
                                                        <div class="swiper-button-next"></div>
                                                        <div class="swiper-button-prev"></div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="header-profile__orders-table-info-text">
                                    @if($order['status'] == 0)
                                        <p>Заказ обрабатывается</p>
                                    @elseif($order['status'] == 1)
                                        <p>Заказ обрабатывается</p>
                                    @elseif($order['status'] == 2)
                                        <p>в процессе исполнения</p>
                                    @elseif($order['status'] == 3)
                                        <p>Доставляется</p>
                                    @elseif($order['status'] == 4)
                                        <p>Завершен</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                @endforeach
            </ul>
        </div>

        <div class="header-profile__orders-table" style="height: auto;">
            <div class="header-profile__orders-table-title">Предыдущие заказы</div>
            <div class="header-profile__orders-table-date">
                <div class="header-profile__orders-table-date-day">Дата</div>
                <div class="header-profile__orders-table-date-number">№ заказа</div>
            </div>
            <ul class="header-profile__orders-table-list">
                @foreach($orders_old as $order)
                        <li class="header-profile__orders-table-item">
                            <div class="header-profile__orders-table-item-number">
                                <div class="header-profile__orders-table-item-number-date">{{mb_substr($order['created_at'],0, 10)}}</div>
                                <div class="header-profile__orders-table-item-number-id">№ {{$order['id']}}</div>
                            </div>
                            <div class="header-profile__orders-table-info">
                                <button class="header-profile__orders-table-info-btn" type="button" data-bs-toggle="modal" data-bs-target="#profileOrdersModel-{{$order['id']}}"><p>Подробнее</p></button>
                                <div class="modal fade" id="profileOrdersModel-{{$order['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content header-profile__orders-table-info-model">
                                            <button type="button" class="btn-close header-profile__orders-table-info-close" data-bs-dismiss="modal" aria-label="Close">
                                                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.3281 22.3296L40.2735 40.275" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M22.1313 40.4727L40.4712 22.1328" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>

                                            </button>
                                            <div class="header-profile__orders-table-info-title">№ {{$order['id']}} </div>
                                            <ul class="header-profile__orders-table-info-table">
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Получатель:</div>
                                                    <div class="header-profile__orders-table-info-table-text">
                                                        @if($order['receiver_name'] != NULL)
                                                            {{$order['receiver_name']}}
                                                        @else
                                                            {{$order['customer_name']}}
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Время доставки:</div>
                                                    <div class="header-profile__orders-table-info-table-text">{{$order['delivery_time']}}</div>
                                                </li>
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Адрес доставки:</div>
                                                    <div class="header-profile__orders-table-info-table-text">г. {{$order['delivery_city']}}, ул
                                                        {{$order['street']}}
                                                        дом {{$order['home_number']}}, кв {{$order['flat']}}</div>
                                                </li>
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Дата доставки:</div>
                                                    <div class="header-profile__orders-table-info-table-text">{{$order['delivery_date']}}</div>
                                                </li>
                                                <li class="header-profile__orders-table-info-table-item">
                                                    <div class="header-profile__orders-table-info-table-title">Номер телефона получателя:</div>
                                                    <div class="header-profile__orders-table-info-table-text">
                                                        @if($order['receiver_phone'] != NULL)
                                                            {{$order['receiver_phone']}}
                                                        @else
                                                            {{$order['customer_phone']}}
                                                        @endif
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="header-profile__orders-table-info-input">
                                                <input type="text" disabled placeholder="Текст" value="@if($order['big_card_text'] != NULL) {{$order['big_card_text']}} @elseif($order['card_text'] != NULL){{$order['card_text']}} @else Отсутствует @endif">
                                            </div>
                                            <ul class="header-profile__orders-table-info-list">
                                                @php
                                                    $product_ids = array();
                                                @endphp
                                                @foreach($order->orderProducts as $product)
                                                    @php
                                                        array_push($product_ids, $product['id']);
                                                    @endphp
                                                @endforeach
                                                @php
                                                    $products = App\Models\Product::whereIn('id', $product_ids)->get();
                                                @endphp

                                                @foreach($products as $product)
                                                    <li class="header-profile__orders-table-info-list-item">
                                                        <div class="header-profile__orders-table-info-list-img" style="background-image: url('{{$product['img']}}'); background-size: cover">
                                                        </div>
                                                        <div class="header-profile__orders-table-info-list-text">
                                                            <div class="header-profile__orders-table-info-list-text-title">{{$product['title']}}</div>
                                                            <div class="header-profile__orders-table-info-list-text-price">
                                                                <div class="header-profile__orders-table-info-list-text-price-sum">@if($product['salePrice'] != NULL) {{$product['salePrice']}} @else{{$product['price']}} @endif₽</div>
                                                                <div class="header-profile__orders-table-info-list-text-price-icon"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.7109 1.875H10.3594V1.05469C10.3594 0.473133 9.88624 0 9.30469 0C8.72313 0 8.25 0.473133 8.25 1.05469V1.34262C8.25 1.70693 8.00536 2.03128 7.65504 2.13136L7.3125 2.22923V2.22656C7.3125 2.03241 7.15509 1.875 6.96094 1.875H5.55469C5.36053 1.875 5.20312 2.03241 5.20312 2.22656V3.79688H1.05469C0.473133 3.79688 0 4.27001 0 4.85156V11.6484C0 11.7781 0.0713672 11.8972 0.185672 11.9584C0.237656 11.9862 0.294656 12 0.351539 12C0.419742 12 0.487758 11.9802 0.546562 11.9409L1.86427 11.0625H8.55469C9.13624 11.0625 9.60938 10.5894 9.60938 10.0078V6.32812H10.7109C11.4217 6.32812 12 5.74985 12 5.03906V3.16406C12 2.45327 11.4217 1.875 10.7109 1.875ZM5.90625 2.57812H6.60938V5.625H5.90625V2.57812ZM8.90625 10.0078C8.90625 10.2017 8.74854 10.3594 8.55469 10.3594H1.75781C1.68841 10.3594 1.62056 10.3799 1.56281 10.4184L0.703125 10.9916V4.85156C0.703125 4.65771 0.860836 4.5 1.05469 4.5H5.20312V5.97656C5.20312 6.17072 5.36053 6.32812 5.55469 6.32812H6.96094C7.14155 6.32812 7.29019 6.19186 7.31006 6.01657C7.62326 6.2163 7.99151 6.32812 8.37448 6.32812H8.90625V10.0078ZM11.2969 5.03906C11.2969 5.36215 11.034 5.625 10.7109 5.625H8.37448C7.94702 5.625 7.54781 5.40935 7.3125 5.05673V2.96051L7.84819 2.80746C8.49876 2.62158 8.95312 2.01921 8.95312 1.34262V1.05469C8.95312 0.860836 9.11084 0.703125 9.30469 0.703125C9.49854 0.703125 9.65625 0.860836 9.65625 1.05469V2.22656C9.65625 2.42072 9.81366 2.57812 10.0078 2.57812H10.7109C11.034 2.57812 11.2969 2.84098 11.2969 3.16406V5.03906Z" fill="white"/>
                                                                        <path d="M1.75781 6.60938H4.10156C4.29572 6.60938 4.45312 6.45197 4.45312 6.25781C4.45312 6.06366 4.29572 5.90625 4.10156 5.90625H1.75781C1.56366 5.90625 1.40625 6.06366 1.40625 6.25781C1.40625 6.45197 1.56366 6.60938 1.75781 6.60938Z" fill="white"/>
                                                                        <path d="M7.85156 7.3125H1.75781C1.56366 7.3125 1.40625 7.46991 1.40625 7.66406C1.40625 7.85822 1.56366 8.01562 1.75781 8.01562H7.85156C8.04572 8.01562 8.20312 7.85822 8.20312 7.66406C8.20312 7.46991 8.04572 7.3125 7.85156 7.3125Z" fill="white"/>
                                                                        <path d="M7.85156 8.71875H1.75781C1.56366 8.71875 1.40625 8.87616 1.40625 9.07031C1.40625 9.26447 1.56366 9.42188 1.75781 9.42188H7.85156C8.04572 9.42188 8.20312 9.26447 8.20312 9.07031C8.20312 8.87616 8.04572 8.71875 7.85156 8.71875Z" fill="white"/>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @if($order->orderPhotos->count() != 0)
                                                <div class="header-profile__orders-table-info-titles">Фото готового товара</div>
                                                <div class="header-profile__orders-table-info-slider">
                                                    <div class="swiper modelOrdersSliders">
                                                        <div class="swiper-wrapper">
                                                            @foreach($order->orderPhotos as $photo)
                                                                <div class="swiper-slide">
                                                                    <div class="header-profile__orders-table-info-slider-item">
                                                                        <div class="header-profile__orders-table-info-slider-content" data-bs-toggle="modal" data-bs-target="#exampleModal{{$order['id']}}" style="background-image: url('{{$photo['img']}}'); background-size: cover"></div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="swiper-sliders">
                                                        <div class="swiper-button-next"></div>
                                                        <div class="swiper-button-prev"></div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="header-profile__orders-table-info-text">
                                    @if($order['status'] == 0)
                                        <p>Заказ обрабатывается</p>
                                    @elseif($order['status'] == 1)
                                        <p>Заказ обрабатывается</p>
                                    @elseif($order['status'] == 2)
                                        <p>в процессе исполнения</p>
                                    @elseif($order['status'] == 3)
                                        <p>Доставляется</p>
                                    @elseif($order['status'] == 4)
                                        <p>Завершен</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{--    Modal photo--}}
    @foreach($orders_current as $order)
        @foreach($order->orderPhotos as $photo)
            <div class="modal fade" id="exampleModal{{$order['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <img src="{{$photo['img']}}" alt="">
                    </div>
                </div>
            </div>

        @endforeach
    @endforeach

    @foreach($orders_old as $order)
        @foreach($order->orderPhotos as $photo)
            <div class="modal fade" id="exampleModal{{$order['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <img src="{{$photo['img']}}" alt="">
                    </div>
                </div>
            </div>

        @endforeach
    @endforeach
    {{--    @endforeach--}}
    {{--    //End photo--}}

    <script>
        $('.header-profile__menu-list-order').addClass('header-profile__menu-list-active')
    </script>
@endsection
