<?php
$mail = new MailController;
$emails = $mail->getMailInfo($_SESSION['mailId']);

echo "Username: {$_SESSION['id']} - Email: {$_SESSION['mailId']}" . PHP_EOL;
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
    <form action="auth?type=logout" method="POST">
        <input type="submit" value="logout" name="logout">
    </form>

    <form action="newmail" method="POST">
        <input type="submit" value="+" style="height: 25px; width: 25px;">
    </form>

    <div class="content">
        <div class="box">
            <form action="" method="GET">
                <input type="search" placeholder="Search...">
                <input type="submit" value="Search" name="search">
            </form>
            <table style="width: 100%;">
                <tr>
                    <th><a href="">Name</a></th>
                    <th><a href="">Unread</a></th>
                    <th><a href="">Date</a></th>
                </tr>
                <?php for ($i = 0; $i < count($emails); $i++) { ?>
                    <tr>
                        <td><?=$emails[$i]['sender']?></br><a href="viewmail?email=<?=$emails[$i]['emailid']?>" style="font-size: 30px;"><?= $emails[$i]['title'] ?></a></td>
                        <td><?= $isRead = $emails[$i]['read'] == 1 ? 'read' : 'unread' ?></td>
                        <td><?=$emails[$i]['date']?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>