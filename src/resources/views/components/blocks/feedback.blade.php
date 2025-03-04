<form class="modal__form feedback">
    <div class="modal-form__fields feedback__fields">
        <div class="feedback__columns">
            <input type="text" required name="name" class="feedback__text modal-form__text input__text"
                placeholder="Имя">
            <input type="text" required name="phone" class="feedback__text modal-form__text input__text"
                placeholder="Телефон">
            <input type="email" required name="email" class="feedback__text modal-form__text input__email"
                placeholder="Email">
        </div>
        <textarea placeholder="Укажите даты отдыха, страну, город и любые другие ваши пожелания" name="textarea"
            class="feedback__textarea modal-form__textarea input__textarea"></textarea>
    </div>
    <div class="modal__aggrees">
        <div class="modal-aggrees__description">
            <label for="law-aggree1">
                <input type="checkbox" id="law-aggree1">
                <span class="modal-aggrees__checkbox"></span>
            </label> <span class="modal-aggrees__text">Я соглашаюсь на обработку моих персональных данных в
                соответствии с требованиями Федерального закона РФ от 27 июля 2006 года № 152-ФЗ «О
                персональных данных»
            </span>
        </div>
        <button type="submit" class="feedback__button">Подберите мне тур</button>
    </div>
</form>
