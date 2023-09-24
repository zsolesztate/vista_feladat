<?php

class Emailsview extends Emails {

    public function showContactEmails(){
        $results = $this->allContactEmails();
        return $results;

    }

}