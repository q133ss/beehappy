<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEHAPPY</title>
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
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>

<header class="i-header">
    <div class="containers">
        <div class="i-header__block">
            <div class="i-header__block-title">
                <div class="i-header__block-title-logo">
                    <a href="catalog.html">
                        <svg width="50" height="75" viewBox="0 0 50 75" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="50" height="75" fill="url(#pattern0)"/>
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0" transform="translate(-0.01) scale(0.01 0.00666667)"/>
                                </pattern>
                                <image id="image0" width="102" height="150" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>

                    </a>
                </div>
                <div class="i-header__block-title-add">
                    Удобный Мобильный сервис доставки сюрпризов и подарков
                </div>
                <div class="i-header__block-title-item">
                    BeeHappy
                </div>
            </div>
            <div class="i-header__block-model">
                <div class="i-header__block-model-container">
                    <div class="i-header__block-model-city">

                        <select id="indexCity">
                            <option value=""></option>
                            @foreach($cities as $key => $city)
                            <option value="{{$city['id']}}">{{$city['title']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="i-header__block-model-search">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.828 17.0207L13.1807 12.4477C14.3977 11.1255 15.1454 9.37682 15.1454 7.45261C15.1448 3.33639 11.7544 0 7.5718 0C3.38919 0 -0.0012207 3.33639 -0.0012207 7.45261C-0.0012207 11.5688 3.38919 14.9052 7.5718 14.9052C9.37898 14.9052 11.0365 14.2802 12.3384 13.241L17.0038 17.832C17.2311 18.056 17.6001 18.056 17.8275 17.832C18.0553 17.6081 18.0553 17.2447 17.828 17.0207ZM7.5718 13.7586C4.03286 13.7586 1.164 10.9353 1.164 7.45261C1.164 3.96991 4.03286 1.14663 7.5718 1.14663C11.1108 1.14663 13.9796 3.96991 13.9796 7.45261C13.9796 10.9353 11.1108 13.7586 7.5718 13.7586Z" fill="#854FC8"/>
                        </svg>

                    </div>
                    <div class="i-header__block-model-vert"></div>
                    <div class="i-header__block-model-calendar">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.5391 1.64062H17.5547V0H15.9141V1.64062H5.08594V0H3.44531V1.64062H2.46094C1.10398 1.64062 0 2.7446 0 4.10156V18.5391C0 19.896 1.10398 21 2.46094 21H18.5391C19.896 21 21 19.896 21 18.5391V4.10156C21 2.7446 19.896 1.64062 18.5391 1.64062ZM19.3594 18.5391C19.3594 18.9914 18.9914 19.3594 18.5391 19.3594H2.46094C2.00862 19.3594 1.64062 18.9914 1.64062 18.5391V7.71094H19.3594V18.5391ZM19.3594 6.07031H1.64062V4.10156C1.64062 3.64924 2.00862 3.28125 2.46094 3.28125H3.44531V4.92188H5.08594V3.28125H15.9141V4.92188H17.5547V3.28125H18.5391C18.9914 3.28125 19.3594 3.64924 19.3594 4.10156V6.07031Z" fill="#854FC8"/>
                            <path d="M4.75781 9.43359H3.11719V11.0742H4.75781V9.43359Z" fill="#854FC8"/>
                            <path d="M8.03906 9.43359H6.39844V11.0742H8.03906V9.43359Z" fill="#854FC8"/>
                            <path d="M11.3203 9.43359H9.67969V11.0742H11.3203V9.43359Z" fill="#854FC8"/>
                            <path d="M14.6016 9.43359H12.9609V11.0742H14.6016V9.43359Z" fill="#854FC8"/>
                            <path d="M17.8828 9.43359H16.2422V11.0742H17.8828V9.43359Z" fill="#854FC8"/>
                            <path d="M4.75781 12.7148H3.11719V14.3555H4.75781V12.7148Z" fill="#854FC8"/>
                            <path d="M8.03906 12.7148H6.39844V14.3555H8.03906V12.7148Z" fill="#854FC8"/>
                            <path d="M11.3203 12.7148H9.67969V14.3555H11.3203V12.7148Z" fill="#854FC8"/>
                            <path d="M14.6016 12.7148H12.9609V14.3555H14.6016V12.7148Z" fill="#854FC8"/>
                            <path d="M4.75781 15.9961H3.11719V17.6367H4.75781V15.9961Z" fill="#854FC8"/>
                            <path d="M8.03906 15.9961H6.39844V17.6367H8.03906V15.9961Z" fill="#854FC8"/>
                            <path d="M11.3203 15.9961H9.67969V17.6367H11.3203V15.9961Z" fill="#854FC8"/>
                            <path d="M14.6016 15.9961H12.9609V17.6367H14.6016V15.9961Z" fill="#854FC8"/>
                            <path d="M17.8828 12.7148H16.2422V14.3555H17.8828V12.7148Z" fill="#854FC8"/>
                        </svg>

                    </div>
                    <div class="i-header__block-model-item">
                        <button type="button" class="i-header__block-model-btn" data-bs-toggle="modal" data-bs-target="#indexModelCalendar">
                            Календарь скидок
                        </button>
                        <div class="modal fade" id="indexModelCalendar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content i-header__calendar">
                                    <button type="button" class="i-header__calendar-btn" data-bs-dismiss="modal" aria-label="Close">
                                        <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.3281 22.3296L40.2735 40.275" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22.1313 40.4727L40.4712 22.1328" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                    </button>
                                    <h2 class="i-header__calendar-title">Календарь скидок</h2>
                                    <!-- <input type="text" id="datepicker" placeholder="Выберите дату"> -->
                                    <div id="datepickerIndex"></div>

                                    <!-- <div class="calendar">
                                        <div class="weekdays">
                                            <div>пн</div>
                                            <div>вт</div>
                                            <div>ср</div>
                                            <div>чт</div>
                                            <div>пт</div>
                                            <div>сб</div>
                                            <div>вс</div>
                                        </div>
                                        <div class="month">
                                            <i class="fas fa-angle-left prev"></i>
                                            <div class="date">
                                            <h1></h1>
                                            <p></p>
                                            </div>
                                            <i class="fas fa-angle-right next"></i>
                                        </div>
                                        <div class="days"></div>
                                        <div class="calendar-add"><p>Скидка каждые 7 / 14 / 21 день</p></div>
                                    </div> -->
                                    <div class="i-header__calendar-add">Получите  выгоду</div>
                                    <p class="i-header__calendar-text">
                                        При оплате заявки заблаговременно <br>
                                        Вам доступна скидка, укажите <br>
                                        желаемую дату. <br>
                                        <br>
                                        От 7 дней - 5% <br>
                                        От 14 дней – 10% <br>
                                        От 21 дня - 15%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="i-header__block-model-hr"></div>
            </div>
            <div class="i-header__block-text">
                <div class="i-header__block-text-title">
                    О нас
                </div>
                <div class="i-header__block-text-add">
                    Это быстрая и бесплатная доставка
                    цветов и подарков в Твоём городе
                    <br><br>
                    Немного о нас
                    Мы работаем с 2015 года
                    у Нас богатый опыт в своём деле
                    <br><br>
                    Все Наши цветы это высококачественный
                    импорт который транспортируется и хранится самыми современными способами
                    <br><br>
                    Быстрая транспортировка позволяет получать
                    самые свежие местные и экзотические Цветы
                </div>
            </div>
        </div>
    </div>
</header>

<div class="model-notice display-n">
    <div class="model-notice__block">
        <button class="model-notice__block-close"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 17.5L17.5 1" stroke="#AFB1BD" stroke-width="2"/>
                <path d="M17.5 17.5L0.999999 1" stroke="#AFB1BD" stroke-width="2"/>
            </svg>
        </button>
        <div class="model-notice__block-icons"><svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" fill="#16B8C3" xmlns="http://www.w3.org/2000/svg"><g><path d="m411 262.862v-47.862c0-69.822-46.411-129.001-110-148.33v-21.67c0-24.813-20.187-45-45-45s-45 20.187-45 45v21.67c-63.59 19.329-110 78.507-110 148.33v47.862c0 61.332-23.378 119.488-65.827 163.756-4.16 4.338-5.329 10.739-2.971 16.267s7.788 9.115 13.798 9.115h136.509c6.968 34.192 37.272 60 73.491 60 36.22 0 66.522-25.808 73.491-60h136.509c6.01 0 11.439-3.587 13.797-9.115s1.189-11.929-2.97-16.267c-42.449-44.268-65.827-102.425-65.827-163.756zm-170-217.862c0-8.271 6.729-15 15-15s15 6.729 15 15v15.728c-4.937-.476-9.94-.728-15-.728s-10.063.252-15 .728zm15 437c-19.555 0-36.228-12.541-42.42-30h84.84c-6.192 17.459-22.865 30-42.42 30zm-177.67-60c34.161-45.792 52.67-101.208 52.67-159.138v-47.862c0-68.925 56.075-125 125-125s125 56.075 125 125v47.862c0 57.93 18.509 113.346 52.671 159.138z"/><path d="m451 215c0 8.284 6.716 15 15 15s15-6.716 15-15c0-60.1-23.404-116.603-65.901-159.1-5.857-5.857-15.355-5.858-21.213 0s-5.858 15.355 0 21.213c36.831 36.831 57.114 85.8 57.114 137.887z"/><path d="m46 230c8.284 0 15-6.716 15-15 0-52.086 20.284-101.055 57.114-137.886 5.858-5.858 5.858-15.355 0-21.213-5.857-5.858-15.355-5.858-21.213 0-42.497 42.497-65.901 98.999-65.901 159.099 0 8.284 6.716 15 15 15z"/></g></svg></div>
        <div class="model-notice__block-text">
            <div class="model-notice__block-text-title">У вас новое уведомление</div>
        </div>
    </div>
</div>

<script>
    $('#indexCity').change(function(){
        location.href='/set-city/'+$(this).val()
    })
</script>

{{--<script src="js/script.min.js"></script>--}}
</body>
</html>
