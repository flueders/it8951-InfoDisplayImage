<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome.min.css">
    <link rel="stylesheet" href="solid.min.css">

    <title>Info screen</title>
</head>

<body>
    <h1>
        <?= date($_ENV['DATE_FORMAT']) ?>
    </h1>

    <?php include(__DIR__ . "/weather.php") ?>

</body>

</html>