<?php

echo '<h1 class="gallery__header">Images gallery</h1>';

echo '<div class="gallery__wrapper">';
echo '<form action="/favorite-image/save-to-favorites" method="POST" class="gallery__form">';

foreach ($images as $image) {
    $publicOrPrivate = $image->public ? 'public' : 'private';
    $thumbnailPath = "/images/uploads/thumbnails/{$image->getId()}.png";
    $isCheckedAsFavorite = in_array($image->getId(), $favorites) ? 'checked' : '';

    if ($user && $user->getLogin() == $image->author) {
        $imagePath = "/images/uploads/{$image->getId()}.{$image->extension}";
    } else {
        $imagePath = "/images/uploads/preview/{$image->getId()}.png";
    }

    echo '<div class="gallery__image-wrapper">';
    echo '<a href="' . $imagePath . '"><img src="' . $thumbnailPath . '"/></a>';

    echo '<div class="gallery__image-text">';
    echo '<p class="gallery__image-title">' . $image->title . ' [' . $publicOrPrivate . ']</p>';
    echo '<input type="checkbox" name="selected[]" value="' . $image->getId() . '"' . $isCheckedAsFavorite . '>';
    echo '</div>';

    echo "</div>";
}

if (count($images) !== 0) {
    echo '<input type="submit" value="Add selected photos to favorites" class="form__submit-button">';
} else {
    echo '<p class="gallery__no-images">There are no images in the gallery yet.</p>';
}

echo "</form>";
echo '</div>';