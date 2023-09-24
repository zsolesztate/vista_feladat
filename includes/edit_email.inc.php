<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

$editedEmail = $_POST['edited_email'];
$oldEmail = $_POST['old_email'];

$editContactEmail = new Emailscontroller();
try{
    $result = $editContactEmail->editContactEmail($editedEmail,$oldEmail);

    if($result === false){
        //már létező emailcím
        header('Location:../index.php?emailreturn=4');
    
       }else{
        header('Location:../index.php?emailreturn=5');
       }  
        exit;

}catch (TypeError $e){
    echo "Error is" . $e->getMessage();
}
?>