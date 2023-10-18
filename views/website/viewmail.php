<?php
$mail = new MailController;
$email = $mail->getEmail($_GET['email']);
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
            width: 500px;
            height: 700px;

            background-color: rgb(124, 127, 135);
        }

        th {
            border: 3px solid black;
        }

        td {
            background-color: darkgrey;
            height: 50px;
        }
    </style>
</head>

<body>
    <form action="mail">
        <input type="submit" value="Back">
    </form>
    <div class="content">
        <div class="box">
            <p>Receiver: </br><?= $email->receiver ?></p>
            <p>Sender: </br><?= $email->sender ?></p>
            <p>Date: </br><?= $email->date ?></p>
            <h1>Title: <?= $email->title ?></h1>
            </br>
            <h2>Content: </h2><h4><?= $email->content ?></h4>
        </div>
    </div>
</body>

</html>