<?php

class Partners extends Dbh {


    protected function allPartners() {
        $sql = "SELECT * FROM partner_companies";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }
    

    public function addPartner($partner_name,$partner_address,$contactId) {
        $sql = "INSERT INTO partner_companies (company_name, company_address, contact_id) VALUES (?, ?, ?)";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$partner_name,$partner_address,$contactId]);
    }

    protected function selectedPartner($Id) {
        $sql = "SELECT * FROM partner_companies WHERE Id = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$Id]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function updatePartner($Id,$edited_name, $edited_address, $edited_contact) {
        $sql = "UPDATE partner_companies
        SET company_name = ?, company_address = ?, contact_id = ?
        WHERE Id = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$edited_name,$edited_address,$edited_contact,$Id]);
        return true;
    }

    public function deletePartner($Id) {
        $sql = "DELETE FROM partner_companies WHERE Id = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$Id]);
    }

    protected function joinedPartner() {
        $sql = "SELECT contact_name, company_name
        FROM partner_companies
        INNER JOIN contacts
        ON partner_companies.contact_id = contacts.Id";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }


}