<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

$editedPartnerId = $_POST['partner_id'];
$editedPartnerName = $_POST['partnerdit_name'];
$editedPartnerAddress = $_POST['partneredit_address'];
$editedPartnerContactId = $_POST['contactDropdown'];

$editContact = new Partnerscontroller();
try{
    $editContact->editPartner($editedPartnerId,$editedPartnerName,$editedPartnerAddress,$editedPartnerContactId);
    header('Location:../index.php?partnersuccess=2');
    exit;

}catch (TypeError $e){
    echo "Error is" . $e->getMessage();
}
?>