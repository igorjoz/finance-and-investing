<div class="form__container">
    <form action="/user" method="POST" class="form">
        <div class="form__input_and_label_wrapper">
            <label for="login">
                Login:
            </label>
            <input type="text" name="login">
        </div>

        <div class="form__input_and_label_wrapper">
            <label for="email">
                Email:
            </label>
            <input type="email" name="email">
        </div>

        <div class="form__input_and_label_wrapper">
            <label for="password">
                Password:
            </label>
            <input type="password" name="password">
        </div>

        <div class="form__input_and_label_wrapper">
            <label for="repeated_password">
                Repeat password:
            </label>
            <input type="password" name="repeated_password">
        </div>

        <input type="submit" value="Register" class="form__submit-button">
    </form>
</div>