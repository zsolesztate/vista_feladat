<?php

class Emailscontroller extends Emails {

    public function createContactEmail($contactId, $contactEmail){
        $result = $this->addContactEmail($contactId, $contactEmail);
        //az email ellenőrzés miatt kell visszatérési érték
        return $result;
    }

    public function removeEmail($Email){
        $result = $this->deleteEmail($Email);
    }

    public function editContactEmail($editedEmail,$oldEmail){
        $result = $this->updateContactEmail($editedEmail,$oldEmail);
        //az email ellenőrzés miatt kell visszatérési érték
        return $result;
    }

}