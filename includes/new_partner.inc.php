<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

$newPartnerName = $_POST['partner_name'];
$newPartnerAddress = $_POST['partner_address'];
$newPartnerContactId = $_POST['contactDropdown'];

$addNewPartner = new Partnerscontroller();
try{
    $addNewPartner->createPartner($newPartnerName,$newPartnerAddress,$newPartnerContactId);
    header('Location:../index.php?partnersuccess=1');
    exit;

}catch (TypeError $e){
    echo "Error is" . $e->getMessage();
}
?>