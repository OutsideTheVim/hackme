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
                <h1>Mail Client!</h1>
                <form action="" method="POST">
                    <input type="submit" value="Login" name="maillogin">
                    <input type="submit" value="Register" name="mailreg">
                </form>
            </div>
        </div>
    </div>
    <?php 
    
        if(isset($_POST['maillogin'])) {
            header('Location: login');
        }

        if(isset($_POST['mailreg'])) {
            header('Location: register');
        }

    ?>
</body>

</html>