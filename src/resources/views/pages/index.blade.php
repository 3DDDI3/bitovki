@extends('layouts.default')

@section('content')
    <main>
        <div class="container_mob">
            <div class="first_block" id="first">
                <div class="letters">
                    <img src="{{ asset('images/D.png') }}" class="back_D">
                    <img src="{{ asset('images/B.png') }}" class="back_B">
                </div>
                <div class="container">
                    {{-- <div class="first_block_header">
                        <div class="first_block_text">
                            <div class="first_block_main_text">{!! $page->block_2_title !!}</div>
                            <div class="first_block_under_text">{{ $page->block_2_subtitle }}</div>
                        </div>
                        <img src="{{ asset('media/' . $page->block_2_image_path) }}" class="first_block_img">
                        <div class="first_block_btn">{{ $page->block_2_image_description }}</div>
                        <div class="line"></div>
                    </div> --}}
                    <div class="first_block_main">
                        @if (!empty($page->block_2_text1) || !empty($page->block_2_text2))
                            <div class="first_block_left">
                                {!! $page->block_2_text2 !!}
                            </div>
                            {{-- <div class="first_block_right">
                                {!! $page->block_2_text1 !!}
                            </div> --}}
                        @endif
                    </div>
                    <div class="first_block_main-1">
                        <img src="{{ asset('images/complect1.png') }}" alt="">
                        <img src="{{ asset('images/complect2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="description-block" id="second">
            {{-- <div class="letters_second">
                <img src="{{ asset('images/D.png') }}" class="back_D_right">
                <img src="{{ asset('images/B.png') }}" class="back_B_right">
            </div> --}}
            <div class="container">
                <div class="container-header">
                    Применяемые материалы:
                </div>
                <div class="description">
                    <div class="description-left-column">
                        <div class="desciption-images">
                            @if (!empty($description->block_1_1_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_1_1_image_path) }}"
                                    alt="">
                            @endif
                            @if (!empty($description->block_1_2_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_1_2_image_path) }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="description-right-column">
                        {!! $description->block_1_0_text !!}
                    </div>
                </div>
                <div class="description description_alt">
                    <div class="description-left-column">
                        <div class="desciption-images desciption-images_alt">
                            <img class="last_img" src="{{ asset('media/' . $description->block_2_1_image_path) }}"
                                alt="">
                            <img class="last_img" src="{{ asset('media/' . $description->block_2_2_image_path) }}"
                                alt="">
                            <img class="last_img" src="{{ asset('media/' . $description->block_2_3_image_path) }}"
                                alt="">
                        </div>
                    </div>
                    <div class="description-right-column">
                        {!! $description->block_2_0_text !!}
                    </div>
                </div>
                <div class="description">
                    <div class="description-left-column">
                        <div class="desciption-images">
                            @if (!empty($description->block_3_1_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_3_1_image_path) }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="description-right-column">
                        {!! $description->block_3_0_text !!}
                    </div>
                </div>
                <div class="description description_alt">
                    <div class="description-left-column">
                        <div class="desciption-images desciption-images_alt">
                            @if (!empty($description->block_4_1_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_4_1_image_path) }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="description-right-column">
                        {!! $description->block_4_0_text !!}
                    </div>
                </div>
                <div class="description">
                    <div class="description-left-column">
                        <div class="desciption-images">
                            @if (!empty($description->block_5_1_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_5_1_image_path) }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="description-right-column">
                        {!! $description->block_5_0_text !!}
                    </div>
                </div>
                <div class="description description_alt">
                    <div class="description-left-column">
                        <div class="desciption-images desciption-images_alt">
                            @if (!empty($description->block_6_1_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_6_1_image_path) }}"
                                    alt="">
                            @endif
                            @if (!empty($description->block_6_2_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_6_2_image_path) }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="description-right-column">
                        {!! $description->block_6_0_text !!}
                    </div>
                </div>
                <div class="description">
                    <div class="description-left-column">
                        <div class="desciption-images">
                            @if (!empty($description->block_7_1_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_7_1_image_path) }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="description-right-column">
                        {!! $description->block_7_0_text !!}
                    </div>
                </div>
                <div class="description description_alt">
                    <div class="description-left-column">
                        <div class="desciption-images desciption-images_alt">
                            @if (!empty($description->block_8_1_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_8_1_image_path) }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="description-right-column">
                        {!! $description->block_8_0_text !!}
                    </div>
                </div>
                <div class="description">
                    <div class="description-left-column">
                        <div class="desciption-images">
                            @if (!empty($description->block_9_1_image_path))
                                <img class="last_img" src="{{ asset('media/' . $description->block_9_1_image_path) }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="description-right-column">
                        {!! $description->block_9_0_text !!}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container">
            <div class="first_block_header">
                <div class="first_block_text">
                    <div class="first_block_main_text first_block_main_text_alt">{!! $page->block_5_title !!}</div>
                </div>
            </div>
            <div class="first_block_main first_block_main_alt">
                {!! $page->block_5_text !!}
            </div>
        </div> --}}
        <div class="catalog" id="catalog">
            <div class="container">
                <div class="catalog_title">Каталог</div>
                @foreach ($items as $item)
                    <x-catalog-item class="single-item" :$item />
                @endforeach
                <div class="catalog_btn">
                    <button type="button" data-page="{{ empty(request()->page) ? 1 : request()->page }}"
                        class="catalog_button">Показать ещё</button>
                    <button type="button" class="catalog_button_hidden">Скрыть</button>
                </div>
            </div>
        </div>
        </div>
        <dialog class="success_modal" id="success_modal">
            <img class="modal_exit" src="{{ asset('images/krest.png') }}">
            <img class="modal_exit_white" src="{{ asset('images/krest_white.png') }}">
            <img class="success_modal_img" src="{{ asset('images/fi_711239.png') }}" alt="">
            <div class="success_modal_main_text">Спасибо что <span class="orange">оставили заявку!</span></div>
            <div class="success_modal_second_text">Менеджер скоро с вами свяжется!</div>
        </dialog>
        <div class="catalog_modal" id="catalog_modal">
            <img class="krest_white" src="{{ asset('images/krest.png') }}">
            <div class="container_modal">
                <img src="{{ asset('images/krest.png') }}" class="modal_close">
                <div class="img_modal_block">
                    <img class="img_modal" src="{{ asset('images/4a21ec8962982b014d70d4227480e9ba.png') }}">
                </div>
                <form class="form_modal">
                    <div class="background_modal"></div>
                    <div class="background_modal_img"></div>
                    <div class="form_modal_container">
                        <div class="form_modal_title">Оставить заявку</div>
                        <div class="form_modal_blocks">
                            <input type="tel" class="input_modal first" id="input_phone_modal"
                                placeholder="+7 800 999-99-99">
                            <input type="text" class="input_modal" placeholder="Комментарий">
                            <div class="submit_form" id="button_modal">Отправить</div>
                        </div>
                        <div class="form_moodal_text">Нажимая на кнопку “Отправить” вы даете согласие на обработку
                            персональных данных</div>
                    </div>
                </form>
            </div>
        </div>
        <div class="second_block" id="second">
            <div class="letters_second">
                <img src="{{ asset('images/D.png') }}" class="back_D_right">
                <img src="{{ asset('images/B.png') }}" class="back_B_right">
            </div>
            <div class="container">
                <div class="second_block_first">
                    <div class="second_first_left">
                        <img class="last_img" src="{{ asset('images/ddd18dfad45ba4d14c8599c170bfd104.png') }}"
                            alt="">
                    </div>
                    <div class="second_first_right">
                        <div class="second_first_right_title">{!! $page->block_3_title !!}</div>
                        <div class="economy">{{ $page->block_3_economy_title }}</div>
                        <div class="economy_price">{{ $page->block_3_economy_value }} <img
                                src="{{ asset('images/ruble.svg') }}"></div>
                        <div class="under_economy">{{ $page->block_3_subtitle }}</div>
                        <div class="second_block_text">
                            {!! $page->block_3_text !!}
                        </div>
                    </div>
                </div>
                <div class="second_block_first">
                    <div class="second_first_right">
                        <div class="second_first_right_title" style="margin-bottom: 20px;">
                            {!! $page->block_3_1_title !!}
                        </div>
                        <div class="under_economy">{{ $page->block_3_1_subtitle }}</div>
                        <div class="second_block_text">
                            {!! $page->block_3_1_text !!}
                        </div>
                    </div>
                    <div class="second_first_left">
                        <img class="last_img" src="{{ asset('images/942d99ed728e1ce712d474f8d3316254.png') }}"
                            style="margin-right: 0px;" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="third_block" id="third">
            <div class="container_mini">
                <div class="third_block_title">Дополнительные опции</div>
                <style>
                    .third_block_option_text {
                        b {
                            font-family: "Lato";
                            font-weight: 800;
                            font-size: 20px;
                            line-height: 26.2px;
                            letter-spacing: 0%;
                            color: rgb(0, 0, 0);
                        }
                    }
                </style>
                @foreach ($additionalOptions as $additionalOption)
                    <div class="third_block_option">
                        @if (!empty($additionalOption->image_path))
                            <img src="{{ asset('media/' . $additionalOption->image_path) }}"
                                class="third_block_option_img">
                        @endif
                        <div class="third_block_text">
                            <div class="third_block_option_text">
                                {!! $additionalOption->text !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="fourth_block" id="fourth">
            <div class="letters_third">
                <img src="{{ asset('images/D.png') }}" class="back_D">
                <img src="{{ asset('images/B.png') }}" class="back_B">
            </div>
            <div class="container_mini">
                <div class="fourth_block_text">
                    {!! $page->block_4_upper_text !!}
                </div>
                <div class="fourth_block_title">{!! $page->block_4_title !!}</div>
                <div class="fourth_block_text">
                    {!! $page->block_4_text !!}
                </div>
                <div class="fourth_block_photos">
                    <div class="cheap_block">
                        <img src="{{ asset('media/' . $page->block_4_image1_path) }}" class="fourth_block_photo">
                        <div class="cheap_block_text">{{ $page->block_4_image1_description }}</div>
                    </div>
                    <div class="our_block">
                        <img src="{{ asset('media/' . $page->block_4_image2_path) }}" class="fourth_block_photo">
                        <div class="our_block_text">{{ $page->block_4_image2_description }}</div>
                    </div>
                </div>
                <div class="fourth_block_text">
                    {!! $page->block_4_1_text !!}
                </div>
            </div>
            <div class="container" id="mes">
                <div class="fourth_block_title">Отзывы</div>
                <div class="videos">
                    <div class="slider multiple-reviews">
                        @foreach ($reviews as $review)
                            <div>
                                <img src="{{ asset('media/' . $review->image_path) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="fivth_block" id="fivth">
            <div class="container">
                <div class="fivth_block_header">
                    <div class="fivth_block_title">Как купить?</div>
                    <div class="fivth_block_header_banner">Есть рассрочка на 3,4 или 6 месяцев!</div>
                </div>
                <div class="fivth_block_main">
                    @foreach ($informations as $subInformation)
                        <div class="fivth_block_main_row">
                            @foreach ($subInformation as $information)
                                <div class="fivth_block_main_number">{{ $information->number }}
                                </div>
                                <div class="fivth_block_main_text">
                                    {!! $information->text !!}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="sixth_block" id="sixth">
            <div class="sixth_block_background"></div>
            <div class="container">
                <div class="sixth_block_main">
                    <div class="sixth_block_text"><span class="orange">Где мы находимся</span> и где можно посмотреть?
                    </div>
                    <div class="map"></div>
                </div>
                <div class="contacts">
                    <div class="contact">
                        <div class="contact_information">
                            <div class="contact_row">
                                <div class="sixth_contact_img_block"><img class="sixth_contact_img"
                                        src="{{ asset('images/Group2.png') }}"></div>
                                <a href="tel:{{ preg_replace('/[\s\(\)\-]/', '', $setting->phone) }}"
                                    class="contact_text">{{ $setting->phone }}</a>
                            </div>
                            <div class="contact_row">
                                <div class="sixth_contact_img_block"><img class="sixth_contact_img"
                                        src="{{ asset('images/Group 6.png') }}"></div>
                                <a href="mailto:{{ $setting->email }}" class="contact_text">{{ $setting->email }}</a>
                            </div>
                            <div class="contact_row">
                                <div class="sixth_contact_img_block"><img class="sixth_contact_img"
                                        src="{{ asset('images/address.png') }}"></div>
                                <div class="contact_text">{{ $setting->address }}</div>
                            </div>
                            <div class="contact_under_text" id="back">Если хотите приехать - договаривайтесь с
                                бригадиром о встрече, потому что бригады часто работают на выезде и цех бывает закрыт (номер
                                бригадира Вам скинет менеджер по WhatsApp).</div>
                        </div>
                    </div>
                    <div class="zayavka_form">
                        <div class="zayavka_title">Оставить заявку</div>
                        <form>
                            <input class="phone_number_input" type="tel" placeholder="+7 800 999-99-99"></br>
                            <input class="input_comment" placeholder="Комментарий"></br>
                            <div class="form_accept">Нажимая на кнопку “Отправить” вы даете согласие на обработку
                                персональных данных</div>
                            <button type="submit" class="button_form">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="block_seven" id="seven">
            <div class="container">
                <div class="seven_title">На что ставить хозблок?</div>
                @foreach ($variants as $variant)
                    <div class="seven_block_main">
                        <div class="seven_block_left">
                            <div class="seven_block_option">Вариант {{ $variant->number }}</div>
                            {!! $variant->text !!}
                        </div>
                        <div class="seven_block_right">
                            <img src="{{ asset('media/' . $variant->image_path) }}" class="seven_block_img">
                        </div>
                    </div>
                @endforeach
                <div class="our_works" id="our_works">
                    <div class="our_works_title">Наши работы</div>
                    <div class="videos" style="margin-top: 40px;">
                        <div class="slider multiple-items">
                            @foreach ($ourWorks as $ourWork)
                                <div>
                                    <img class="img_slide" src="{{ asset('media/' . $ourWork->image_path) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block_eight" id="eight">
            <img src="{{ asset('images/D.png') }}" class="back_D_ask">
            <img src="{{ asset('images/B.png') }}" class="back_B_ask">
            <div class="container_mini">
                <div class="block_eight_title">Часто задаваемые вопросы</div>
                <div class="block_eight_main">
                    @foreach ($qa as $_qa)
                        <div class="block_eight_element">
                            <div class="block_eight_element_header">
                                <div class="block_eight_text">{{ $_qa->question }}</div>
                                <a class="button_hidden_text first"><img src="{{ asset('images/Vector7.png') }}"
                                        class="block_eight_img"></a>
                                <a class="hidden_button_text first"><img src="{{ asset('images/Vector6.png') }}"
                                        class="block_eight_hidden_img"></a>
                            </div>
                            <div class="block_eight_hidden_text first">{{ $_qa->answer }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
