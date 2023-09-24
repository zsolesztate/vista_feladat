<?php
include '../includes/class-autoload.inc.php';

$selectedId = $_POST['Id'];
$contactsObject = new Contactsview();
$selectedContact = $contactsObject->showSelectedContact($selectedId);
?>

<h2>Rekord módosítása</h2>
    <form action="../includes/edit_contact.inc.php" method="POST">
        <input type="hidden" name="contact_id" value="<?php echo $selectedId; ?>">
            <label for="nev">Név:</label>
        <input type="text" name="edit_name" required value="<?php echo $selectedContact[0]['contact_name']; ?>"><br>
            <label for="tel">Telefonszám:</label>
        <input type="text" name="edit_tel" value="<?php echo $selectedContact[0]['contact_tel']; ?>"><br>
            <label for="cim">Cím:</label>
        <input type="text" name="edit_address" value="<?php echo $selectedContact[0]['contact_address']; ?>"><br>
        <input type="submit" value="Módosítás">
    </form>