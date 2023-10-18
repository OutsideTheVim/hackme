<?php

class RouteController
{
    public function redirect()
    {
        if (isset($_POST['substart'])) {
            header('Location: ../site/index');
        }
        if(isset($_POST['subadmin'])) {
            header('Location: ../admin');
        }
    }
}
