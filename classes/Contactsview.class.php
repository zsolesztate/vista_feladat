<?php

class Contactsview extends Contacts {

    public function showContacts(){
        $results = $this->allContacts();
        return $results;

    }

    public function showSelectedContact($Id){
        $results = $this->selectedContact($Id);
        return $results;

    }

}