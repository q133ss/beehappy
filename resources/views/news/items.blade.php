@foreach($news as $key => $new)
<div class="new-content__block-table-{{$key+1}}" style="background-image: url('{{$new['img']}}');background-size: cover">
    @if($key == 0 || $key == 5)
    <div class="new-content__block-table-{{$key+1}}-date">{{substr($new['created_at'],0,10)}}</div>
    <div class="new-content__block-table-{{$key+1}}-title">{{$new['title']}}</div>
    @else
    <div class="new-content__block-table-{{$key+1}}-data">{{substr($new['created_at'],0,10)}}</div>
    @endif
    <div class="new-content__block-table-{{$key+1}}-text">
        <div class="new-content__block-table-{{$key+1}}-text-item" onclick="location.href='{{route('news.single', $new['id'])}}'" style="cursor:pointer;">{{mb_strimwidth($new['content'], 0, 124, "...")}}</div>
        @if($key == 0 || $key == 5)
        <div class="new-content__block-table-{{$key+1}}-text-link"><a href="{{route('news.single', $new['id'])}}">Читать далее</a></div>
        @endif
    </div>
</div>
@endforeach
