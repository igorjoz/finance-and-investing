<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Posts list</title>
</head>

<body>
    <h1>
        Posts list
    </h1>

    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <h2>
                    <?= $post->title ?>
                </h2>

                <p>
                    <?= $post->contents ?>
                </p>
            </li>
            <?php endforeach; ?>
    </ul>
</body>

</html>