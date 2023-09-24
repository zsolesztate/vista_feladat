<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

$selectedContactId = $_POST['Id'];

$removewContact = new Partnerscontroller();
try{
    $removewContact->removePartner($selectedContactId);
    header('Location:../index.php?partnersuccess=3');
    exit;

}catch (TypeError $e){
    echo "Error is" . $e->getMessage();
}
?>