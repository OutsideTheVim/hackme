<?php

class AuthController
{
    protected function RegisterHandler() // nog fixxen: check of email/username al bestaat
    {
        if (isset($_POST['reg'])) {
            $email = $_POST['email'];
            $usern = $_POST['usern'];
            $passw = $_POST['passw'];

            AddJsonContent("users.json", ['email' => $email, 'username' => $usern, 'password' => $passw]);

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
                    if ($inppassw == $userdata->password) {
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