@extends('layouts.main')
@section('title', 'Каталог')
@section('content')
<section class="cat-info">
    <div class="containers">
        <div class="cat-info__block">
            <div class="cat-info__block-slider">
                <div class="swiper sliderCatalogInfo">
                    <div class="swiper-wrapper">
                        @foreach($banners as $banner) 
                        <div class="swiper-slide">
                            <a href="{{ $banner['link'] }}" title="">
                                <img src="{{ $banner['img'] }}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-control">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="cat-info__block-menu">
                <ul class="cat-info__block-menu-list">
                    <li class="cat-info__block-menu-item">
                        <a href="{{ route('constructor') }}" title="">
                            <h2 class="cat-info__block-menu-title">
                                Конструктор букетов
                            </h2>
                        </a>
                    </li>
                    <li class="cat-info__block-menu-item">
                        <a href="{{ route('quiz.index') }}" title="">
                            <h2 class="cat-info__block-menu-title">
                                Букет на вкус флориста
                            </h2>
                        </a>
                    </li>
                    <li class="cat-info__block-menu-item">
                        <a href="{{ route('urgently') }}" title="">
                            <h2 class="cat-info__block-menu-title">
                                Срочный заказ
                            </h2>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@if ($addits->count())
<section class="cat-add">
    <div class="containers">
        <div class="cat-add__block">
            <div class="cat-add__block-container">
                <div class="cat-add__block-title">Добавить к букету</div>
                <div class="cat-collections__block-select">
                    <div class="cat-collections">
                        <div class="cat-collections__block-styled">Смотреть все</div>
                    </div>
                </div>
            </div>
            <div class="cat-add__block-slider">
                <div class="swiper sliderCatalogAdd">
                    <div class="swiper-wrapper">
                        @foreach($addits as $a)
                        <a href="{{ route('addit.cat', [$a->id]) }}" class="swiper-slide">
                            <div style="background-image: url({{ $a['img'] }})">
                                <p>{{ $a['name'] }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-control">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if ($cats->count())
<section class="cat-collections">
    <div class="containers">
        <div class="cat-collections__block">
            <div class="cat-collections__block-title">Подборки</div>
            @foreach($cats as $c)
            <div class="cat-collections__block-container">
                <div class="cat-collections__block-add">{{ $c->name }}</div>
                <div class="cat-collections__block-select">
                    <div class="cat-collections">
                        <div class="cat-collections__block-styled">Смотреть все</div>
                    </div>
                </div>
            </div>
            <div class="cat-collections__block-slider-2">
                <div class="swiper sliderCatalogCollections">
                    <div class="swiper-wrapper">
                        @foreach($c->child()->get() as $ch)
                        <div class="swiper-slide">
                            <a href="{{ route('product.cat', [$ch->id]) }}" style="background-image: url({{ $ch['img'] }})">{{ $ch->name }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-control-2">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection