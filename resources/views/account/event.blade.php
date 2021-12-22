@extends('layouts.account')
@section('title', 'События')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="header-profile__event">
        <div class="header-profile__event-title">Календарь событий</div>
        <div class="header-profile__event-table">
            <div class="header-profile__event-table-calendar">
                <div class="header-profile__event-table-calendar-title">Выберите дату</div>
                <div class="header-profile__event-table-calendar-block">
                    <input type="input" id="datepickerProfileEvent" class="header-profile__event-table-calendar-block-date hasDatepicker">
                    <div class="header-profile__event-table-calendar-block-bg"></div>
                </div>
                <input type="input" id="somedate">
                <div class="date" data-altfield="#datepickerProfileEvent"></div>
                <button class="header-profile__event-table-calendar-btn" type="button" data-bs-toggle="modal" data-bs-target="#profileEventModel"><a href="#">Добавить событие</a></button>

                <div class="modal fade" id="profileEventModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content header-profile__event-table-calendar-model">
                            <button type="button" class="btn-close header-profile__event-table-calendar-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.3281 22.3296L40.2735 40.275" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M22.1313 40.4727L40.4712 22.1328" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>

                            </button>
                            <div class="header-profile__event-table-calendar-model-content">
                                <form action="{{route('profile.event.create')}}" method="POST">
                                    @csrf
                                    <div class="header-profile__event-table-calendar-model-title">Ваше событие</div>
                                    <select id="event-events" style="display: none;" name="type">
                                        <option value=""></option>
                                        @foreach($events as $event)
                                            <option value="{{$event['title']}}">{{$event['title']}}</option>
                                        @endforeach
                                    </select>




                                    <input type="text" class="header-profile__event-table-calendar-model-date" placeholder="ДД/ММ/ГГГГ" name="date">
                                    <input type="text" class="header-profile__event-table-calendar-model-where" placeholder="Кого нужно поздравить" name="subject">
                                    <input type="text" class="header-profile__event-table-calendar-model-phone" placeholder="Номер телефона (не обязательно)" name="phone">
                                    <input type="text" class="header-profile__event-table-calendar-model-city" placeholder="Город получателя (не обязательно)" name="city">
                                    <input type="text" class="header-profile__event-table-calendar-model-address" placeholder="Адрес получателя (не обязательно)" name="adress">
                                    <button class="header-profile__event-table-calendar-model-btn" type="submit"><a>Добавить событие</a></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{--                Edit DoB--}}
                <div class="modal fade" id="editDoB" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content header-profile__event-table-calendar-model">
                            <button type="button" class="btn-close header-profile__event-table-calendar-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.3281 22.3296L40.2735 40.275" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M22.1313 40.4727L40.4712 22.1328" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>

                            </button>
                            <div class="header-profile__event-table-calendar-model-content">
                                <form action="{{route('profile.event.date.update')}}" method="POST">
                                    @csrf
                                <div class="header-profile__event-table-calendar-model-title">Изменить день рождения</div>

                                <div class="model-header__registration-birthday">
                                    <input placeholder="12/02/1998" type="text" class="model-header__registration-birthday-input hasDa dob" value="{{$user->date_of_birthday}}" id="datepicker" name="date">
                                    <label for="editdob">Ваша дата рождения</label>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.2422 1.17188H17.6562V0.585938C17.6562 0.262344 17.3939 0 17.0703 0C16.7467 0 16.4844 0.262344 16.4844 0.585938V1.17188H14.1016V0.585938C14.1016 0.262344 13.8392 0 13.5156 0C13.192 0 12.9297 0.262344 12.9297 0.585938V1.17188H10.5859V0.585938C10.5859 0.262344 10.3236 0 10 0C9.67641 0 9.41406 0.262344 9.41406 0.585938V1.17188H7.07031V0.585938C7.07031 0.262344 6.80797 0 6.48438 0C6.16078 0 5.89844 0.262344 5.89844 0.585938V1.17188H3.51562V0.585938C3.51562 0.262344 3.25328 0 2.92969 0C2.60609 0 2.34375 0.262344 2.34375 0.585938V1.17188H1.75781C0.788555 1.17188 0 1.96043 0 2.92969C0 3.6475 0 17.436 0 18.2422C0 19.2114 0.788555 20 1.75781 20H18.2422C19.2114 20 20 19.2114 20 18.2422C20 17.4357 20 3.64715 20 2.92969C20 1.96043 19.2114 1.17188 18.2422 1.17188ZM18.8281 18.2422C18.8281 18.5653 18.5653 18.8281 18.2422 18.8281H1.75781C1.43473 18.8281 1.17188 18.5653 1.17188 18.2422V5.85938H18.8281V18.2422ZM18.8281 4.6875H1.17188V2.92969C1.17188 2.6066 1.43473 2.34375 1.75781 2.34375H2.34375V2.92969C2.34375 3.25328 2.60609 3.51562 2.92969 3.51562C3.25328 3.51562 3.51562 3.25328 3.51562 2.92969V2.34375H5.89844V2.92969C5.89844 3.25328 6.16078 3.51562 6.48438 3.51562C6.80797 3.51562 7.07031 3.25328 7.07031 2.92969V2.34375H9.41406V2.92969C9.41406 3.25328 9.67641 3.51562 10 3.51562C10.3236 3.51562 10.5859 3.25328 10.5859 2.92969V2.34375H12.9297V2.92969C12.9297 3.25328 13.192 3.51562 13.5156 3.51562C13.8392 3.51562 14.1016 3.25328 14.1016 2.92969V2.34375H16.4844V2.92969C16.4844 3.25328 16.7467 3.51562 17.0703 3.51562C17.3939 3.51562 17.6562 3.25328 17.6562 2.92969V2.34375H18.2422C18.5653 2.34375 18.8281 2.6066 18.8281 2.92969V4.6875Z" fill="#16B8C3"></path>
                                        <path d="M14.6875 16.4844H14.1016V14.7266C14.1016 13.7573 13.313 12.9688 12.3438 12.9688H10.5859V11.657C11.2679 11.4152 11.7578 10.7639 11.7578 10C11.7578 9.70227 11.6728 9.39883 11.5855 9.24621L10.5085 7.36512C10.4041 7.18277 10.2101 7.07031 10 7.07031C9.78992 7.07031 9.5959 7.18277 9.49148 7.36512L8.41453 9.24621C8.32863 9.39633 8.24219 9.69824 8.24219 10C8.24219 10.7639 8.73207 11.4152 9.41406 11.657V12.9688H7.65625C6.68699 12.9688 5.89844 13.7573 5.89844 14.7266V16.4844H5.3125C4.98891 16.4844 4.72656 16.7467 4.72656 17.0703C4.72656 17.3939 4.98891 17.6562 5.3125 17.6562C5.62484 17.6562 14.2001 17.6562 14.6875 17.6562C15.0111 17.6562 15.2734 17.3939 15.2734 17.0703C15.2734 16.7467 15.0111 16.4844 14.6875 16.4844ZM9.45094 9.79449L10 8.83551L10.5491 9.79449C10.5736 9.8598 10.5859 9.92879 10.5859 10C10.5859 10.3231 10.3231 10.5859 10 10.5859C9.67691 10.5859 9.41406 10.3231 9.41406 10C9.41406 9.92883 9.42645 9.85984 9.45094 9.79449ZM12.9297 16.4844H7.07031V14.7266C7.07031 14.4035 7.33316 14.1406 7.65625 14.1406H12.3438C12.6668 14.1406 12.9297 14.4035 12.9297 14.7266V16.4844Z" fill="#16B8C3"></path>
                                    </svg>

                                </div>

                                <button class="header-profile__event-table-calendar-model-btn" type="submit"><a>Изменить</a></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                End--}}



            </div>
            <div class="header-profile__event-table-info">
                <div class="header-profile__event-table-info-title">Ближайшие события</div>
                <div class="header-profile__event-table-info-block">
                    <svg width="512" height="512" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg" data-bs-toggle="modal" data-bs-target="#editDoB">
                        <path d="M368 511.957H58.668C26.3047 511.957 0 485.652 0 453.289V143.957C0 111.594 26.3047 85.2891 58.668 85.2891H240C248.832 85.2891 256 92.457 256 101.289C256 110.121 248.832 117.289 240 117.289H58.668C43.9688 117.289 32 129.258 32 143.957V453.289C32 467.988 43.9688 479.957 58.668 479.957H368C382.699 479.957 394.668 467.988 394.668 453.289V271.957C394.668 263.125 401.836 255.957 410.668 255.957C419.5 255.957 426.668 263.105 426.668 271.957V453.289C426.668 485.652 400.363 511.957 368 511.957V511.957Z" fill="#16B8C3"></path>
                        <path d="M187.137 340.82C182.933 340.82 178.836 339.156 175.828 336.129C172.031 332.352 170.41 326.91 171.457 321.684L186.539 246.25C187.156 243.137 188.691 240.297 190.91 238.078L411.863 17.1523C434.73 -5.71875 471.937 -5.71875 494.828 17.1523C505.898 28.2227 512 42.9453 512 58.625C512 74.3047 505.898 89.0234 494.805 100.098L273.879 321.047C271.66 323.285 268.801 324.801 265.707 325.418L190.293 340.5C189.246 340.715 188.18 340.82 187.137 340.82V340.82ZM262.57 309.738H262.785H262.57ZM216.961 257.281L207.551 304.426L254.676 294.996L472.191 77.4844C477.226 72.4258 480 65.75 480 58.625C480 51.5 477.226 44.8203 472.191 39.7656C461.824 29.375 444.906 29.375 434.476 39.7656L216.961 257.281Z" fill="#16B8C3"></path>
                        <path d="M453.332 134.977C449.238 134.977 445.141 133.418 442.027 130.281L381.695 69.9297C375.445 63.6797 375.445 53.5469 381.695 47.2969C387.945 41.0469 398.078 41.0469 404.332 47.2969L464.66 107.648C470.91 113.898 470.91 124.031 464.66 130.281C461.523 133.398 457.43 134.977 453.332 134.977V134.977Z" fill="#16B8C3"></path>
                    </svg>

                    <div class="header-profile__event-table-info-block-text">День рождения</div>
                    <div class="header-profile__event-table-info-block-date">{{Auth::user()->date_of_birthday}}</div>
                </div>
                @foreach($user_events as $event)
                    {{--                    eee--}}
                    <div class="modal fade" id="event_edit_{{$event['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content header-profile__event-table-calendar-model">
                                <button type="button" class="btn-close header-profile__event-table-calendar-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.3281 22.3296L40.2735 40.275" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M22.1313 40.4727L40.4712 22.1328" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>

                                </button>
                                <div class="header-profile__event-table-calendar-model-content">
                                    <div class="header-profile__event-table-calendar-model-title">Изменить событие</div>

                                    <form action="{{route('profile.event.edit', $event['id'])}}" method="POST">
                                        @csrf
                                        <div class="header-profile__event-table-calendar-model-title">Ваше событие</div>
                                        {{--                                        <select id="event-events2" style="display: none;" name="type">--}}
                                        {{--                                            <option value=""></option>--}}
                                        {{--                                            <option value="День рождения">День рождения</option>--}}
                                        {{--                                            <option value="День ВДВ">День ВДВ</option>--}}
                                        {{--                                        </select>--}}




                                        <input type="text" class="header-profile__event-table-calendar-model-date" value="{{mb_substr($event['date'], 0 , 10)}}" placeholder="ДД/ММ/ГГГГ" name="date">
                                        <input type="text" class="header-profile__event-table-calendar-model-where" value="{{$event['subject']}}" placeholder="Кого нужно поздравить" name="subject">
                                        <input type="text" class="header-profile__event-table-calendar-model-phone" value="{{$event['phone']}}" placeholder="Номер телефона (не обязательно)" name="phone">
                                        <input type="text" class="header-profile__event-table-calendar-model-city" value="{{$event['city']}}" placeholder="Город получателя (не обязательно)" name="city">
                                        <input type="text" class="header-profile__event-table-calendar-model-address" value="{{$event['adress']}}" placeholder="Адрес получателя (не обязательно)" name="adress">
                                        <button class="header-profile__event-table-calendar-model-btn" type="submit"><a>Изменить событие</a></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                eee--}}
                    <div class="header-profile__event-table-info-block">
                        <svg width="512" height="512" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg" data-bs-toggle="modal" data-bs-target="#event_edit_{{$event['id']}}">
                            <path d="M368 511.957H58.668C26.3047 511.957 0 485.652 0 453.289V143.957C0 111.594 26.3047 85.2891 58.668 85.2891H240C248.832 85.2891 256 92.457 256 101.289C256 110.121 248.832 117.289 240 117.289H58.668C43.9688 117.289 32 129.258 32 143.957V453.289C32 467.988 43.9688 479.957 58.668 479.957H368C382.699 479.957 394.668 467.988 394.668 453.289V271.957C394.668 263.125 401.836 255.957 410.668 255.957C419.5 255.957 426.668 263.105 426.668 271.957V453.289C426.668 485.652 400.363 511.957 368 511.957V511.957Z" fill="#16B8C3"></path>
                            <path d="M187.137 340.82C182.933 340.82 178.836 339.156 175.828 336.129C172.031 332.352 170.41 326.91 171.457 321.684L186.539 246.25C187.156 243.137 188.691 240.297 190.91 238.078L411.863 17.1523C434.73 -5.71875 471.937 -5.71875 494.828 17.1523C505.898 28.2227 512 42.9453 512 58.625C512 74.3047 505.898 89.0234 494.805 100.098L273.879 321.047C271.66 323.285 268.801 324.801 265.707 325.418L190.293 340.5C189.246 340.715 188.18 340.82 187.137 340.82V340.82ZM262.57 309.738H262.785H262.57ZM216.961 257.281L207.551 304.426L254.676 294.996L472.191 77.4844C477.226 72.4258 480 65.75 480 58.625C480 51.5 477.226 44.8203 472.191 39.7656C461.824 29.375 444.906 29.375 434.476 39.7656L216.961 257.281Z" fill="#16B8C3"></path>
                            <path d="M453.332 134.977C449.238 134.977 445.141 133.418 442.027 130.281L381.695 69.9297C375.445 63.6797 375.445 53.5469 381.695 47.2969C387.945 41.0469 398.078 41.0469 404.332 47.2969L464.66 107.648C470.91 113.898 470.91 124.031 464.66 130.281C461.523 133.398 457.43 134.977 453.332 134.977V134.977Z" fill="#16B8C3"></path>
                        </svg>

                        <div class="header-profile__event-table-info-block-text">{{$event['type']}}</div>
                        <div class="header-profile__event-table-info-block-date">{{mb_substr($event['date'], 0, 10)}}</div>
                    </div>
                @endforeach

                <button class="header-profile__event-table-info-btn"><a href="#">Подобрать подарок</a></button>
            </div>
        </div>


    </div>

