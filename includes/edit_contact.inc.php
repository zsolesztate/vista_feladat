<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

$contact_id = $_POST['contact_id'];
$editedName = $_POST['edit_name'];
$editedTel = $_POST['edit_tel'];
$editedAddress = $_POST['edit_address'];

$editContact = new Contactscontroller();
try{
    $editContact->editContact($contact_id,$editedName,$editedTel,$editedAddress);
    header('Location:../index.php?success=3');
    exit;

}catch (TypeError $e){
    echo "Error is" . $e->getMessage();
}
?>