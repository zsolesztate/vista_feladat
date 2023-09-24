<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

$newContactId = $_POST['contactDropdown'];
$newContactEmail = $_POST['email'];

$addNewContactEmail = new Emailscontroller();
try{
    $result = $addNewContactEmail->createContactEmail($newContactId, $newContactEmail);
    if($result === false){
    //már létező emailcím
    header('Location:../index.php?emailreturn=2');

   }else{
    header('Location:../index.php?emailreturn=1');
   }  
    exit;

}catch (TypeError $e){
    echo "Error is" . $e->getMessage();
}
?>