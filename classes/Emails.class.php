<?php

class Emails extends Dbh {

    protected function allContactEmails() {
        $sql = "SELECT
        contacts.Id,
        contact_name,
        GROUP_CONCAT(contact_emails.Emails) AS Emails
        FROM contacts
        INNER JOIN contact_emails ON contacts.Id = contact_emails.Contact_id
        GROUP BY contacts.Id, contact_name";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    private function checkEmail($email){
        $allEmails = $this->allContactEmails();
        $result = false;
        foreach ($allEmails as $emails) {
            $emailArray = explode(',', $emails['Emails']);
            if (in_array($email, $emailArray)) {
                $result = true;
                break;                
            }
        }
        return $result; 
    }

    protected function addContactEmail($contactId, $contactEmail) {

        if (!$this->checkEmail($contactEmail) && filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
                $sql = "INSERT INTO contact_emails (Emails, Contact_id) VALUES (?, ?)";
                $stmt = $this->Connect()->prepare($sql);
                $stmt->execute([$contactEmail,$contactId]);
                return true; 
        }
        return false;          
    } 

    protected function deleteEmail($email) {
        $sql = "DELETE FROM contact_emails WHERE Emails = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$email]);
    } 

    protected function updateContactEmail($editedEmail,$oldEmail) {

        if (!$this->checkEmail($editedEmail) && filter_var($editedEmail, FILTER_VALIDATE_EMAIL)) {
        $sql = "UPDATE contact_emails
                SET Emails = ?
                WHERE Emails = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$editedEmail,$oldEmail]);

        return true; 
        }
        return false; 
    }

   
    }      
        
