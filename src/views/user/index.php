<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users list</title>
</head>

<body>
    <h1>
        Users list
    </h1>

    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <h2>
                    <?= $user->name ?>
                </h2>
            </li>
            <?php endforeach; ?>
    </ul>
</body>

</html>