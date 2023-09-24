<?php

$contactsObject = new Contactsview();
$allContacts = $contactsObject->showContacts();

?>
<h2>Kontaktok</h2>
    <table border="1">
        <tr>
            <th>Név</th>
            <th>Telefonszám</th>
        </tr>
        <?php foreach ($allContacts as $contact): ?>
            <tr>
                <td><?php echo $contact['contact_name']; ?></td>
                <td><?php echo $contact['contact_tel']; ?></td>
                <td>
                    <form method="post" action="/views/contactsedit.view.php">
                        <input type="hidden" name="Id" value="<?php echo $contact['Id']; ?>">
                        <input type="submit" name="edit" value="Módosítás">
                    </form>
                    <form method="post" action="/includes/delete_contact.inc.php">
                        <input type="hidden" name="Id" value="<?php echo $contact['Id']; ?>">
                        <input type="submit" name="delete" value="Törlés">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    <h2>Kontakt hozzáadása</h2>
    <form action="includes/new_contact.inc.php" method="post">
        <label for="nev">Név:</label>
            <input type="text" name="cont_name" required><br>
        <label for="tel">Telefonszám:</label>
            <input type="text" name="cont_tel"><br>
        <label for="cim">Cím:</label>
         <input type="text" name="cont_address"><br>
         <input type="submit" value="Létrehozás">
    </form>
    <?php 
        if (isset($_GET['success'])) {
            if ($_GET['success'] == 1) {
                echo "Sikeres hozzáadás!";
            }
            if ($_GET['success'] == 2) {
                echo "Sikeres törlés!";
            }
            if ($_GET['success'] == 3) {
                echo "Sikeres módosítás!";
            }
    }