<?php

class AdminController extends SetupController
{
    public function show()
    {
        $setupStatus = GetJsonContent("contents.json");
        if ($setupStatus[0]->setup == 0) {
            $this->Setup();
        } else {
            displayTemplate('admin/dashboard.php');
        }
    }
}
