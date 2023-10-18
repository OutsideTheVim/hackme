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
                        setcookie("token", base64_encode(json_encode($userdata)), 2147483647); // later gebruiken voor pentesting challenges
                        $_SESSION['id'] = $userdata->username;
                        $_SESSION['mailId'] = $userdata->email;
                        header('Location: mail');
                    } else {
                        echo "Username or password wrong!";
                        exit(0);
                        break;
                    }
                }
            }
        }
    }

    protected function LogoutHandler() // moet nog gefixt worden
    {
        session_destroy();
        unset($_COOKIE['token']);
        setcookie('token', '', -1, '/');
        header('location: index');
        exit(0);
    }

    public function IsAuth()
    {
        if (!isset($_SESSION['id'])) {
            if (isset($_COOKIE['token'])) {
                foreach (GetJsonContent("users.json") as $userdata) {
                    if ($_COOKIE['token'] == base64_encode(json_encode($userdata))) {
                        $_SESSION['id'] = $userdata->username;
                        $_SESSION['mailId'] = $userdata->email;
                    }
                }
            } else error();
        } else return true;
    }
}
