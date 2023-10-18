<?php

class SetupController
{

    private function CreateFlags()
    {
        try {
            AddJsonContent("contents.json", ["flags" => ["flag1", "flag2", "flag3"]]); // later random worden gemaakt
        } catch (Exception $e) {
            echo $e->getMessage();
            return "failed";
        }

        return true;
    }

    private function setupFlags()
    { // flags op de juiste plek neerzetten

    }

    private function CreateDummys()
    {

        $email = "testdummy@testemail.com";
        $usern = "dummy";
        $passw = "dummytest";

        try {
            AddJsonContent("users.json", ['email' => $email, 'username' => $usern, 'password' => password_hash($passw, PASSWORD_BCRYPT)]);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }

        return true;
    }

    public function RunSetup() // returnt naam van opdr8 zodat ik later kan zien welke ik error message moet geven, als het nodig is
    {
        if (!$this->CreateFlags()) {
            return "flag";
        }
        /*if(!this->setupFlags) {
            return "sflag";
        }*/
        if (!$this->CreateDummys()) {
            return "dummy";
        }

        try {
            AddJsonContent("contents.json", ["setup" => 1]);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    protected function Setup()
    {
        displayTemplate("setup.php");
    }


    public function show()
    {
        displayTemplate("introduction.html");
    }
}
