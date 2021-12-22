@extends('layouts.admin')
@section('title', 'Добавить товар')
@section('meta')
    <link href="/admin_panel/plugins/select2/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
    @endif
    <form action="{{route('admin.product.store')}}" id="form-edit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" value="" class="form-control" placeholder="Товар 1">
        </div>
        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label>Изображение</label>
            <input type="file" class="form-control-file" name="img" id="customFile" />
        </div>

        <div class="form-group">
            <label>Цена</label>
            <input type="text" name="price" value="" class="form-control" placeholder="1231">
        </div>

        <div class="form-group">
            <label>Баллы</label>
            <input type="text" name="score" value="" class="form-control" placeholder="15">
        </div>

        <div class="form-group">
            <label>Скидка %</label>
            <input type="text" name="sale" value="" class="form-control" placeholder="20">
        </div>

        <label for="">Категория</label>
        <div class="cat-select">
        <select class="js-example-basic-multiple" style="width: 100%; margin: 0 auto;" name="cat_id">
            @foreach($categories as $category)

                <option value="{{$category['id']}}">{{$category['name']}}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group mt-3">
            <label>Скрыть?</label>
            <select name="status" id="">
                <option value="1">Нет</option>
                <option value="0">Да</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Галлерея</label>
            <input type="file" class="form-control-file" multiple name="gallery[]">
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Выбрать цвет</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <table>

                @foreach($colors as $color)
                        <tr>
                            <th>{{$color['name']}}</th>
                            <th><button type="button" class="ml-3 btn btn-block btn-primary btn-sm color-add" data-id="{{$color['id']}}">+</button></th>
                        </tr>
                @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer-->
        </div>


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Выбрать размеры</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <table>

                    @foreach($sizes as $size)
                        <tr>
                            <th>{{$size['name']}}</th>
                            <th><button type="button" class="ml-3 btn btn-block btn-primary btn-sm size-add" data-id="{{$size['id']}}">+</button></th>
                            <th id="size_input{{$size['id']}}"></th>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer-->
        </div>


        <div class="form-group path-product">
            <label for="">Патчи товара</label>
            <div class="row m-0">
            <select name="location[]" id="location" onchange="test($(this).val())" class="form-control col-2">
                <option value="Город">Город</option>
                <option value="Регион">Регион</option>
                <option value="Страна">Страна</option>
            </select>

            <div class="path-city col-2">
            <select class="city-select" style="width: 100%; margin: 0 auto;" name="path-city1">
                @foreach($cities as $city)
                    <option value="{{$city['id']}}">{{$city['title']}}</option>
                @endforeach
            </select>
            </div>

                <div class="path-region col-2" style="display: none">
                    <select class="city-select" style="width: 100%; margin: 0 auto;" name="path-region1">
                        @foreach($regions as $city)
                            <option value="{{$city['id']}}">{{$city['title']}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="path-country col-2" style="display: none">
                    <select class="city-select" style="width: 100%; margin: 0 auto;" name="path-country1">
                        @foreach($countries as $city)
                            <option value="{{$city['id']}}">{{$city['title']}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="text" class="form-control col-2" style="display: none" id="hide" placeholder="123">

            <select name="path-status1" id="" class="form-control col-2">
                <option value="" selected disabled>Статус</option>
                <option value="Да">Активен</option>
                <option value="Нет">Выключен</option>
            </select>

            <input type="text" class="col-1 ml-2" name="path-price1" value="" placeholder="Цена">
            <input type="text" class="col-1 ml-2" name="path-sale1" value="" placeholder="Скидка">
            <input type="text" class="col-1 ml-2" name="path-score1" value="" placeholder="Баллы">
            <input type="text" class="col-1 ml-2" name="path-charge1" value="" placeholder="Наценка">

            </div>

            <div id="path-city-add"></div>
            <button class="btn btn-primary mt-2" type="button" onclick="add_path_city_row()">+</button>

        </div>


{{--        Размер--}}
        <div class="form-group path-product">
            <label for="">Патчи размера</label>
            <div class="row m-0">
                <select name="size_location[]" id="location" onchange="size_change($(this).val())" class="form-control col-2">
                    <option value="Город">Город</option>
                    <option value="Регион">Регион</option>
                    <option value="Страна">Страна</option>
                </select>

                <div class="size-path-city col-2">
                    <select class="city-select" style="width: 100%; margin: 0 auto;" name="path-size-city1">
                        @foreach($cities as $city)
                            <option value="{{$city['id']}}">{{$city['title']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="size-path-region col-2" style="display: none">
                    <select class="city-select" style="width: 100%; margin: 0 auto;" name="path-size-region1">
                        @foreach($regions as $city)
                            <option value="{{$city['id']}}">{{$city['title']}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="size-path-country col-2" style="display: none">
                    <select class="city-select" style="width: 100%; margin: 0 auto;" name="path-size-country1">
                        @foreach($countries as $city)
                            <option value="{{$city['id']}}">{{$city['title']}}</option>
                        @endforeach
                    </select>
                </div>

                <select name="size-path1" onchange="size_change_add($(this).val(), 1)" id="" class="col-1 mr-2">
                    @foreach($sizes as $size)
                        <option value="{{$size['id']}}">{{$size['name']}}</option>
                    @endforeach
                </select>

                <input type="text" class="form-control col-2" style="display: none" id="hide" placeholder="123">

                <select name="path-size-status1" id="" class="form-control col-2">
                    <option value="" selected disabled>Скрыть товар?</option>
                    <option value="Да">Да</option>
                    <option value="Нет">Нет</option>
                </select>

                <input type="text" class="col-1 ml-2" name="path-size-price1" value="" placeholder="Цена">
                <input type="text" class="col-1 ml-2" name="path-size-sale1" value="" placeholder="Скидка">
                <input type="text" class="col-1 ml-2" name="path-size-score1" value="" placeholder="Баллы">
                <div class="d-flex ml-4">
                <label for="m1" class="form-check-label">Главный</label>
                <input type="radio" class="form-check-input" name="main1" id="m1" value="1">
                </div>
            </div>

            <div id="path-size-add"></div>
            <button class="btn btn-primary mt-2" type="button" onclick="add_path_size_row()">+</button>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
{{--        end size--}}
    </form>
    <style>
        .cat-select .select2-selection--single{
            height: 100% !important;
        }
    </style>
@endsection

@section('scripts')

    <script src="/admin_panel/plugins/select2/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Выберите категорию',
            });
            $('.select2-container--default').addClass('mt-2')
            $('.city-select').select2({placeholder: 'Выберите город',});
            $('.path-product>.row>.select2-container').addClass('col-2')
            let selector = $('.path-product').find('.select2-selection--single')
            selector.css('height', '90%')
        });

        //colors
        $('.color-add').click(function (){
            let id = $(this).data('id')
                if($(this).html() == '-'){
                $('#color'+id).remove()
                $(this).html('+')
                $(this).addClass('btn-primary')
                $(this).removeClass('btn-success')
                }else {
                    $('#form-edit').append('<input type="hidden" id="color'+id+'" value="' + id + '" name="colors[]">')
                    $(this).removeClass('btn-primary')
                    $(this).addClass('btn-success')
                    $(this).html('-')
                }

        })


        $('.size-add').click(function (){
            let id = $(this).data('id')
            if($(this).html() == '-'){
                $('#size'+id).remove()
                $('#size_price'+id).remove()
                $('#size_price_sale'+id).remove()
                $('#size_price_score'+id).remove()
                $('#size_price_status'+id).remove()
                $('#size_is_main'+id).remove()
                $('#main_span'+id).remove()
                $(this).html('+')
                $(this).addClass('btn-primary')
                $(this).removeClass('btn-success')
            }else {
                $('#form-edit').append('<input type="hidden" id="size'+id+'" value="' + id + '" name="sizes[]">')
                $('#size_input'+id).append('<input type="text" id="size_price'+id+'" placeholder="Цена" class="ml-4" name="size_price'+id+'">')
                $('#size_input'+id).append('<input type="text" id="size_price_sale'+id+'" placeholder="Скидка" class="ml-2" name="size_price_sale'+id+'">')
                $('#size_input'+id).append('<input type="text" id="size_price_score'+id+'" value="" placeholder="Балы" class="ml-2" name="size_price_score'+id+'">')
                $('#size_input'+id).append('<select name="size_price_status'+id+'" id="size_price_status'+id+'" class="p-1 ml-2"><option value="" disabled selected>Статус</option><option value="1">Активен</option><option value="0">Выключен</option></select>')
                $('#size_input'+id).append('<span class="ml-2" id="main_span'+id+'">Главный</span> <input type="radio" id="size_is_main'+id+'" value="'+id+'" class="ml-2" name="size_is_main">')
                $(this).removeClass('btn-primary')
                $(this).addClass('btn-success')
                $(this).html('-')
            }

        })

        //City path
        let path_city_counter = 1;
        function add_path_city_row(){
            path_city_counter++;
            $('#path-city-add').append('<div class="row path-created m-0 mt-2" id="path_city'+path_city_counter+'"> <select name="location[]" onchange="add_change($(this).val(), '+path_city_counter+')" id="" class="form-control col-2"> <option value="Город">Город</option> <option value="Регион">Регион</option> <option value="Страна">Страна</option> </select> <div class="path-city'+path_city_counter+' col-2"><select class="city-select1" style="width: 100%; margin: 0 auto;" name="path-city'+path_city_counter+'" > @foreach($cities as $city) <option value="{{$city['id']}}">{{$city['title']}}</option> @endforeach </select></div> <div class="path-region'+path_city_counter+' col-2" style="display: none"><select class="city-select" style="width: 100%; margin: 0 auto;" name="path-region'+path_city_counter+'">@foreach($regions as $city)<option value="{{$city['id']}}">{{$city['title']}}</option>@endforeach</select></div><div class="path-country'+path_city_counter+' col-2" style="display: none"><select class="city-select" style="width: 100%; margin: 0 auto;" name="path-country'+path_city_counter+'">@foreach($countries as $city) <option value="{{$city['id']}}">{{$city['title']}}</option>@endforeach</select></div> <select name="path-status'+path_city_counter+'" id="" class="form-control col-2"> <option value="" selected disabled>Скрыть товар?</option> <option value="Да">Да</option> <option value="Нет">Нет</option> </select> <input type="text" class="col-1 ml-2" name="path-price'+path_city_counter+'" value="" placeholder="Цена"> <input type="text" class="col-1 ml-2" name="path-sale'+path_city_counter+'" value="" placeholder="Скидка"> <input type="text" class="col-1 ml-2" name="path-score'+path_city_counter+'" value="" placeholder="Баллы"><input type="text" class="col-1 ml-2" name="path-charge'+path_city_counter+'" value="" placeholder="Наценка"> <button class="btn btn-warning btn-sm ml-2" type="button" onclick="path_city_remove('+path_city_counter+')">X</button> </div>');
            $('.city-select1').select2({placeholder: 'Выберите город',});
            $('.path-created>.select2-container').addClass('col-2');
            let selector = $('.path-product').find('.select2-selection--single');
            selector.css('height', '90%');
        }

        function path_city_remove(id){
            $('#path_city'+id).remove()
        }

        function test(val){
            if(val == 'Регион'){
                $('.path-region').css('display', 'block')
                $('.path-city').css('display', 'none')
                $('.path-country').css('display', 'none')
            }else if(val == 'Страна'){
                $('.path-region').css('display', 'none')
                $('.path-city').css('display', 'none')
                $('.path-country').css('display', 'block')
            }else if(val == 'Город'){
                $('.path-region').css('display', 'none')
                $('.path-city').css('display', 'block')
                $('.path-country').css('display', 'none')
            }
        }

        function add_change(val , count){
            if(val == 'Регион'){
                $('.path-region'+count).css('display', 'block')
                $('.path-city'+count).css('display', 'none')
                $('.path-country'+count).css('display', 'none')
            }else if(val == 'Страна'){
                $('.path-region'+count).css('display', 'none')
                $('.path-city'+count).css('display', 'none')
                $('.path-country'+count).css('display', 'block')
            }else if(val == 'Город'){
                $('.path-region'+count).css('display', 'none')
                $('.path-city'+count).css('display', 'block')
                $('.path-country'+count).css('display', 'none')
            }
            $('.city-select').select2({placeholder: 'Выберите город',});
            $('.city-select1').select2({placeholder: 'Выберите город',});
            $('.path-created>.select2-container').addClass('col-2')
            let selector = $('.path-product').find('.select2-selection--single')
            selector.css('height', '90%')
        }

        let add_size_counter = 1;
        function add_path_size_row(){
            add_size_counter++;
            $('#path-size-add').append('<div class="row m-0" id="size-row'+add_size_counter+'"> <select name="size_location[]" id="location" onchange="size_change1($(this).val(), '+add_size_counter+')" class="form-control col-2"> <option value="Город">Город</option> <option value="Регион">Регион</option> <option value="Страна">Страна</option> </select> <div class="size-path-city'+add_size_counter+' col-2"> <select class="city-select" style="width: 100%; margin: 0 auto;" name="path-size-city'+add_size_counter+'"> @foreach($cities as $city) <option value="{{$city['id']}}">{{$city['title']}}</option> @endforeach </select> </div> <div class="size-path-region'+add_size_counter+' col-2" style="display: none"> <select class="city-select" style="width: 100%; margin: 0 auto;" name="path-size-region'+add_size_counter+'"> @foreach($regions as $city) <option value="{{$city['id']}}">{{$city['title']}}</option> @endforeach </select> </div> <div class="size-path-country'+add_size_counter+' col-2" style="display: none"> <select class="city-select" style="width: 100%; margin: 0 auto;" name="path-size-country'+add_size_counter+'"> @foreach($countries as $city) <option value="{{$city['id']}}">{{$city['title']}}</option> @endforeach </select> </div> <select name="size-path'+add_size_counter+'" id="" class="col-1 mr-2" onchange="size_change_add($(this).val(),'+add_size_counter+')"> @foreach($sizes as $size) <option value="{{$size['id']}}">{{$size['name']}}</option> @endforeach </select> <select name="path-size-status'+add_size_counter+'" id="" class="form-control col-2"> <option value="" selected disabled>Скрыть товар?</option> <option value="Да">Да</option> <option value="Нет">Нет</option> </select> <input type="text" class="col-1 ml-2" name="path-size-price'+add_size_counter+'" value="" placeholder="Цена"> <input type="text" class="col-1 ml-2" name="path-size-sale'+add_size_counter+'" value="" placeholder="Скидка"> <input type="text" class="col-1 ml-2" name="path-size-score'+add_size_counter+'" value="" placeholder="Баллы"> <div class="d-flex ml-4"> <label for="m'+add_size_counter+'" class="form-check-label">Главный</label> <input type="radio" class="form-check-input" name="main1" id="m'+add_size_counter+'" value="1"> </div> <button type="button" class="btn btn-warning btn-sm ml-2" onclick="path_size_remove('+add_size_counter+')">X</button> </div>');
            $('.city-select').select2({placeholder: 'Выберите город',});
            $('.path-created>.select2-container').addClass('col-2')
            let selector = $('.size-path-city').find('.select2-selection--single')
            selector.css('height', '90%')
        }

        function path_size_remove(count){
            $('#size-row'+count).remove()
        }


        function size_change(val){
            if(val == 'Регион'){
                $('.size-path-region').css('display', 'block')
                $('.size-path-city').css('display', 'none')
                $('.size-path-country').css('display', 'none')
            }else if(val == 'Страна'){
                $('.size-path-region').css('display', 'none')
                $('.size-path-city').css('display', 'none')
                $('.size-path-country').css('display', 'block')
            }else if(val == 'Город'){
                $('.size-path-region').css('display', 'none')
                $('.size-path-city').css('display', 'block')
                $('.size-path-country').css('display', 'none')
            }
        }

        function size_change1(val, count){
            if(val == 'Регион'){
                $('.size-path-region'+count).css('display', 'block')
                $('.size-path-city'+count).css('display', 'none')
                $('.size-path-country'+count).css('display', 'none')
            }else if(val == 'Страна'){
                $('.size-path-region'+count).css('display', 'none')
                $('.size-path-city'+count).css('display', 'none')
                $('.size-path-country'+count).css('display', 'block')
            }else if(val == 'Город'){
                $('.size-path-region'+count).css('display', 'none')
                $('.size-path-city'+count).css('display', 'block')
                $('.size-path-country'+count).css('display', 'none')
            }
        }

        function size_change_add(val,count){
            $('#m'+count).val(val)
        }

        //Удаляем из базы все, где есть айди товара и проверяем на City Region..
    </script>
@endsection
