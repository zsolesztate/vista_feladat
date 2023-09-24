<?php

class Partnersview extends Partners {

    public function showPartners(){
        $results = $this->allPartners();
        return $results;

    }

    public function showSelectedPartner($Id){
        $results = $this->selectedPartner($Id);
        return $results;

    }


    public function showContactsWithPartners(){
        $results = $this->joinedPartner();
        return $results;

    }



}