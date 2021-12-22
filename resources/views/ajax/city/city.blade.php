@foreach($cities as $city)
    <button class="header__city-select-element" onclick="location.href='/set-city/{{$city['id']}}'" id="header__city-select-element-{{$city['id']}}" value="{{$city['title']}}">
        {{$city['title']}}</button>
@endforeach
