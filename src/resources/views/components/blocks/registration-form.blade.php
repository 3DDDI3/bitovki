<form class="modal__form registration">
    <div class="modal-form__fields registration__fields">
        <input type="text" name="company" class="registration__text modal-form__text input__text"
            placeholder="Название компании">
        <input type="text" name="address" class="registration__text modal-form__text input__text"
            placeholder="Адрес офиса">
        <div class="registration__columns">
            <input type="email" name="email" autocomplete="off"
                class="registration__email model-form__email input__email" placeholder="E-mail">
            <input type="text" name="login" autocomplete="off"
                class="registration__text model-form__text input__text" placeholder="Логин">
        </div>
        <div class="registration__columns">
            <input type="phone" name="phone" class="registration__text model-form__text input__phone"
                placeholder="Телефон">
            <input type="password" autocomplete="off" name="password"
                class="registration__text model-form__password input__password" placeholder="Пароль">
        </div>
    </div>
    <div class="modal__aggrees">
        <label for="law-aggree">
            <input type="checkbox" id="law-aggree">
            <span class="modal-aggrees__checkbox"></span>
        </label> <span class="modal-aggrees__text">Я соглашаюсь на обработку моих персональных данных в
            соответствии с требованиями Федерального закона РФ от 27 июля 2006 года № 152-ФЗ «О
            персональных данных»
        </span>
    </div>
    <div class="modal__buttons registration__buttons">
        <button class="registration__register-button">Зарегистрироваться</button>
        <button class="registration__login-button"> <span>Войти</span> </button>
    </div>
</form>
