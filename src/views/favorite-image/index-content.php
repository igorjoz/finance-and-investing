<h1 class="gallery__header">
    Favorite images gallery
</h1>

<div class="gallery__wrapper">
<form action="/favorite-image/remove-from-favorites" method="POST" class="gallery__form">

<?php if ($images and $images[0] !== NULL) : ?>

    <?php  foreach ($images as $image) : ?>
        <?php
        $publicOrPrivate = $image->public ? 'public' : 'private';
        $thumbnailPath = "/images/uploads/thumbnails/{$image->getId()}.png";
        $isCheckedAsFavorite = in_array($image->getId(), $favorites) ? 'checked' : '';

        if ($user and $user->getLogin() == $image->author) {
            $imagePath = "/images/uploads/{$image->getId()}.{$image->extension}";
        } else {
            $imagePath = "/images/uploads/preview/{$image->getId()}.png";
        }
        ?>

        <div class="gallery__image-wrapper">
            <a href="<?= $imagePath ?>">
                <img src="<?= $thumbnailPath ?>"/>
            </a>

            <div class="gallery__image-text">
                <p class="gallery__image-title">
                    <?= $image->title . ' [' . $publicOrPrivate . ']' ?>
                </p>
                <input type="checkbox" name="selected[]" value="<?= $image->getId() ?>" <?= $isCheckedAsFavorite ?> class="gallery__favorite-image-input">   
            </div>
        </div>
    <?php endforeach ; ?>

<?php else : ?>

<?php endif ; ?>


    
<?php if ($images and $images[0] !== NULL) : ?>
    <input type="submit" value="Remove selected photos from favorites" class="form__submit-button gallery__submit-button">
<?php else : ?>
    <p class="gallery__no-images">There are no images in the favorite images gallery yet.</p>
<?php endif ; ?>

</form>

    <div class="gallery__pagination">

    <?php
    if ($page > 1) {
        echo "<a href=\"?page={$prev}\" class=\"gallery__pagination-link\">Previous page</a>";
        if ($page * $limit < $total) {
            echo "<a href=\"?page={$next}\" class=\"gallery__pagination-link\">Next page</a>";
        }
    } else if ($page * $limit < $total){
        echo "<a href=\"?page={$next}\" class=\"gallery__pagination-link\">Next page</a>";
    } else {
        echo '<p>That\'s the only page</p>';
    }
    ?>

    </div>

</div>




<?php

// $user = User::getCurrentUser();
// $favorites = isset($_SESSION['favorite']) ? $_SESSION['favorite'] : [];

// echo '<h1 class="gallery__header">Images gallery</h1>';

// echo '<div class="gallery__wrapper">';
// echo '<form action="/favorite-image/remove-from-favorites" method="POST" class="gallery__form">';

// foreach ($images as $image) {
//     $publicOrPrivate = $image->public ? 'public' : 'private';
//     $thumbnailPath = "/images/uploads/thumbnails/{$image->getId()}.png";
//     $isCheckedAsFavorite = in_array($image->getId(), $favorites) ? 'checked' : '';

//     if ($user && $user->getLogin() == $image->author) {
//         $imagePath = "/images/uploads/{$image->getId()}.{$image->extension}";
//     } else {
//         $imagePath = "/images/uploads/preview/{$image->getId()}.png";
//     }

//     echo '<div class="gallery__image-wrapper">';
//     echo '<a href="' . $imagePath . '"><img src="' . $thumbnailPath . '"/></a>';

//     echo '<div class="gallery__image-text">';
//     echo '<p class="gallery__image-title">' . $image->title . ' [' . $publicOrPrivate . ']</p>';
//     echo '<input type="checkbox" name="selected[]" value="' . $image->getId() . '"' . $isCheckedAsFavorite . '>';
//     echo '</div>';

//     echo "</div>";
// }

// if (count($images) !== 0) {
//     echo '<input type="submit" value="Remove selected photos from favorites" class="form__submit-button">';
// } else {
//     echo '<p class="gallery__no-images">There are no images in the favorite images gallery yet.</p>';
// }

// echo "</form>";
// echo '</div>';