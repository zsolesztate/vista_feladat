<?php
$contactsObject = new Contactsview();
$allContacts = $contactsObject->showContacts();
$emailsOmbject = new Emailsview();
$allContactEmails = $emailsOmbject->showContactEmails();

?>

<h2>Kontaktokhoz tartozó emailcímek</h2>
 <br>
 <table border="1">
        <tr>
            <th>Kontakt</th>
            <th>Email címek</th>
        </tr>

<?php 
        foreach ($allContactEmails as $emails): 
            if (str_contains($emails['Emails'], ',')) { 
                $emailsArray = explode(",",$emails['Emails']); ?>
        <tr>
            <td rowspan="<?php echo count($emailsArray); ?>"><?php echo $emails['contact_name']; ?></td>
               
<?php     for ($i=0; $i < count($emailsArray); $i++) { ?>
            <td><?php echo $emailsArray[$i]; ?></td>
            <td>
                <form method="post" action="/views/emailedit.view.php">
                    <input type="hidden" name="email" value="<?php echo $emailsArray[$i]; ?>">
                    <input type="hidden" name="name" value="<?php echo $emails['contact_name']; ?>">
                    <input type="submit" name="edit" value="Módosítás">
                </form>
                <form method="post" action="/includes/delete_email.inc.php">
                <input type="hidden" name="email" value="<?php echo $emailsArray[$i]; ?>">
                    <input type="submit" name="delete" value="Törlés">
                </form>
            </td>
        </tr>
 <?php    } 
        }else{
            ?>
        <tr>
            <td><?php echo $emails['contact_name']; ?></td>
            <td><?php echo $emails['Emails']; ?></td>
            <td>
                <form method="post" action="/views/emailedit.view.php">
                    <input type="hidden" name="name" value="<?php echo $emails['contact_name']; ?>">
                    <input type="hidden" name="email" value="<?php echo $emails['Emails']; ?>">
                    <input type="submit" name="edit" value="Módosítás">
                </form>
                <form method="post" action="/includes/delete_email.inc.php">
                <input type="hidden" name="email" value="<?php echo $emails['Emails']; ?>">
                    <input type="submit" name="delete" value="Törlés">
                </form>
            </td>
        </tr>
        <?php } 
        endforeach; ?>
</table>

<h2>Email cím hozzárendelése</h2>
<form action="../includes/new_contactemail.inc.php" method="POST">
         <label for="nev">Kontakt kiválasztása</label><br>
            <select id="contactDropdown" name="contactDropdown"> 
                <?php
                    foreach ($allContacts as $contact):  ?>
                            <option value="<?php echo $contact['Id']; ?>"><?php echo $contact['contact_name']; ?></option>
                <?php 
                     endforeach; ?>
                               
            </select>
            <br>
            <input type="email" name="email" required><br>
        <input type="submit" value="Hozzárendelés">
    </form>

    <?php 
        if (isset($_GET['emailreturn'])) {
            if ($_GET['emailreturn'] == 1) {
                echo "Sikeres emailcím hozzáadás!";
            }
            if ($_GET['emailreturn'] == 2) {
                echo "Az email cím már regisztrálva van vagy nem megfelelő formátumú";
            }
            if ($_GET['emailreturn'] == 3) {
                echo "Sikeres email törlés!";
            }
            if ($_GET['emailreturn'] == 4) {
                echo "Az új email cím már regisztrálva van vagy nem megfelelő formátumú.";
            }
            if ($_GET['emailreturn'] == 5) {
                echo "Sikeres email módosítás!";
            }
        
        }
    
    
    ?>