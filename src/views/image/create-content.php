<?php

$user = User::getCurrentUser();

?>

<div class="form__container">
    <form action="/image" method="POST" enctype="multipart/form-data" class="form">
        <div class="form__input_and_label_wrapper">
            <label for="author">
                Author:
            </label>

            <?php if ($user): ?>
                <input value="<?= $user->login ?>" type="text" name="author" disabled>
                <?php else: ?>
                <input type="text" name="author">
                <?php endif; ?>
        </div>

        <div class="form__input_and_label_wrapper">
            <label for="title">
                Title:
            </label>
            <br>
            <input type="text" name="title">
        </div>

        <div class="form__input_and_label_wrapper">
            <label for="watermark">
                Watermark:
            </label>
            <input type="text" name="watermark">
        </div>

        <br>

        <div class="form__input_and_label_wrapper">
            <label for="img">
                Image:
            </label>
            <input type="file" name="img">
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