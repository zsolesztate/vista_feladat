<?php
$selectedEmail = $_POST['email'];
$selectedEmailContact = $_POST['name'];

?>
<h2><?php echo $selectedEmailContact; ?> emailcímének módosítása</h2>
    <form action="../includes/edit_email.inc.php" method="POST">
         <label for="nev">Emailcím:</label>
         <input type="hidden" name="old_email" value="<?php echo $selectedEmail; ?>">
        <input type="email" name="edited_email" required value="<?php echo $selectedEmail; ?>"><br>
        <input type="submit" value="Módosítás">
    </form>