{{--    Notice--}}
    @if(session('success'))
    <div class="model-notice">
        <div class="model-notice__block">
            <button class="model-notice__block-close"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 17.5L17.5 1" stroke="#AFB1BD" stroke-width="2"/>
                    <path d="M17.5 17.5L0.999999 1" stroke="#AFB1BD" stroke-width="2"/>
                </svg>
            </button>
            <div class="model-notice__block-icons"><svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" fill="#16B8C3" xmlns="http://www.w3.org/2000/svg"><g><path d="m411 262.862v-47.862c0-69.822-46.411-129.001-110-148.33v-21.67c0-24.813-20.187-45-45-45s-45 20.187-45 45v21.67c-63.59 19.329-110 78.507-110 148.33v47.862c0 61.332-23.378 119.488-65.827 163.756-4.16 4.338-5.329 10.739-2.971 16.267s7.788 9.115 13.798 9.115h136.509c6.968 34.192 37.272 60 73.491 60 36.22 0 66.522-25.808 73.491-60h136.509c6.01 0 11.439-3.587 13.797-9.115s1.189-11.929-2.97-16.267c-42.449-44.268-65.827-102.425-65.827-163.756zm-170-217.862c0-8.271 6.729-15 15-15s15 6.729 15 15v15.728c-4.937-.476-9.94-.728-15-.728s-10.063.252-15 .728zm15 437c-19.555 0-36.228-12.541-42.42-30h84.84c-6.192 17.459-22.865 30-42.42 30zm-177.67-60c34.161-45.792 52.67-101.208 52.67-159.138v-47.862c0-68.925 56.075-125 125-125s125 56.075 125 125v47.862c0 57.93 18.509 113.346 52.671 159.138z"/><path d="m451 215c0 8.284 6.716 15 15 15s15-6.716 15-15c0-60.1-23.404-116.603-65.901-159.1-5.857-5.857-15.355-5.858-21.213 0s-5.858 15.355 0 21.213c36.831 36.831 57.114 85.8 57.114 137.887z"/><path d="m46 230c8.284 0 15-6.716 15-15 0-52.086 20.284-101.055 57.114-137.886 5.858-5.858 5.858-15.355 0-21.213-5.857-5.858-15.355-5.858-21.213 0-42.497 42.497-65.901 98.999-65.901 159.099 0 8.284 6.716 15 15 15z"/></g></svg></div>
            <div class="model-notice__block-text">
                <div class="model-notice__block-text-title">{{session('success')}}</div>
            </div>
        </div>
    </div>
    @endif
{{--    End notice--}}

    <script>
        $('.header-profile__menu-list-event').addClass('header-profile__menu-list-active');
        $( function() {
            $( "#datepicker" ).datepicker();
        });




        $(function() {

            $('#event-events2').css('display', 'none')
            $('#event-events2').after('<div class="event-select-item event-select-item"><div class="event-select-placeholder">Тип события</div><div id="event-select-wrapper" class="event-select-wrapper display-n"></div></div>')
            let count = $('#event-events2').children('option').length
            for( let i = 0; i < count; i++) {
                let arrows = $('#event-events2').children('option').eq(i).val()
                let newElementBlock = document.createElement("option");
                newElementBlock.classList.add("event-select-element")
                newElementBlock.id = `event-select-element-${i}`;
                newElementBlock.innerHTML = `${arrows}`
                document.getElementById("event-select-wrapper").appendChild(newElementBlock);
                $(`#event-select-element-${i}`).attr('value', `${arrows}`)
            }
            $('#event-select-element-0').css('display', 'none')
            $('.event-select-item').on('click', function() {
                $('.event-select-wrapper').toggleClass('display-n')
            })
            $(".event-select-element").on('click', function() {
                let idElement = this.id
                let valueElement = $(`#${idElement}`).val()
                $('.event-select-placeholder').html(valueElement)
                $('#event-events1 option:nth-child(1)').val(valueElement)
                $('#event-events1 option:nth-child(1)').html(valueElement)
                $('.event-select-placeholder').css('color', '#fff')
            })
        })

        $(window).on('load', function(){
            $('.event-select-element').attr('type', 'button');
        })
    </script>
@endsection
