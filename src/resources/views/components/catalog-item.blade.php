<div class="catalog_card">
    <div class="content">
        <div class="{{ $class }}">
            @foreach ($item->attachedImages()->orderBy('rating', 'desc')->get() as $image)
                <div>
                    <img class="slider_img" id="noway" src="{{ asset('media/' . $image->image_path) }}">
                </div>
            @endforeach
        </div>
    </div>
    <div class="card_info">
        <div class="card_main_text">{{ $item->title }}</div>
        <div class="card_description">{{ $item->subtitle }}</div>
        {{-- <div class="card_spec">Характеристики:</div> --}}
        <div class="card_spec_text">
            <div class="card_text">
                <div class="sizes"><b>Размеры:</b> {{ $item->specs->sizes }}</div>
                {{-- <span>Площадь, м² {{ $item->specs->area }}</span> --}}
                {{-- <span> Площадь застройки, м² {{ $item->specs->building_area }}</span> --}}
            </div>
            {{-- <div class="card_text">
                <span>
                    Площадь жилая, м² {{ $item->specs->libing_area }}
                </span>
                <span>
                    Длина, м {{ $item->specs->length }}
                </span>
            </div> --}}
        </div>
        <div class="price">
            {{-- <div class="old_price">{{ number_format($item->old_price, 0, '', ' ') }}
                <img src="{{ asset('images/grey_ruble.svg') }}">
            </div> --}}
            <div class="new_price">
                от {{ number_format($item->new_price, 0, '', ' ') }}
                <img src="{{ asset('images/dark_ruble.svg') }}">
            </div>
        </div>
        <div class="card_footer">
            <a href="#" id="card_about" data-id="{{ $item->id }}" class="card_about">
                <div class="card_button">Подробнее о комплектации</div>
            </a>
            {{-- <div class="rassrok">{{ number_format($item->monthly_payment, 0, '', ' ') }}
                <img src="{{ asset('images/grey_ruble.svg') }}"> × {{ $item->month_count }} месяцев в
                рассрочку
            </div> --}}
        </div>
    </div>
</div>
