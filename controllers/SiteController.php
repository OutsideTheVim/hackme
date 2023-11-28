<?php

class SiteController extends AuthController
{
    public function index()
    {
        displayTemplate("website/site.php");
    }

    public function Auth()
    {
        if (!isset($_GET['type'])) {
            error();
        } else {
            if ($_GET['type'] == "login") $this->LoginHandler();
            elseif ($_GET['type'] == "register") $this->RegisterHandler();
            elseif ($_GET['type'] == "logout") $this->LogoutHandler();
            else error();
        }
    }

    public function Register()
    {
        displayTemplate("website/register.html");
    }

    public function Login()
    {
        if (isset($_SESSION['id'])) {
            header('Location: mail');
        }
        displayTemplate("website/login.html");
    }

    public function Mail()
    {
        $this->IsAuth();
        $_COOKIE['flag'] = "[TEST]_" . rand(111111, 999999999);
        displayTemplate('website/mail.php');
    }

    public function NewMail()
    {
        $this->IsAuth();
        displayTemplate('website/sendmail.php');
    }

    public function ViewMail()
    {
        $this->IsAuth();
        if (!isset($_GET['email'])) error();

        foreach (GetJsonContent('mail.json') as $emails) {
            if ($emails->emailid == $_GET['email']) {
                if ($emails->receiver !== $_SESSION['mailId']) {
                    error();
                }
            }
        }

        displayTemplate('website/viewmail.php');
    }
}
