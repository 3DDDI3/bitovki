<div class="_popup hidden" id="apf">
    <div class="_popup__content">
        <form class="form application-form" method="POST">
            @csrf
            <div class="_close" for="apf"></div>
            <div class="form__title">Leave a request</div>
            <p>
                If you have any questions, we are always ready <br />
                to help you with advice and choice
            </p>
            <input class="form-input" type="text" name="name" placeholder="Your name" />
            <input class="form-input" type="text" name="phone" placeholder="Phone number" />
            <!-- <textarea class="form-text-area" name="message" rows="7" placeholder="Message"></textarea> -->
            <div class="politic">
                <input type="checkbox" class="checkbox" id="cb1" name="" value="yes" required />
                <label for="cb1" class="politic-text">
                    <p>Consent to personal data processing</p>
                </label>
            </div>
            <button class="btn">Contact us</button>
        </form>
    </div>
</div>
