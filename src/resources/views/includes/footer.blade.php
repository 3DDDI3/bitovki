<footer>
    <div class="container">
        <div class="footer_header">
            <div class="footer_logo">
                <img src="{{ asset('images/Vector 2.png') }}" class="footer_logo_img" alt="">
                <div class="footer_text">
                    <div class="module_text">module</div>
                    <div class="company_text">Строительная компания</div>
                </div>
            </div>
            <div class="IP">Индивидуальный предприниматель</br> ИНН
                {{ $setting->inn }} <span class="span_footer">ОГРН {{ $setting->ogrn }}</span></div>
            <div class="footer_contacts">
                <div class="phone">
                    <img src="{{ asset('images/whatsapp-color-svgrepo-com 1.png') }}" class="phone_img">
                    <a href="tel:{{ preg_replace('/[\s\(\)\-]/', '', $setting->phone) }}"
                        class="phone_number_footer">{{ $setting->phone }}</a>
                </div>
                <a href="mailto:{{ $setting->email }}" class="footer_email">{{ $setting->email }}</a>
            </div>
            <div class="footer_buttons">
                <a href="#sixth">
                    <div class="footer_button">Оставить заявку на консультацию</div>
                </a>
                <a href="#sixth">
                    <div class="footer_button">Где мы находимся</div>
                </a>
            </div>
            <a href="#sixth">
                <div class="header_button" style="margin-top: 6px;">Оставить заявку на консультацию
                </div>
            </a>
            <div class="footer_line"></div>
        </div>
        <div class="footer">
            <div class="company_name">ООО "DB MODULE" {{ \Carbon\Carbon::now()->format('Y') }} ©
            </div>
            <div class="copyright">Все права защищены</div>
            <div class="politic">Политика конфиденциальности</div>
            <div class="VT">Разработка от<a href="https://visualteam.ru" class="orange"> VisualTeam</a></div>
        </div>
    </div>
</footer>
