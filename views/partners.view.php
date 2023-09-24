<?php

$partnersObject = new Partnersview();
$allParners = $partnersObject->showPartners();

?>
     <h2>Partner cégek</h2>
    <table border="1">
        <tr>
            <th>Partner neve</th>
            <th>Cím</th>
        </tr>
        <?php foreach ($allParners as $partners): ?>
            <tr>
                <td><?php echo $partners['company_name']; ?></td>
                <td><?php echo $partners['company_address']; ?></td>
                <td>
                    <form method="post" action="/views/partneredit.view.php">
                        <input type="hidden" name="Id" value="<?php echo $partners['Id']; ?>">
                        <input type="hidden" name="contact_id" value="<?php echo $partners['contact_id']; ?>">
                        <input type="submit" name="edit" value="Módosítás">
                    </form>
                    <form method="post" action="/includes/delete_partner.inc.php">
                        <input type="hidden" name="Id" value="<?php echo $partners['Id']; ?>">
                        <input type="submit" name="delete" value="Törlés">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Partner hozzáadása</h2>
    <form action="includes/new_partner.inc.php" method="post">
        <label for="nev">Partnernév:</label>
            <input type="text" name="partner_name" required><br>
        <label for="cim">Partner címe:</label>
            <input type="text" name="partner_address"><br>
        <label for="nev">Partner kontakt kiválasztása:(opcionális)</label><br>
            <select id="contactDropdown" name="contactDropdown"> 
             <option value="0">Nincs hozzárendelve kontakt személy</option>
                <?php foreach ($allContacts as $contact): ?>
                    <option value="<?php echo $contact['Id']; ?>"><?php echo $contact['contact_name']; ?></option>
                <?php endforeach; ?>
            </select>
        <input type="submit" value="Létrehozás">
    </form>
    <?php 
        if (isset($_GET['partnersuccess'])) {
            if ($_GET['partnersuccess'] == 1) {
                echo "Sikeres partner hozzáadás!";
            }
            if ($_GET['partnersuccess'] == 2) {
                echo "Sikeres partner módosítás!";
            }
            if ($_GET['partnersuccess'] == 3) {
                echo "Sikeres partner törlés!";
            }
        
        }
    
    
    ?>

