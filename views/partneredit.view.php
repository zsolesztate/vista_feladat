<?php
include '../includes/class-autoload.inc.php';

$selectedId = $_POST['Id'];
$contactId = $_POST['contact_id'];

$partnerObject = new Partnersview();
$selectedPartner = $partnerObject->showSelectedPartner($selectedId);

$contactsObject = new Contactsview();
$selectedContact = $contactsObject->showSelectedContact($contactId);

$allContacts = $contactsObject->showContacts();

?>
<h2>Rekord módosítása</h2>
    <form action="../includes/edit_partner.inc.php" method="POST">
        <input type="hidden" name="partner_id" value="<?php echo $selectedId; ?>">
         <label for="nev">Név:</label>
        <input type="text" name="partnerdit_name" required value="<?php echo $selectedPartner[0]['company_name']; ?>"><br>
         <label for="tel">Telefonszám:</label>
        <input type="text" name="partneredit_address" value="<?php echo $selectedPartner[0]['company_address']; ?>"><br>
         <label for="nev">Partner kontakt kiválasztása</label><br>
            <select id="contactDropdown" name="contactDropdown"> 
                <?php if($selectedContact[0]['Id'] == 0){ ?>
                <option value="0">Nincs hozzárendelve</option>
                <?php  }else{ ?>
                <option value="<?php echo $selectedContact[0]['Id']; ?>"><?php echo $selectedContact[0]['contact_name']; ?></option>
                <option value="0">Nem rendelek hozzá partnert</option>  
                <?php } 
                    foreach ($allContacts as $contact): 
                        if($contact['Id'] !== $selectedContact[0]['Id']){ ?>
                            <option value="<?php echo $contact['Id']; ?>"><?php echo $contact['contact_name']; ?></option>
                <?php }
                     endforeach; ?>
                               
            </select>

        <input type="submit" value="Módosítás">
    </form>