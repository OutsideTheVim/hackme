<?php

class AuthController
{
    protected function RegisterHandler()
    {
        if (isset($_POST['reg'])) {
            foreach (GetJsonContent("users.json") as $userdata) {
                if ($_POST['email'] == $userdata->email || $_POST['usern'] == $userdata->username) {
                    echo "email of username bestaat al!";
                    exit(0);
                    break;
                }
            }
            $email = $_POST['email'];
            $usern = $_POST['usern'];
            $passw = $_POST['passw'];

            AddJsonContent("users.json", ['email' => $email, 'username' => $usern, 'password' => password_hash($passw, PASSWORD_BCRYPT)]);

            header('Location: login');
        } else {
            error();
        }
    }

    protected function LoginHandler()
    {
        if (isset($_POST['login'])) {
            $inpusern = $_POST['usern'];
            $inppassw = $_POST['passw'];

            foreach (GetJsonContent("users.json") as $userdata) {
                if ($inpusern == $userdata->username) {
                    if (password_verify($inppassw, $userdata->password)) {
                        header("Location: success");
                    } else {
                        echo "Username or password wrong!";
                        exit(0);
                        break;
                    }
                }
            }
        }
    }
}
