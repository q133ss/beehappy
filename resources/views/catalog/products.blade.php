<ul class="toy-content__block-collections">
@foreach ($products as $key => $product)
    @php 
        if ($cat['charge'] > 0) {
            $product['price'] = $product['price'] + ($product['price'] / 100 * $cat['charge']);
        }        
    @endphp
    <li class="march-content__block-collections-item" id="prod{{ $product['id'] }}" data-id="{{ $product['id'] }}">
        <div class="march-content__block-collections-img"
            style="background-image: url('{{ $product['img'] }}'); background-size: cover;"></div>
        <div class="march-content__block-collections-title">{{ $product['name'] }}</div>
        <div class="march-content__block-collections-price">
            @php $ball = $product['scores'] > 0 ? floor($product['price'] / 100 * $product['scores']) : 0 @endphp
            <div class="march-content__block-collections-price-balls">{{ $ball }}</div>
            @if ($product['sale'] !== 0)
                <div class="march-content__block-collections-price-sum js-cprice" data-price="{{ $product['price'] }}" data-sale="{{ $product['sale'] }}">
                    <p>{{ floor($product['price']- ($product['price'] / 100 * $product['sale'])) }}₽</p>
                </div>
            @else
                <div class="march-content__block-collections-price-sum js-cprice" data-price="{{ $product['price'] }}">
                    <p>{{ $product['price'] }}₽</p>
                </div>
            @endif

        </div>
        @php
            $size = $product->productSizes()->where('is_main', 1)->first();
            $color = $product->productColors()->first();
        @endphp
        <div class="march-content__block-collections-add">
            <div class="march-content__block-collections-add-shop js-cart" style="cursor:pointer;"
                data-id="{{ $product['id'] }}" @php
                if ($size) echo 'data-size="'.$size->size_id.'"';
                if ($color) echo 'data-color="'.$color->color_id.'"';
                @endphp ><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.1778 6.20312C14.8434 5.78438 14.3872 5.55312 13.8934 5.55312H12.7653C12.6591 2.65937 10.5622 0.34375 7.99969 0.34375C5.43719 0.34375 3.34032 2.65937 3.23407 5.55312H2.10594C1.61219 5.55312 1.15594 5.78438 0.82157 6.20312C0.399695 6.72813 0.24657 7.45938 0.405945 8.1625L1.75907 14.125C1.96219 15.025 2.66219 15.6562 3.45907 15.6562H12.5372C13.3341 15.6562 14.0341 15.0281 14.2372 14.125L15.5934 8.1625C15.7528 7.45938 15.5997 6.72813 15.1778 6.20312ZM7.99969 1.61875C9.8622 1.61875 11.3872 3.3625 11.4872 5.55312H4.51219C4.61219 3.36562 6.13719 1.61875 7.99969 1.61875ZM14.3497 7.87813L12.9966 13.8438C12.9278 14.15 12.7309 14.3813 12.5403 14.3813H3.45907C3.26844 14.3813 3.07157 14.15 3.00282 13.8438L1.64969 7.87813C1.57782 7.5625 1.53407 6.82812 2.10594 6.82812H13.8934C14.5091 6.82812 14.4216 7.5625 14.3497 7.87813Z"
                        fill="white" />
                    <path
                        d="M4.83428 8.09692C4.48115 8.09692 4.19678 8.3813 4.19678 8.73442V12.7188C4.19678 13.0719 4.48115 13.3563 4.83428 13.3563C5.1874 13.3563 5.47178 13.0719 5.47178 12.7188V8.73442C5.4749 8.38442 5.1874 8.09692 4.83428 8.09692Z"
                        fill="white" />
                    <path
                        d="M7.92461 8.09692C7.57149 8.09692 7.28711 8.3813 7.28711 8.73442V12.7188C7.28711 13.0719 7.57149 13.3563 7.92461 13.3563C8.27774 13.3563 8.56212 13.0719 8.56212 12.7188V8.73442C8.56212 8.38442 8.27462 8.09692 7.92461 8.09692Z"
                        fill="white" />
                    <path
                        d="M11.0125 8.09692C10.6594 8.09692 10.375 8.3813 10.375 8.73442V12.7188C10.375 13.0719 10.6594 13.3563 11.0125 13.3563C11.3656 13.3563 11.65 13.0719 11.65 12.7188V8.73442C11.65 8.38442 11.3656 8.09692 11.0125 8.09692Z"
                        fill="white" />
                </svg>
            </div>
            <div class="march-content__block-collections-add-share js-share">
                <svg width="12" height="12" viewBox="0 0 12 12"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.8949 3.48958L8.6449 0.114619C8.53888 0.00466566 8.37638 -0.0298494 8.23493 0.0270958C8.09293 0.0845903 7.99992 0.222101 7.99992 0.375084V2.00013H7.87495C5.18699 2.00013 3 4.18711 3 6.87507V7.62506C3 7.79901 3.1225 7.94403 3.29196 7.98358C3.31952 7.99054 3.34698 7.99356 3.37445 7.99356C3.51599 7.99356 3.65148 7.91052 3.71694 7.78006C4.41997 6.37355 5.83344 5.50006 7.40593 5.50006H7.99992V7.12501C7.99992 7.27808 8.09293 7.41559 8.23493 7.47254C8.37546 7.53003 8.53888 7.49506 8.6449 7.38502L11.8949 4.01005C12.0349 3.86458 12.0349 3.63561 11.8949 3.48958Z"
                        fill="#16B8C3" />
                    <path
                        d="M10.4999 11.9998H1.49998C0.672997 11.9998 0 11.3269 0 10.4998V3.49998C0 2.673 0.672997 2 1.49998 2H2.99997C3.27645 2 3.49993 2.22348 3.49993 2.49996C3.49993 2.77645 3.27645 2.99993 2.99997 2.99993H1.49998C1.22396 2.99993 0.999928 3.22396 0.999928 3.49998V10.4998C0.999928 10.7759 1.22396 10.9999 1.49998 10.9999H10.4999C10.7758 10.9999 10.9998 10.7759 10.9998 10.4998V6.49995C10.9998 6.22346 11.2233 5.99989 11.4998 5.99989C11.7764 5.99989 11.9999 6.22346 11.9999 6.49995V10.4998C11.9999 11.3269 11.3269 11.9998 10.4999 11.9998Z"
                        fill="#16B8C3" />
                </svg>
            </div>
            <button type="button" class="js-calendar march-content__block-collections-add-calendar i-header__block-model-btn">
                <svg width="14" height="14"
                    viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.3594 1.09375H11.7031V0H10.6094V1.09375H3.39062V0H2.29688V1.09375H1.64062C0.735984 1.09375 0 1.82973 0 2.73438V12.3594C0 13.264 0.735984 14 1.64062 14H12.3594C13.264 14 14 13.264 14 12.3594V2.73438C14 1.82973 13.264 1.09375 12.3594 1.09375ZM12.9062 12.3594C12.9062 12.6609 12.6609 12.9062 12.3594 12.9062H1.64062C1.33908 12.9062 1.09375 12.6609 1.09375 12.3594V5.14062H12.9062V12.3594ZM12.9062 4.04688H1.09375V2.73438C1.09375 2.43283 1.33908 2.1875 1.64062 2.1875H2.29688V3.28125H3.39062V2.1875H10.6094V3.28125H11.7031V2.1875H12.3594C12.6609 2.1875 12.9062 2.43283 12.9062 2.73438V4.04688Z"
                        fill="#854FC8" />
                    <path d="M3.17188 6.28906H2.07812V7.38281H3.17188V6.28906Z" fill="#854FC8" />
                    <path d="M5.35938 6.28906H4.26562V7.38281H5.35938V6.28906Z" fill="#854FC8" />
                    @@ -1537,9 +1537,59 @@
                    <path d="M9.73438 10.6641H8.64062V11.7578H9.73438V10.6641Z" fill="#854FC8" />
                    <path d="M11.9219 8.47656H10.8281V9.57031H11.9219V8.47656Z" fill="#854FC8" />
                </svg>
            </button>
        </div>
    </li>
@endforeach
</ul>
@if ($products->lastPage() > $products->currentPage())
    <div class="toy-content__block-open js-page">
        <a href="{{ $products->appends(request()->query())->url($products->currentPage() + 1) }}"
            class="march-content__block-add">
            Показать еще
        </a>
    </div>
@endif


