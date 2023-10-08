<?php

$username = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: rgb(77, 98, 98);
        }

        .content {
            display: flex;
            justify-content: center;
        }

        .box {
            margin-top: 75px;
            width: 600px;
            height: 400px;

            background-color: rgb(124, 127, 135);
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="box">
            <div class="text">
                <h1>Welkom!</h1>
                <h2><?= $username ?></h2>
            </div>
        </div>
    </div>
</body>

</html>