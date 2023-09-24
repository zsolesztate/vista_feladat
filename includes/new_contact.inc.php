<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

$newContactName = $_POST['cont_name'];
$newContactTel = $_POST['cont_tel'];
$newContactAddress = $_POST['cont_address'];

$addNewContact = new Contactscontroller();
try{
    $addNewContact->createContact($newContactName, $newContactTel, $newContactAddress);
    header('Location:../index.php?success=1');
    exit;

}catch (TypeError $e){
    echo "Error is" . $e->getMessage();
}
?>