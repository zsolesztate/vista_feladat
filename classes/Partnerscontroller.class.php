<?php

class Partnerscontroller extends Partners {

    public function createPartner($partner_name,$partner_address,$contactId){
            $this->addPartner($partner_name,$partner_address,$contactId);
    }

    public function editPartner($Id,$edited_name, $edited_address, $edited_contact){
        $this->updatePartner($Id,$edited_name, $edited_address, $edited_contact);
    }

    public function removePartner($Id){
        $this->deletePartner($Id);
    }
    
}