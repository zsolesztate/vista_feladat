<?php

class Contactscontroller extends Contacts {

    public function createContact($name, $tel, $address){
            $this->addContacts($name, $tel, $address);
    }

    public function removeContact($Id){
        $this->deleteContacts($Id);
    }

    public function editContact($Id,$edited_name, $edited_tel, $edited_address){
        $this->updateContact($Id,$edited_name, $edited_tel, $edited_address);
    }

}