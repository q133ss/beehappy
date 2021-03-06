@extends('layouts.main')
@section('title', $cat['name'])
@section('content')
    <div class="toy-content">
        <div class="containers">
            <div class="toy-content__block">
                <div class="toy-content__block-back">
                    <a href="/">
                        <svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.126693 4.21814L5.26511 7.90939C5.34597 7.9675 5.45558 8.0001 5.5698 8C5.68403 7.9999 5.79353 7.96713 5.87421 7.90888C5.95488 7.85063 6.00013 7.77168 6 7.6894C5.99987 7.60712 5.95436 7.52825 5.8735 7.47014L1.04088 3.99865L5.8735 0.527157C5.9528 0.468818 5.99696 0.390309 5.99641 0.308663C5.99586 0.227018 5.95064 0.148821 5.87056 0.0910377C5.79048 0.0332541 5.682 0.000545474 5.56866 7.11485e-06C5.45531 -0.000531244 5.34624 0.0311446 5.26511 0.0881619L0.126693 3.77915C0.0865377 3.80795 0.0546745 3.84217 0.0329326 3.87986C0.0111912 3.91755 -6.00308e-07 3.95796 -6.03876e-07 3.99878C-6.07444e-07 4.03959 0.0111912 4.08 0.0329326 4.11769C0.0546745 4.15538 0.0865377 4.18961 0.126693 4.2184L0.126693 4.21814Z"
                                fill="white" />
                        </svg>

                        <svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.126693 4.21814L5.26511 7.90939C5.34597 7.9675 5.45558 8.0001 5.5698 8C5.68403 7.9999 5.79353 7.96713 5.87421 7.90888C5.95488 7.85063 6.00013 7.77168 6 7.6894C5.99987 7.60712 5.95436 7.52825 5.8735 7.47014L1.04088 3.99865L5.8735 0.527157C5.9528 0.468818 5.99696 0.390309 5.99641 0.308663C5.99586 0.227018 5.95064 0.148821 5.87056 0.0910377C5.79048 0.0332541 5.682 0.000545474 5.56866 7.11485e-06C5.45531 -0.000531244 5.34624 0.0311446 5.26511 0.0881619L0.126693 3.77915C0.0865377 3.80795 0.0546745 3.84217 0.0329326 3.87986C0.0111912 3.91755 -6.00308e-07 3.95796 -6.03876e-07 3.99878C-6.07444e-07 4.03959 0.0111912 4.08 0.0329326 4.11769C0.0546745 4.15538 0.0865377 4.18961 0.126693 4.2184L0.126693 4.21814Z"
                                fill="white" />
                        </svg>

                    </a>
                </div>
                <div class="toy-content__block-text">
                    <div class="toy-content__block-text-title">{{$cat['name']}}</div>
                    <div class="toy-content__block-text-filter">
                        <div class="toy-content__block-text-filter-block">
                            <div class="toy-content__block-text-filter-title">????????????</div>
                            <div class="toy-content__block-text-filter-icon"><svg width="15" height="11" viewBox="0 0 15 11"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.83333 10.5H9.16667V8.83333H5.83333V10.5ZM0 0.5V2.16667H15V0.5H0ZM2.5 6.33333H12.5V4.66667H2.5V6.33333Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                        <form class="toy-content__block-text-filter-wrapper display-n">
                            <ul class="toy-content__block-text-filter-list">
                                <li class="toy-content__block-text-filter-item">
                                    <div class="toy-content__block-text-filter-checkbox">
                                        <input class="toy-content__block-text-filter-checkbox__input" type="radio" name="order_by"
                                            id="checkbox_1" value="low-to-height">
                                        <label class="toy-content__block-text-filter-checkbox__label" data-order="low-heght"
                                            for="checkbox_1">???? ?????????????????????? ????????</label>
                                    </div>
                                </li>
                                <li class="toy-content__block-text-filter-item">
                                    <div class="toy-content__block-text-filter-checkbox">
                                        <input class="toy-content__block-text-filter-checkbox__input" type="radio" name="order_by"
                                            id="checkbox_2" value="height-to-low">
                                        <label class="toy-content__block-text-filter-checkbox__label" data-order="heght-low"
                                            for="checkbox_2">???? ???????????????? ????????</label>
                                    </div>
                                </li>
                                <li class="toy-content__block-text-filter-item">
                                    <div class="toy-content__block-text-filter-checkbox">
                                        <input class="toy-content__block-text-filter-checkbox__input" type="radio" name="order_by"
                                            id="checkbox_4" value="last-add">
                                        <label class="toy-content__block-text-filter-checkbox__label" data-order="lasted"
                                            for="checkbox_4">?????????????????? ??????????????????????</label>
                                    </div>
                                </li>
                            </ul>
                            <div class="toy-content__block-text-filter-range">
                                <div class="toy-content__block-text-filter-range-value-1">0</div>
                                <div class="toy-content__block-text-filter-range-value-2">16090</div>
                                <input type="range" id="toyRange-1" value="0" min="0" max="16090" name="min"
                                    class="toy-content__block-text-filter-range-1">
                                <input type="range" id="toyRange-2" value="16090" min="1" max="16090" name="max"
                                    class="toy-content__block-text-filter-range-2">
                                <div class="toy-content__block-text-filter-range-prev">????</div>
                                <div class="toy-content__block-text-filter-range-next">????</div>
                            </div>
                            <div class="toy-content__block-text-filter-checkboxs">
                                <input class="toy-content__block-text-filter-checkboxs__input" type="checkbox"
                                    id="checkbox_6" name="order" value="all">
                                <label class="toy-content__block-text-filter-checkboxs__label" for="checkbox_6">????????????
                                    ??????????</label>
                            </div>
                            <div class="toy-content__block-text-filter-discard" data-order="reset">
                                <p>????????????????</p>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="js-content">
                    @include('catalog.products', compact('products', 'cat'))
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.toy-content__block-text-filter-wrapper input').on('change', function (e) {
                $.get(window.location.pathname, $(this).parents('form').serialize(), function(html){
                    $('.js-content').html(html);
                });
            });

            $('.toy-content__block-text-filter-discard').click(function () {
                $('.toy-content__block-text-filter-wrapper')
                    .find('input[type="radio"]').prop('checked', false).end()
                    .find('input[type="checkbox"]').prop('checked', false).end()
                    .find('input[type="range"]').each(function(){
                        console.log($(this).attr('name'), $(this).attr($(this).attr('name')));
                        $(this).val($(this).attr($(this).attr('name')))
                    });
                    
                $.get(window.location.pathname, function(html){
                    $('.js-content').html(html);
                });
            });

            $('.js-content').on('click', '.march-content__block-add', function(e){
                e.preventDefault();
                $(e.target).parent().remove();
                $.get($(e.target).attr('href'), function(html){
                    var $html = $(html);
                    $('.js-content > ul').append($html.find('li'));
                    var $page = $html.find('.js-page')
                    if ($page.length) {
                        $page.insertAfter($('.js-content > ul'));
                    }
                });
            });
            
        });
    </script>
    <style>
        .march-content__block-add:hover {
            color: #fff !important;
        }
        
        @media (max-width: 650px){
            .model-catalog__card-block-banners.m-one .swiper-slide { width: 100% !important; }
            .model-catalog__card-block-banners.m-one .js-img { width: 100%; min-height: 370px; }
        }
    </style>
@endsection