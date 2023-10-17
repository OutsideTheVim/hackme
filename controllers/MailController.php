<?php

class MailController
{
    public function getMail($receiver)
    {

        $emails = [];

        foreach (GetJsonContent("mail.json") as $email) {
            if ($email->receiver == $receiver) {
                $emails[] = $email->title;
            }
        }

        return $emails;
    }
}
