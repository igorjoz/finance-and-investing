<?php

$user = User::getCurrentUser();
$favorites = isset($_SESSION['favorite']) ? $_SESSION['favorite'] : [];

echo '<form action="/images/unfavorite" method="POST">';
foreach ($images as $image) {
    $private = $image->public ? '' : '[P] ';
    $thumbPath = "/thumb/{$image->id()}.png";
    $imagePath = ($user && $user->name == $image->author)
        ? "/images/{$image->id()}.png"
        : "/preview/{$image->id()}.png";
    echo "<div class=\"image\">";
    echo "<a href=\"{$imagePath}\"><img src=\"{$thumbPath}\"></a>";
    echo "<p class=\"caption\">{$private}{$image->title}</p>";
    echo "<input type=\"checkbox\" name=\"selected[]\"value=\"{$image->id()}\">";
    echo "</div>";
}
echo '<input type="submit" value="Remove">';
echo "</form>";