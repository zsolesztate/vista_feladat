<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

$selectedEmail = $_POST['email'];

$removewContact = new Emailscontroller();
try{
    $removewContact->removeEmail($selectedEmail);
    header('Location:../index.php?emailreturn=3');
    exit;

}catch (TypeError $e){
    echo "Error is" . $e->getMessage();
}
?>