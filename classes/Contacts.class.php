<?php

class Contacts extends Dbh {

    public function addContacts($name, $tel, $address) {
        $sql = "INSERT INTO contacts (contact_name, contact_tel, contact_address) VALUES (?, ?, ?)";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$name, $tel, $address]);
    }

    public function deleteContacts($Id) {
        $sql = "DELETE FROM contacts WHERE Id = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$Id]);
    }

    protected function allContacts() {
        $sql = "SELECT * FROM contacts";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

     protected function selectedContact($Id) {
        $sql = "SELECT * FROM contacts WHERE Id = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$Id]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function updateContact($Id,$edited_name, $edited_tel, $edited_address) {
        $sql = "UPDATE contacts
        SET contact_name = ?, contact_tel = ?, contact_address = ?
        WHERE Id = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$edited_name,$edited_tel,$edited_address,$Id]);

        $results = $stmt->fetchAll();
        return $results;
    }

}