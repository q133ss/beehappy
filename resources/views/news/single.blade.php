@extends('layouts.main')
@section('title')
    {{$news['title']}} - BeeHappy
@endsection
@section('content')
    <div class="dnew-content">
        <div class="containers">
            <div class="dnew-content__block">
                <div class="dnew-content__block-back">
                    <a href="#">
                        <svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.126693 4.21814L5.26511 7.90939C5.34597 7.9675 5.45558 8.0001 5.5698 8C5.68403 7.9999 5.79353 7.96713 5.87421 7.90888C5.95488 7.85063 6.00013 7.77168 6 7.6894C5.99987 7.60712 5.95436 7.52825 5.8735 7.47014L1.04088 3.99865L5.8735 0.527157C5.9528 0.468818 5.99696 0.390309 5.99641 0.308663C5.99586 0.227018 5.95064 0.148821 5.87056 0.0910377C5.79048 0.0332541 5.682 0.000545474 5.56866 7.11485e-06C5.45531 -0.000531244 5.34624 0.0311446 5.26511 0.0881619L0.126693 3.77915C0.0865377 3.80795 0.0546745 3.84217 0.0329326 3.87986C0.0111912 3.91755 -6.00308e-07 3.95796 -6.03876e-07 3.99878C-6.07444e-07 4.03959 0.0111912 4.08 0.0329326 4.11769C0.0546745 4.15538 0.0865377 4.18961 0.126693 4.2184L0.126693 4.21814Z" fill="white"/>
                        </svg>

                        <svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.126693 4.21814L5.26511 7.90939C5.34597 7.9675 5.45558 8.0001 5.5698 8C5.68403 7.9999 5.79353 7.96713 5.87421 7.90888C5.95488 7.85063 6.00013 7.77168 6 7.6894C5.99987 7.60712 5.95436 7.52825 5.8735 7.47014L1.04088 3.99865L5.8735 0.527157C5.9528 0.468818 5.99696 0.390309 5.99641 0.308663C5.99586 0.227018 5.95064 0.148821 5.87056 0.0910377C5.79048 0.0332541 5.682 0.000545474 5.56866 7.11485e-06C5.45531 -0.000531244 5.34624 0.0311446 5.26511 0.0881619L0.126693 3.77915C0.0865377 3.80795 0.0546745 3.84217 0.0329326 3.87986C0.0111912 3.91755 -6.00308e-07 3.95796 -6.03876e-07 3.99878C-6.07444e-07 4.03959 0.0111912 4.08 0.0329326 4.11769C0.0546745 4.15538 0.0865377 4.18961 0.126693 4.2184L0.126693 4.21814Z" fill="white"/>
                        </svg>

                    </a>
                </div>
                <div class="dnew-content__block-banner" style="background-image: url('{{$news['banner']}}'); background-size: cover"></div>
                <div class="dnew-content__block-wrapper">
                    <div class="dnew-content__block-text">
                        <div class="dnew-content__block-text-title">{{$news['title']}}</div>
                        <div class="dnew-content__block-text-item">{{$news['content']}}</div>
                        <button class="dnew-content__block-text-btn">
                            <a href="#">
                                Перейти в каталог
                            </a>
                        </button>
                    </div>
                    <div class="dnew-content__block-table">
                        <div class="dnew-content__block-table-title">
                            Еще новости по теме
                        </div>
                        <ul class="dnew-content__block-tables">
                            @foreach($news_more as $more)
                            <li class="dnew-content__block-tables-item" style="background-image: url('{{$more['img']}}'); background-size: cover">
                                <div class="dnew-content__block-tables-item-date">
                                    {{substr($more['created_at'],0,10)}}
                                </div>
                                <div class="dnew-content__block-tables-item-text" style="cursor: pointer" onclick="location.href='{{route('news.single', $more['id'])}}'">
                                    {{mb_strimwidth($more['content'], 0, 65, "...")}}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('message'))
        <div class="model-notice">
            <div class="model-notice__block">
                <button class="model-notice__block-close"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 17.5L17.5 1" stroke="#AFB1BD" stroke-width="2"></path>
                        <path d="M17.5 17.5L0.999999 1" stroke="#AFB1BD" stroke-width="2"></path>
                    </svg>
                </button>
                <div class="model-notice__block-icons"><svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" fill="#16B8C3" xmlns="http://www.w3.org/2000/svg"><g><path d="m411 262.862v-47.862c0-69.822-46.411-129.001-110-148.33v-21.67c0-24.813-20.187-45-45-45s-45 20.187-45 45v21.67c-63.59 19.329-110 78.507-110 148.33v47.862c0 61.332-23.378 119.488-65.827 163.756-4.16 4.338-5.329 10.739-2.971 16.267s7.788 9.115 13.798 9.115h136.509c6.968 34.192 37.272 60 73.491 60 36.22 0 66.522-25.808 73.491-60h136.509c6.01 0 11.439-3.587 13.797-9.115s1.189-11.929-2.97-16.267c-42.449-44.268-65.827-102.425-65.827-163.756zm-170-217.862c0-8.271 6.729-15 15-15s15 6.729 15 15v15.728c-4.937-.476-9.94-.728-15-.728s-10.063.252-15 .728zm15 437c-19.555 0-36.228-12.541-42.42-30h84.84c-6.192 17.459-22.865 30-42.42 30zm-177.67-60c34.161-45.792 52.67-101.208 52.67-159.138v-47.862c0-68.925 56.075-125 125-125s125 56.075 125 125v47.862c0 57.93 18.509 113.346 52.671 159.138z"></path><path d="m451 215c0 8.284 6.716 15 15 15s15-6.716 15-15c0-60.1-23.404-116.603-65.901-159.1-5.857-5.857-15.355-5.858-21.213 0s-5.858 15.355 0 21.213c36.831 36.831 57.114 85.8 57.114 137.887z"></path><path d="m46 230c8.284 0 15-6.716 15-15 0-52.086 20.284-101.055 57.114-137.886 5.858-5.858 5.858-15.355 0-21.213-5.857-5.858-15.355-5.858-21.213 0-42.497 42.497-65.901 98.999-65.901 159.099 0 8.284 6.716 15 15 15z"></path></g></svg></div>
                <div class="model-notice__block-text">
                    <div class="model-notice__block-text-title">{{session('message')}}</div>
                </div>
            </div>
        </div>
    @endif
    <div class="dnew-message">
        <div class="containers">
            <div class="dnew-message__block">
                <div class="dnew-message__block-input">
                    <div class="dnew-message__block-input-title">Написать комментарий</div>
                    <form action="{{route('news.add.comment', $news['id'])}}" method="POST">
                        @csrf
                    <div class="dnew-message__block-input-wrapper">
                        <div class="dnew-message__block-input-img"></div>
                        <textarea class="dnew-message__block-input-textarea" name="comment" placeholder="Напишите ваш комментарий"></textarea>
                    </div>
                    <button type="submit" class="dnew-message__block-input-btn"><a style="color:#FFFFFF">Написать комментарий</a></button>
                    </form>
                </div>
                <ul class="dnew-message__block-list">
                    @foreach($news->newsComments as $comment)
                    <li class="dnew-message__block-list-item">
                        <div class="dnew-message__block-list-img" style="background-image: url('{{$comment->author['avatar_url']}}'); background-size: cover"></div>
                        <div class="dnew-message__block-list-wrapper">
                            <div class="dnew-message__block-list-name">{{$comment->author['name']}}</div>
                            @php
                            $time_now = Carbon\Carbon::now();
                            $t = date_diff(new \DateTime($time_now), new \DateTime( $comment['created_at']))->format("%d");
                            @endphp
                            <div class="dnew-message__block-list-date">@if($t == 0) Сегодня @else{{$t}} дня назад@endif</div>
                        </div>
                        <div class="dnew-message__block-list-text">
                            {{$comment['comment']}}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
