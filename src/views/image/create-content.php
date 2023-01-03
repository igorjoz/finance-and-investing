<div class="form__container">
    <form action="/image" method="POST" enctype="multipart/form-data" class="form">

        <?php if (User::isLoggedIn()): ?>
            <input value="<?= User::getLogin() ?>" type="text" name="author" hidden>
            <?php else: ?>
            <div class="form__input_and_label_wrapper">
                <label for="author">
                    Author nickname:
                </label>
                <input type="text" name="author">
            </div>
            <?php endif; ?>

        <div class="form__input_and_label_wrapper">
            <label for="title">
                Photo title:
            </label>
            <br>
            <input type="text" name="title">
        </div>

        <div class="form__input_and_label_wrapper">
            <label for="watermark_text">
                Watermark text:
            </label>
            <input type="text" name="watermark_text">
        </div>

        <br>

        <div class="form__input_and_label_wrapper">
            <label for="image">
                Image:
            </label>
            <input type="file" name="image">
        </div>

        <br>

        <?php if ($user): ?>
            Access to the image:
            <br>

            <div class="form__input_and_label_wrapper">
                <label>
                    Public:
                </label>
                <input type="radio" name="access" value="public" checked>
            </div>

            <div class="form__input_and_label_wrapper">
                <label>
                    Private:
                </label>
                <input type="radio" name="access" value="private">
            </div>
            <?php endif; ?>

        <input type="submit" value="Add image" class="form__submit-button">
    </form>
</div>