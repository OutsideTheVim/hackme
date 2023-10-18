<?php 

$setup = new SetupController;

$setup->RunSetup();

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

        .progress {
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="box">
            <div class="text">
                <div class="progress">
                    <h2>Creating flags...</h2>
                    <h3 style="color: green">Success</h3>
                </div>
                <div class="progress">
                    <h2>Setting up flags...</h2>
                    <h3 style="color: green">Success</h3>
                </div>
                <div class="progress">
                    <h2>Creating dummy email accounts...</h2>
                    <h3 style="color: green">Success</h3>
                </div>
                <div class="progress">
                    <h2>Updating contents.json...</h2>
                    <h3 style="color: green">Success</h3>
                </div>
            </div>
        </div>
    </div>
</body>

</html>