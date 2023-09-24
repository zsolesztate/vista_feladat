<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

$selectedContactId = $_POST['Id'];

$removewContact = new Contactscontroller();

try{
    $removewContact->removeContact($selectedContactId);
    header('Location:../index.php?success=2');
    exit;

}catch (TypeError $e){
    echo "Error is" . $e->getMessage();
}
?>