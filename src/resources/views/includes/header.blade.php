<header>
    <div class="background_background"></div>
    <div class="header_background"></div>
    <div class="container_first">
        <div class="menu">
            <img src="{{ asset('images/Vector 2.png') }}">
            <div class="header_text">
                <div class="module_text">module</div>
                <div class="company_text">Строительная компания</div>
            </div>
            <!-- <div class="casual_menu"> -->
            <img class="contact_img" src="{{ asset('images/whatsapp-color-svgrepo-com 1.png') }}">
            <a class="phone_number" href="tel:{{ preg_replace('/[\s\(\)\-]/', '', $setting->phone) }}"
                style="text-decoration: none;">{{ $setting->phone }}</a>
            <div class="email" style="text-decoration: none;">{{ $page->email }}</div>
            <a href="#sixth" style="text-decoration: none;">
                <div class="header_button">Оставить заявку на консультацию</div>
            </a>
            <!-- </div> -->
            <div class="burger_menu">
                <img class="burger_menu_show" src="{{ asset('images/Vector_menu.png') }}">
                <img class="burger_menu_hidden" src="{{ asset('images/Vector_x.png') }}" alt="">
            </div>
        </div>
        <div class="header_main">
            <ul class="burger_menu_list">
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#catalog">Каталог</a></li>
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#first">Серия «Авангард. Гибкая черепица»</a></li>
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#third">Дополнительные опции</a></li>
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#fourth">Дешёвые хозблоки</a></li>
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#mes">Отзывы</a></li>
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#fivth">Как купить?</a></li>
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#sixth">Где мы находимся</br>и где можно посмотреть?</a></li>
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#seven">На что ставить хозблок?</a></li>
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#our_works">Наши работы</a></li>
                <li class="burger_menu_li"><a class="burger_link" style="text-decoration: none; color: inherit;"
                        href="#eight">Часто задаваемые вопросы</a></li>
                <div class="burger_contacts">
                    <div class="burger_contacts_content">
                        <div class="burger_contacts_row">
                            <img src="{{ asset('images/Group2.png') }}" style="width: 18px;height: 18px;"
                                class="burger_contacts_img">
                            <a href="tel:{{ preg_replace('/[\s\(\)\-]/', '', $setting->phone) }}"
                                class="burger_contacts_text">{{ $setting->phone }}
                            </a>
                        </div>
                        <div class="burger_contacts_row">
                            <img src="{{ asset('images/whatsapp-color-svgrepo-com 1.png') }}"
                                style="width: 22;height: 22px;" class="burger_contacts_img">
                            <a href="tel:{{ preg_replace('/[\s\(\)\-]/', '', $setting->phone) }}"
                                class="burger_contacts_text">{{ $setting->phone }}</a>
                        </div>
                        <div class="burger_contacts_row"><img src="{{ asset('images/Group 6.png') }}"
                                style="width: 20px;height: 14px;" class="burger_contacts_img">
                            <div class="burger_contacts_text">info@module.ru</div>
                        </div>
                        <div class="burger_contacts_row"><img src="{{ asset('images/address.png') }}"
                                style="width: 14px;height: 20px;" class="burger_contacts_img">
                            <div class="burger_contacts_text">{{ $setting->address }}</div>
                        </div>
                        <div class="burger_contacts_description">Если хотите приехать - договаривайтесь с бригадиром о
                            встрече, потому что бригады часто работают на выезде и цех бывает закрыт (номер бригадира
                            Вам скинет менеджер по WhatsApp).</div>
                    </div>
                </div>
                <div class="burger_map"></div>
                <div class="burger_text">Индивидуальный предприниматель</br>ИНН 464575677565</br>ОГРН 475879098080</div>
                <div class="burger_button">Оставить заявку на консультацию</div>
                <div class="burger_footer">
                    <div class="burger_footer_text">ООО "DB MODULE" 2025 ©</div>
                    <div class="burger_footer_text">Все права защищены</div>
                    <div class="burger_footer_text">Политика конфиденциальности</div>
                    <div class="burger_footer_text">Разработка от<span class="orange"> VisualTeam</span></div>
                </div>
            </ul>
            <div class="left_block">
                <div class="main_text">{{ $page->block_1_title }}</div>
                <div class="under_text">{{ $page->block_1_subtitle }}</div>
                <div class="price_text">{{ $page->block_1_price_title }}</div>
                <div class="price_form">{{ number_format($page->block_1_price_value, 0, '', ' ') }} <img
                        src="{{ asset('images/ruble.svg') }}" class="ruble">
                </div>
                <div class="under_price">
                    <div class="star">*</div>
                    <div class="right_star">{{ $page->block_1_price_subtitle }}</div>
                </div>
                <form>
                    <div class="form">
                        <div class="circle"></div>
                        <div class="form_input">
                            <input type="tel" class="phone_number_input" placeholder="+7 800 999-99-99"></br>
                            <input class="input_comment" placeholder="Комментарий"></br>
                            <div class="form_accept">Нажимая на кнопку “Отправить” вы даете согласие на обработку
                                персональных данных</div>
                            <button type="submit" class="button_form">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="right_block">
                <div class="right_block_img" @style(["background-image: url(/media/$page->block_1_image_path)"])></div>
                <div class="advantages">
                    <div class="advantages_elements">
                        @foreach ($infographics as $infographic)
                            <div class="advantages_element">
                                <img src="{{ asset('media/' . $infographic->image_path) }}"
                                    class="advantages_element_img">
                                <div class="advantages_element_text">{{ $infographic->title }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</header>
