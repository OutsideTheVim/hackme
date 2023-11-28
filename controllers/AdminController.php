<?php

class AdminController extends SetupController
{
    public function show()
    {
        $setupStatus = GetJsonContent("flags.json");
        if (empty($setupStatus)) {
            $this->Setup();
        } else {
            displayTemplate('admin/dashboard.php');
        }
    }
}
