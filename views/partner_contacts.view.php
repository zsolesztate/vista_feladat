<?php

$contactsObject = new Partnersview();
$allContacts = $contactsObject->showContactsWithPartners();

?>
<h2>Partnerekhez tartozó kontaktok</h2>
    <table border="1">
        <tr>
            <th>Partner</th>
            <th>Kontaktszemély</th>
        </tr>
        <?php foreach ($allContacts as $contact): ?>
            <tr>
                <td><?php echo $contact['company_name']; ?></td>
                <td><?php echo $contact['contact_name']; ?></td>         
            </tr>
        <?php endforeach; ?>

    </table>