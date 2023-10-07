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
            else error();
        }
    }

    public function Register() {
        displayTemplate("website/register.html");
    }

    public function Login() {
        displayTemplate("website/login.html");
    }
}
