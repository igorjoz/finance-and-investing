<?php

echo '<h1>Images gallery</h1>';

echo '<div class="gallery__wrapper">';
echo '<form action="/images/favorite" method="POST">';

foreach ($images as $image) {
    $isPrivate = $image->public ? 'public' : 'private';
    $thumbPath = "/images/uploads/thumbnails/{$image->getId()}.png";

    if ($user && $user->getLogin() == $image->author) {
        $imagePath = "/images/uploads/{$image->getId()}.{$image->extension}";
    } else {
        $imagePath = "/images/uploads/preview/{$image->getId()}.png";
    }

    echo '<div class="gallery__image">';
    echo '<a href="' . $imagePath . '"><img src="' . $thumbPath . '"></a>';
    echo '<p class="caption">' . $image->title . ' [' . $isPrivate . ']</p>';

    $checked = in_array($image->getId(), $favorites) ? 'checked' : '';

    echo '<input type="checkbox" name="selected[]" value="' . $image->getId() . '"' . $checked . '>';
    echo "</div>";
}

echo '<input type="submit" value="Add selected photos to favorites" class="form__submit-button">';
echo "</form>";
echo '</div>';