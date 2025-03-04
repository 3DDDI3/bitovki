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
                    <div class="first_block_header">
                        <div class="first_block_text">
                            <div class="first_block_main_text">Серия<span style="color: #FE8934;">«Авангард. Гибкая
                                    черепица»</span></div>
                            <div class="first_block_under_text">Примеры выполненных работ с описанием задач, предложенных
                                решений и сроков реализации проекта</div>
                        </div>
                        <img src="{{ asset('images/Vector.png') }}" class="first_block_img">
                        <div class="first_block_btn">Удобное крыльцо</div>
                        <div class="line"></div>
                    </div>
                    <div class="first_block_main">
                        <div class="first_block_left">
                            <div class="first_block_left_element">
                                <div class="point"> </div>
                                <div class="first_block_left_text">Стеллажи глубиной 55см в 3 яруса бесплатно в комплекте.
                                </div>
                            </div>
                            <div class="first_block_left_element">
                                <div class="point"> </div>
                                <div class="first_block_left_text">Высота хозблока снаружи: 220см по низкой стороне, 240см
                                    по высокой стороне. Высота внутри: 200см по низкой стороне, 220см по высокой стороне.
                                    Эта высота удобна для пользования стеллажами без табуретки.</div>
                            </div>
                            <div class="first_block_left_element">
                                <div class="point"> </div>
                                <div class="first_block_left_text">Наружная обшивка стен из гибкой черепицы по основанию из
                                    ОСП либо обшивка из профлиста. Обе эти обшивки не надо будет перекрашивать через 7-10
                                    лет — поставил и забыл!</div>
                            </div>
                            <div class="first_block_left_element">
                                <div class="point"></div>
                                <div class="first_block_left_text">Используем только качественные краски "Акватекс Викинг" и
                                    террасное масло "Prostocolor" со сроком службы от 8 до 15 лет, что на сегодня
                                    долговечней европейских аналогов.</div>
                            </div>
                        </div>
                        <div class="first_block_right">
                            <div class="first_block_left_element">
                                <div class="point"></div>
                                <div class="first_block_left_text">Кровля из мягкой черепицы с гарантией производителя 20
                                    лет либо из профлиста.</div>
                            </div>
                            <div class="first_block_left_element">
                                <div class="point"></div>
                                <div class="first_block_left_text">Электрика: светильник снаружи и внутри, две розетки и
                                    выключатель. На розетки кабель с жилой 2,5кв.мм и на светильники 1,5кв.мм!</div>
                            </div>
                            <div class="first_block_left_element">
                                <div class="point"></div>
                                <div class="first_block_left_text">Хозблок не требует дорогостоящего фундамента, а ставится
                                    манипулятором на блоки или винтовые сваи.</div>
                            </div>
                            <div class="first_block_left_element">
                                <div class="point"></div>
                                <div class="first_block_left_text">Как неотапливаемое помещение выполнен без утепления для
                                    минимизации стоимости.</div>
                            </div>
                            <div class="first_block_left_element">
                                <div class="point"></div>
                                <div class="first_block_left_text">Используем только оцинкованный крепеж.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="catalog" id="catalog">
                <div class="container">
                    <div class="catalog_title">Каталог</div>
                    <div class="catalog_card">
                        <div class="content">
                            <div class="slider single-item">
                                <div>
                                    <img class="slider_img" id="noway"
                                        src="{{ asset('images/Бытовка Б-625ЖУ (фасад1).jpg') }}">
                                </div>
                                <div>
                                    <img class="slider_img" id="noway"
                                        src="{{ asset('images/Бытовка Б-625ЖУ (фасад2).jpg') }}">
                                </div>
                                <div>
                                    <img class="slider_img" id="noway"
                                        src="{{ asset('images/Бытовка Б-625ЖУ (фасад3).jpg') }}">
                                </div>
                                <div>
                                    <img class="slider_img" id="noway"
                                        src="{{ asset('images/Бытовка Б-625ЖУ (фасад4).jpg') }}">
                                </div>
                                <div>
                                    <img class="slider_img" id="noway"
                                        src="{{ asset('images/Бытовка Б-625ЖУ (план).jpg') }}">
                                </div>
                                <div>
                                    <img class="slider_img" id="noway"
                                        src="{{ asset('images/Бытовка Б-625ЖУ (пирог кровля).jpg') }}">
                                </div>
                                <div>
                                    <img class="slider_img" id="noway"
                                        src="{{ asset('images/Бытовка_Б_625ЖУ_пирог_наружняя_стена.jpg') }}">
                                </div>
                                <div>
                                    <img class="slider_img" id="noway"
                                        src="{{ asset('images/Бытовка_Б_625ЖУ_пирог_нижнее_перекрытие.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="card_info">
                            <div class="card_main_text">ХОЗБЛОК 2,2х3,0м</br> с обшивкой из профлиста</div>
                            <div class="card_description">(стеллажи в комплекте)</div>
                            <div class="card_spec">Характеристики:</div>
                            <div class="card_spec_text">
                                <div class="card_text">Площадь, м² 36</br> Площадь застройки, м² 48</div>
                                <div class="card_text">Площадь жилая, м² 11.18 Длина, м 6</div>
                            </div>
                            <div class="price">
                                <div class="old_price">399 990 <img src="{{ asset('images/grey_ruble.svg') }}"></div>
                                <div class="new_price">264 990 <img src="{{ asset('images/dark_ruble.svg') }}"></div>
                            </div>
                            <div class="card_footer">
                                <a href="#" id="card_about" class="card_about">
                                    <div class="card_button">Подробнее</div>
                                </a>
                                <div class="rassrok">46 975<img src="{{ asset('images/grey_ruble.svg') }}"> × 6 месяцев в
                                    рассрочку</div>
                            </div>
                        </div>
                    </div>
                    <div class="catalog_card">
                        <div class="content">
                            <div class="slider single-item">
                                <div>
                                    <img class="slider_img"
                                        src="{{ asset('images/58ea95f66f34b1d5598baf4b12690a9b.png') }}">
                                </div>
                                <div>
                                    <img class="slider_img"
                                        src="{{ asset('images/58ea95f66f34b1d5598baf4b12690a9b.png') }}">
                                </div>
                                <div>
                                    <img class="slider_img"
                                        src="{{ asset('images/58ea95f66f34b1d5598baf4b12690a9b.png') }}">
                                </div>
                            </div>
                        </div>
                        <div class="card_info">
                            <div class="card_main_text">ХОЗБЛОК 2,5х6,0м</br> с обшивкой из профлиста</div>
                            <div class="card_description">(стеллажи в комплекте)</div>
                            <div class="card_spec">Характеристики:</div>
                            <div class="card_spec_text">
                                <div class="card_text">Площадь, м² 36</br> Площадь застройки, м² 48</div>
                                <div class="card_text">Площадь жилая, м² 11.18 Длина, м 6</div>
                            </div>
                            <div class="price">
                                <div class="old_price">420 990 <img src="{{ asset('images/grey_ruble.svg') }}"></div>
                                <div class="new_price">279 990 <img src="{{ asset('images/dark_ruble.svg') }}"></div>
                            </div>
                            <div class="card_footer">
                                <a href="#" id="card_about" class="card_about">
                                    <div class="card_button">Подробнее</div>
                                </a>
                                <div class="rassrok">69 995<img src="{{ asset('images/grey_ruble.svg') }}"> × 6 месяцев
                                    в
                                    рассрочку
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="catalog_card">
                        <div class="content">
                            <div class="slider single-item">
                                <div>
                                    <img class="slider_img"
                                        src="{{ asset('images/76b1f73b48a32c9f577bf561756fdeac.png') }}">
                                </div>
                                <div>
                                    <img class="slider_img"
                                        src="{{ asset('images/76b1f73b48a32c9f577bf561756fdeac.png') }}">
                                </div>
                                <div>
                                    <img class="slider_img"
                                        src="{{ asset('images/76b1f73b48a32c9f577bf561756fdeac.png') }}">
                                </div>
                            </div>
                        </div>
                        <div class="card_info">
                            <div class="card_main_text">ХОЗБЛОК 2,5х6,0м</br> с дровником и обшивкой из профлиста</div>
                            <div class="card_description">(стеллажи в комплекте)</div>
                            <div class="card_spec">Характеристики:</div>
                            <div class="card_spec_text">
                                <div class="card_text">Площадь, м² 36</br> Площадь застройки, м² 48</div>
                                <div class="card_text">Площадь жилая, м² 11.18 Длина, м 6</div>
                            </div>
                            <div class="price">
                                <div class="old_price">890 990 <img src="{{ asset('images/grey_ruble.svg') }}"></div>
                                <div class="new_price">654 990 <img src="{{ asset('images/dark_ruble.svg') }}"></div>
                            </div>
                            <div class="card_footer">
                                <a href="#" id="card_about" class="card_about">
                                    <div class="card_button">Подробнее</div>
                                </a>
                                <div class="rassrok">80 990<img src="{{ asset('images/grey_ruble.svg') }}"> × 6 месяцев
                                    в
                                    рассрочку
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="catalog_card_hidden">
                        <div class="catalog_card">
                            <div class="content">
                                <div class="slider single-item">
                                    <div>
                                        <img class="slider_img" id="noway"
                                            src="{{ asset('images/4d88ab82a1e988a322e427a84d47e78d.png') }}">
                                    </div>
                                    <div>
                                        <img class="slider_img" id="noway"
                                            src="{{ asset('images/4d88ab82a1e988a322e427a84d47e78d.png') }}">
                                    </div>
                                    <div>
                                        <img class="slider_img" id="noway"
                                            src="{{ asset('images/4d88ab82a1e988a322e427a84d47e78d.png') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card_info">
                                <div class="card_main_text">ХОЗБЛОК 2,2х3,0м</br> с обшивкой из профлиста</div>
                                <div class="card_description">(стеллажи в комплекте)</div>
                                <div class="card_spec">Характеристики:</div>
                                <div class="card_spec_text">
                                    <div class="card_text">Площадь, м² 36</br> Площадь застройки, м² 48</div>
                                    <div class="card_text">Площадь жилая, м² 11.18 Длина, м 6</div>
                                </div>
                                <div class="price">
                                    <div class="old_price">399 990 <img src="{{ asset('images/grey_ruble.svg') }}">
                                    </div>
                                    <div class="new_price">264 990 <img src="{{ asset('images/dark_ruble.svg') }}">
                                    </div>
                                </div>
                                <div class="card_footer">
                                    <a href="#" id="card_about" class="card_about">
                                        <div class="card_button">Подробнее</div>
                                    </a>
                                    <div class="rassrok">46 975<img src="{{ asset('images/grey_ruble.svg') }}"> × 6
                                        месяцев в рассрочку
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="catalog_card">
                            <div class="content">
                                <div class="slider single-item">
                                    <div>
                                        <img class="slider_img"
                                            src="{{ asset('images/58ea95f66f34b1d5598baf4b12690a9b.png') }}">
                                    </div>
                                    <div>
                                        <img class="slider_img"
                                            src="{{ asset('images/58ea95f66f34b1d5598baf4b12690a9b.png') }}">
                                    </div>
                                    <div>
                                        <img class="slider_img"
                                            src="{{ asset('images/58ea95f66f34b1d5598baf4b12690a9b.png') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card_info">
                                <div class="card_main_text">ХОЗБЛОК 2,5х6,0м</br> с обшивкой из профлиста</div>
                                <div class="card_description">(стеллажи в комплекте)</div>
                                <div class="card_spec">Характеристики:</div>
                                <div class="card_spec_text">
                                    <div class="card_text">Площадь, м² 36</br> Площадь застройки, м² 48</div>
                                    <div class="card_text">Площадь жилая, м² 11.18 Длина, м 6</div>
                                </div>
                                <div class="price">
                                    <div class="old_price">420 990 <img src="{{ asset('images/grey_ruble.svg') }}">
                                    </div>
                                    <div class="new_price">279 990 <img src="{{ asset('images/dark_ruble.svg') }}">
                                    </div>
                                </div>
                                <div class="card_footer">
                                    <a href="#" id="card_about" class="card_about">
                                        <div class="card_button">Подробнее</div>
                                    </a>
                                    <div class="rassrok">69 995<img src="{{ asset('images/grey_ruble.svg') }}"> × 6
                                        месяцев в рассрочку
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="catalog_card">
                            <div class="content">
                                <div class="slider single-item">
                                    <div>
                                        <img class="slider_img"
                                            src="{{ asset('images/76b1f73b48a32c9f577bf561756fdeac.png') }}">
                                    </div>
                                    <div>
                                        <img class="slider_img"
                                            src="{{ asset('images/76b1f73b48a32c9f577bf561756fdeac.png') }}">
                                    </div>
                                    <div>
                                        <img class="slider_img"
                                            src="{{ asset('images/76b1f73b48a32c9f577bf561756fdeac.png') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card_info">
                                <div class="card_main_text">ХОЗБЛОК 2,5х6,0м</br> с дровником и обшивкой из профлиста</div>
                                <div class="card_description">(стеллажи в комплекте)</div>
                                <div class="card_spec">Характеристики:</div>
                                <div class="card_spec_text">
                                    <div class="card_text">Площадь, м² 36</br> Площадь застройки, м² 48</div>
                                    <div class="card_text">Площадь жилая, м² 11.18 Длина, м 6</div>
                                </div>
                                <div class="price">
                                    <div class="old_price">890 990 <img src="{{ asset('images/grey_ruble.svg') }}">
                                    </div>
                                    <div class="new_price">654 990 <img src="{{ asset('images/dark_ruble.svg') }}">
                                    </div>
                                </div>
                                <div class="card_footer">
                                    <a href="#" id="card_about" class="card_about">
                                        <div class="card_button">Подробнее</div>
                                    </a>
                                    <div class="rassrok">80 990<img src="{{ asset('images/grey_ruble.svg') }}"
                                            height="10px"> × 6
                                        месяцев в рассрочку</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="catalog_btn">
                        <button type="button" class="catalog_button">Показать ещё</button>
                        <button type="button" class="catalog_button_hidden">Скрыть</button>
                    </div>
                    <!-- <a style="text-decoration: none;" class="catalog_btn"><div >Показать ещё</div></a> -->
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
                        <div class="second_first_right_title">Стеллажи в комплекте</div>
                        <div class="economy">Экономия:</div>
                        <div class="economy_price">10 000 <img src="{{ asset('images/ruble.svg') }}"></div>
                        <div class="under_economy">Глубина полок - 55см и надежный каркас из бруска 50х50мм!</div>
                        <div class="second_block_text">У хозблоков других производителей нет в комплекте стеллажей,а если
                            покупать в хозблок отдельно стеллажи такой площади,то они обойдутся в 10 тыс.руб и более. Мы
                            экономим Вам эти деньги.</div>
                        <div class="second_block_text">В хозблоке сделаны длинные стеллажи глубиной 55см, в которых
                            вместятся все ваши вещи.</div>
                        <div class="second_block_text">По вашему желанию мы можем увеличить или уменьшить площадь
                            стеллажей, т.е. адаптировать под ваши потребности.</div>
                    </div>
                </div>
                <div class="second_block_first">
                    <div class="second_first_right">
                        <div class="second_first_right_title" style="margin-bottom: 20px;">Входная дверь каркаса —
                            <span>не массив</span>
                        </div>
                        <div class="under_economy">Не разбухает осенью и не рассыхается летом!</div>
                        <div class="second_block_text">Наша дверь не разбухает осенью и не рассыхается летом, имеет
                            стабильную форму, служит долго и надежно.</div>
                        <div class="second_block_text">Обычные деревянные двери из массива, которые ставят другие
                            производители хозблоков, осенью разбухают от влажности и перестают влазить в дверную коробку и
                            закрываться, а летом такие двери рассыхаются, и появляются трещины. </div>
                        <div class="second_block_text">Наши хозблоки закрываются на ключ — это важно, когда у вас в
                            хозблоке хранятся вещи, и вы уезжаете всей семьей в отпуск. Пластиковые и многие другие хозблоки
                            не закрываются на ключ либо требуют неудобного навесного замка, а наши — закрываются врезным
                            замком. </div>
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
                <div class="third_block_option">
                    <img src="{{ asset('images/9a56f565b22ce7228d7cae1e43f2acf6.png') }}" class="third_block_option_img">
                    <div class="third_block_text">
                        <div class="third_block_option_text"><span class="third_block_option_text_bold">Кронштейн для
                                хранения колес</span> можно складывать, когда он пустует. Кронштейн раздвижной на случай,
                            если у вас поменялись размеры колес.</div>
                        <div class="third_block_option_text">Установка одного кроштейна на ОСП-плите в хозблок стоит <span
                                class="third_block_option_text_bold"> 5800руб.</span></div>
                    </div>
                </div>
                <div class="third_block_option">
                    <img src="{{ asset('images/adc6f1eff39fba85965518a730728d8e.png') }}" class="third_block_option_img">
                    <div class="third_block_text">
                        <div class="third_block_option_text"><span class="third_block_option_text_bold">Настенный
                                держатель для инвентаря</span> прикручиваем на стойки каркаса. Длина держателей 118см, между
                            ними около 120см, вмещает до 12 единиц инвентаря/инструмента.</div>
                        <div class="third_block_option_text">Стоимость держателя с установкой <span
                                class="third_block_option_text_bold"> 2500руб.</span></br>Не забудьте сказать менеджеру на
                            какой стенке его надо повесить</div>
                    </div>
                </div>
                <div class="third_block_option">
                    <img src="{{ asset('images/3031a9441e006e77e754246e1f58acdf.png') }}" class="third_block_option_img">
                    <div class="third_block_text">
                        <div class="third_block_option_text"><span class="third_block_option_text_bold">Приставное крыльцо
                                или пандус</span> Пандус нужен, если в хозблок или террасу планируют закатывать что-то
                            тяжелое, например, газонокосилку, генератор на колесах или квадроцикл.</div>
                        <div class="third_block_option_text">Если же закатывать тяжелое в хозблок не планируется, то для
                            человека больше удобней приставное крыльцо, чем пандус. Стоимость крыльца и пандуса с установкой
                            в зависимости от ширины/длины и количества ступенек варьируется <span
                                class="third_block_option_text_bold"> от 4000 до 8000руб.</span></div>
                    </div>
                </div>
                <div class="third_block_option">
                    <img src="{{ asset('images/2441076de04ba5e6e802b9fededcedee.png') }}" class="third_block_option_img">
                    <div class="third_block_text">
                        <div class="third_block_option_text"><span class="third_block_option_text_bold">Металопластиковая
                                входная дверь со стеклопакетом</span> вместо деревянной двери Пластиковая дверь 2100х800мм
                            (ВхШ) изготовлена из пвх профиля REHAU BLITZ, с использованием оригинального уплотнения с
                            маркировкой REHAU, стеклопакет двухкамерный (3 стекла) глубиной 32 мм, фурнитура европейского
                            производителя. Ручка REHAU IDEA входит в комплект. Цвет снаружи графитовый, а внутри - белый.
                        </div>
                        <div class="third_block_option_text">Стоимость доп.опции <span
                                class="third_block_option_text_bold"> 58 800руб.</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fourth_block" id="fourth">
            <div class="letters_third">
                <img src="{{ asset('images/D.png') }}" class="back_D">
                <img src="{{ asset('images/B.png') }}" class="back_B">
            </div>
            <div class="container_mini">
                <div class="fourth_block_title">Дешевые <span class="orange">хозблоки</div>
                <div class="fourth_block_text">Дешёвые хозблоки, как правило, не имеют пола (ставятся прямо на землю) и не
                    имеют стеллажей в комплекте, их внешний вид тоже оставляет желать лучшего, а если сделать красивый
                    хозблок с полом и стеллажами, то итоговая цена уже будет недешёвой. Мы можем производить дешёвые
                    хозблоки, но радость от экономии за счет качества у вас будет недолгой, а разочарование таким дешёвым
                    хозблоком останется навсегда.</div>
                <div class="fourth_block_text">У вас не только дом должен быть красивым и удобным, но и хозблок и
                    внутренний двор с садом: всё на вашем участке должно быть гармоничным, красивым и удобным. Покупаете
                    хозблок Вы для себя и надолго, а значит он должен быть надежным, удобным, красивым и приносить радость!
                </div>
                <div class="fourth_block_photos">
                    <div class="cheap_block">
                        <img src="{{ asset('images/7ba1305d26b6b7fdf36ea03784deaf8f.png') }}" class="fourth_block_photo">
                        <div class="cheap_block_text">Дешевый хозблок</div>
                    </div>
                    <div class="our_block">
                        <img src="{{ asset('images/483f1f1daecf512ed4f5debee27600ab.png') }}" class="fourth_block_photo">
                        <div class="our_block_text">Наш блок</div>
                    </div>
                </div>
            </div>
            <div class="container" id="mes">
                <div class="fourth_block_title">Отзывы</div>
                <div class="videos">
                    <div class="slider multiple-items">
                        {{-- <div>
                            <iframe class="slider_video" src="https://www.youtube.com/embed/GLIHqvWoJ98">
                            </iframe>
                        </div>
                        <div>
                            <iframe class="slider_video" src="https://www.youtube.com/embed/GLIHqvWoJ98">
                            </iframe>
                        </div>
                        <div>
                            <iframe class="slider_video" src="https://www.youtube.com/embed/GLIHqvWoJ98">
                            </iframe>
                        </div>
                        <div>
                            <iframe class="slider_video" src="https://www.youtube.com/embed/GLIHqvWoJ98">
                            </iframe>
                        </div>
                        <div>
                            <iframe class="slider_video" src="https://www.youtube.com/embed/GLIHqvWoJ98">
                            </iframe>
                        </div>
                        <div>
                            <iframe class="slider_video" src="https://www.youtube.com/embed/GLIHqvWoJ98">
                            </iframe>
                        </div> --}}
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
                    <div class="fivth_block_main_row">
                        <div class="fivth_block_main_number" style="margin-left: 0px;">01</div>
                        <div class="fivth_block_main_text">Выберите модель хозблока и свяжитесь с нами удобным для вас
                            способом!
                            <div class="fivth_block_buttons">
                                <a href="#sixth" class="btn_link">
                                    <div class="fivth_block_button"
                                        style="background-color: rgba(254, 137, 52, 1);justify-content: center;">Оставить
                                        заявку</div>
                                </a>
                                <a href="#" class="btn_link">
                                    <div class="fivth_block_button"
                                        style="border: 1px solid rgba(254, 137, 52, 1); color:rgba(254, 137, 52, 1)"><img
                                            class="fivth_block_button_img"
                                            src="{{ asset('images/Group2.png') }}">Связаться по телефону
                                    </div>
                                </a>
                                <a href="#" class="btn_link">
                                    <div class="fivth_block_button"
                                        style="border: 1px solid rgba(76, 175, 80, 1); color:rgba(76, 175, 80, 1)"><img
                                            class="fivth_block_button_img"
                                            src="{{ asset('images/whatsapp-color-svgrepo-com 1.png') }}">Связаться по
                                        WhatsApp</div>
                                </a>
                            </div>
                            Менеджер сделает Вам расчёт стоимости с доставкой и установкой. Выезд замерщика платный, но в
                            большинстве случаев его выезд не требуется, так как менеджер по видео от вас посмотрит подъезд
                            для манипулятора и место установки, ответит на все ваши вопросы.
                        </div>
                        <div class="fivth_block_main_number">02</div>
                        <div class="fivth_block_main_text">Cоставим и пришлем вам договор на согласование, затем подпишем с
                            вами договор дистанционно с помощью СМС.</br></br>Не надо тратить время на поездку для
                            подписания договора</div>
                    </div>
                    <div class="fivth_block_main_row">
                        <div class="fivth_block_main_number" style="margin-left: 0px;">03</div>
                        <div class="fivth_block_main_text">В договоре поэтапная оплата 50% аванс на материалы и 50% после
                            установки хозблока на вашем участке.</br></br>Оплатить аванс можно картой, в том числе и
                            кредитной картой по QR-коду.</div>
                        <div class="fivth_block_main_number">04</div>
                        <div class="fivth_block_main_text">Cоставим и пришлем вам договор на согласование, затем подпишем с
                            вами договор дистанционно с помощью СМС.</br>Не надо тратить время на поездку для подписания
                            договора</div>
                    </div>
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
                                <div class="contact_text">+7 (495) 146-84-84</div>
                            </div>
                            <div class="contact_row">
                                <div class="sixth_contact_img_block"><img class="sixth_contact_img"
                                        src="{{ asset('images/Group 6.png') }}"></div>
                                <div class="contact_text">info@module.ru</div>
                            </div>
                            <div class="contact_row">
                                <div class="sixth_contact_img_block"><img class="sixth_contact_img"
                                        src="{{ asset('images/address.png') }}"></div>
                                <div class="contact_text">г. Москва, Хлебозаводский проезд д. 7, стр. 9</div>
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
                <div class="seven_block_main">
                    <div class="seven_block_left">
                        <div class="seven_block_option">Вариант 1</div>
                        <div class="seven_block_option_title">Бетонные блоки</div>
                        <div class="seven_block_option_description">Конечно же хозблоки не ставятся на землю, но и дорогой
                            фундамент для них т​​​​оже не нужен. На что устанавливают хозблоки?</div>
                        <div class="seven_block_option_text">Самый простой вариант установки - на вкопанные бетонные блоки
                            из отсева.</div>
                        <div class="seven_block_option_text">По углам и в середине мы вкапываем и выставляем в горизонте 6
                            бетонных блоков, на которые потом устанавливается ваш хозблок. Такое основание при необходимости
                            без проблем демонтируется и переносится вместе с хозблоком в другое место.</div>
                        <div class="seven_block_option_text">Такое основание незаглубленное, не доходит до плотных грунтов,
                            не проходит глубину промерзания грунта, поэтому гарантии на такое основание нет.</div>
                        <div class="seven_block_option_text_bold">Стоимость установки комплекта бетонных блоков = 6000руб.
                        </div>
                    </div>
                    <div class="seven_block_right">
                        <img src="{{ asset('images/5b39badd4ac6ff558626949640a66ea5.png') }}" class="seven_block_img">
                    </div>
                </div>
                <div class="seven_block_main">
                    <div class="seven_block_left">
                        <div class="seven_block_option">Вариант 2</div>
                        <div class="seven_block_option_title">Винтовые сваи</div>
                        <div class="seven_block_option_text">Винтовые сваи - более надежный фундамент, потому что винтовая
                            свая доходит до плотных грунтов и никогда не просядет</div>
                        <div class="seven_block_option_text">Также на винтовые сваи не действует морозное пучение, потому
                            что они проходят промерзающий слой и анкерятся ниже глубины промерзания.</div>
                        <div class="seven_block_option_text">На такой фундамент мы даем гарантию в договоре</div>
                        <div class="seven_block_option_text_bold">Стоимость одной сваи с оголовком и монтажом =
                            5750руб./шт.</br>Если свай будет 6шт., то стоимость свайного фундамента будет 34'500руб</div>
                    </div>
                    <div class="seven_block_right">
                        <img src="{{ asset('images/4fc27cf683ab9b91fb81a9f9293f4de5.png') }}" class="seven_block_img">
                    </div>
                </div>
                <div class="seven_block_main">
                    <div class="seven_block_left">
                        <div class="seven_block_option">Вариант 3</div>
                        <div class="seven_block_option_title">Подкладки из профтрубы</div>
                        <div class="seven_block_option_text">Если хозблок устанавливается на ровную брусчатку, то тогда нет
                            смысла вкапывать бетонные блоки или закручивать винтовые сваи.</br>Тогда мы просто прикрутим к
                            хозблоку окрашенные отрезки профтрубы 60х60мм, на которых он будет стоять.</div>
                        <div class="seven_block_option_text_bold">Стоимость комплекта опор из профтрубы - 4000руб.</div>
                    </div>
                    <div class="seven_block_right">
                        <img src="{{ asset('images/df2ee96965eae7b07688d94fabe7c004.png') }}" class="seven_block_img">
                    </div>
                </div>
                <div class="our_works" id="our_works">
                    <div class="our_works_title">Наши работы</div>
                    <div class="videos" style="margin-top: 40px;">
                        <div class="slider multiple-items">
                            <div>
                                <img class="img_slide" src="{{ asset('images/dc24b30d897e2844473fc9be14c2cb93.png') }}">
                            </div>
                            <div>
                                <img class="img_slide" src="{{ asset('images/f593b2169948621a4934cbd6acecc1a1.png') }}">
                            </div>
                            <div>
                                <img class="img_slide" src="{{ asset('images/dc24b30d897e2844473fc9be14c2cb93.png') }}">
                            </div>
                            <div>
                                <img class="img_slide" src="{{ asset('images/f593b2169948621a4934cbd6acecc1a1.png') }}">
                            </div>
                            <div>
                                <img class="img_slide" src="{{ asset('images/dc24b30d897e2844473fc9be14c2cb93.png') }}">
                            </div>
                            <div>
                                <img class="img_slide" src="{{ asset('images/f593b2169948621a4934cbd6acecc1a1.png') }}">
                            </div>
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
                    <div class="block_eight_element">
                        <div class="block_eight_element_header">
                            <div class="block_eight_text">Манипулятор ко мне не заедет. Можете ли собрать хозблок на
                                участке?</div>
                            <a class="button_hidden_text first"><img src="{{ asset('images/Vector7.png') }}"
                                    class="block_eight_img"></a>
                            <a class="hidden_button_text first"><img src="{{ asset('images/Vector6.png') }}"
                                    class="block_eight_hidden_img"></a>
                        </div>
                        <div class="block_eight_hidden_text first">Обычно клиент присылает видео, сняв подъезд с улицы,
                            провода и газовые трубы, и проход к месту установки - мы пересылаем видео водителю манипулятора
                            и он определяет заедет он или нет. Если есть сложности, то наш бригадир может приехать на замер
                            к вам на участок и уточнить всё на месте: есть вариант привезти готовый хозблок и закатить его
                            на рохлях, есть вариант собрать на месте из щитов или собрать полностью, но это зависит от
                            модели хозблока.</div>
                    </div>
                    <div class="block_eight_element">
                        <div class="block_eight_element_header">
                            <div class="block_eight_text">Мне нужен хозблок нестандартных размеров. Изготовите?</div>
                            <a class="button_hidden_text second"><img src="{{ asset('images/Vector7.png') }}"
                                    class="block_eight_img"></a>
                            <a class="hidden_button_text second"><img src="{{ asset('images/Vector6.png') }}"
                                    class="block_eight_hidden_img"></a>
                        </div>
                        <div class="block_eight_hidden_text second">Обычно клиент присылает видео, сняв подъезд с улицы,
                            провода и газовые трубы, и проход к месту установки - мы пересылаем видео водителю манипулятора
                            и он определяет заедет он или нет. Если есть сложности, то наш бригадир может приехать на замер
                            к вам на участок и уточнить всё на месте: есть вариант привезти готовый хозблок и закатить его
                            на рохлях, есть вариант собрать на месте из щитов или собрать полностью, но это зависит от
                            модели хозблока.</div>
                    </div>
                    <div class="block_eight_element">
                        <div class="block_eight_element_header">
                            <div class="block_eight_text">Почему ваши хозблоки дороже бытовок?</div>
                            <a class="button_hidden_text third"><img src="{{ asset('images/Vector7.png') }}"
                                    class="block_eight_img"></a>
                            <a class="hidden_button_text third"><img src="{{ asset('images/Vector6.png') }}"
                                    class="block_eight_hidden_img"></a>
                        </div>
                        <div class="block_eight_hidden_text third">Обычно клиент присылает видео, сняв подъезд с улицы,
                            провода и газовые трубы, и проход к месту установки - мы пересылаем видео водителю манипулятора
                            и он определяет заедет он или нет. Если есть сложности, то наш бригадир может приехать на замер
                            к вам на участок и уточнить всё на месте: есть вариант привезти готовый хозблок и закатить его
                            на рохлях, есть вариант собрать на месте из щитов или собрать полностью, но это зависит от
                            модели хозблока.</div>
                    </div>
                    <div class="block_eight_element">
                        <div class="block_eight_element_header">
                            <div class="block_eight_text">Сколько будет стоить доставка?</div>
                            <a class="button_hidden_text fourth"><img src="{{ asset('images/Vector7.png') }}"
                                    class="block_eight_img"></a>
                            <a class="hidden_button_text fourth"><img src="{{ asset('images/Vector6.png') }}"
                                    class="block_eight_hidden_img"></a>
                        </div>
                        <div class="block_eight_hidden_text fourth">Обычно клиент присылает видео, сняв подъезд с улицы,
                            провода и газовые трубы, и проход к месту установки - мы пересылаем видео водителю манипулятора
                            и он определяет заедет он или нет. Если есть сложности, то наш бригадир может приехать на замер
                            к вам на участок и уточнить всё на месте: есть вариант привезти готовый хозблок и закатить его
                            на рохлях, есть вариант собрать на месте из щитов или собрать полностью, но это зависит от
                            модели хозблока.</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
