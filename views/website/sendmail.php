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
                <?php if(isset($_GET['err'])) { ?>
                    <h2 style="color: darkred;">ERROR! <?=$_GET['err']?></h2>
                    <?php } ?>
                <h1>Send Mail!</h1>
                <form action="../mail/sendmail" method="POST">
                    <input type="text" placeholder="Receiver" name="receiver">
                    </br>
                    </br>
                    <input type="text" placeholder="title" name="title">
                    </br>
                    </br>
                    <input type="text" placeholder="content" name="content">
                    </br>
                    </br>
                    <input type="submit" value="Send" name="sendMail">
                </form>
            </div>
        </div>
    </div>
</body>

</html>