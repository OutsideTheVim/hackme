<?php

class MailController
{
    public function sendMail()
    {
        if (!isset($_POST['sendMail'])) error();

        $validEmail = false;

        foreach (GetJsonContent('users.json') as $emails) {
            if ($emails->email == $_POST['receiver']) {
                $validEmail = true;
            }
        }

        if (!$validEmail) {
            header('Location: ../site/newmail?err=Email not found');
            exit(0);
            return 0;
        }

        AddJsonContent("mail.json", [
            'sender' => $_SESSION['mailId'], 'receiver' => $_POST['receiver'], 'date' => 0, 'read' => 0,
            'title' => $_POST['title'], 'content' => $_POST['content']
        ]);

        header('Location: ../site/mail');
        exit(0);
    }

    public function getMail($receiver)
    {
        $emails = [];

        foreach (GetJsonContent("mail.json") as $email) {
            if ($email->receiver == $receiver) {
                $emails[] = [
                    'title' => $email->title, 'sender' => $email->sender,
                    'read' => $email->read, 'date' => $email->date
                ];
            }
        }

        return $emails;
    }
}
