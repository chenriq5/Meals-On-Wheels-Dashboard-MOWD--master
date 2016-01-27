<?php 
require '../../databaseConnect.php';

$updateVolunteer= 
    "
        UPDATE volunteers
        SET email = '".$_POST['email']."',
            name = '".$_POST['name']."',
            birthday = '".$_POST['birthday']."',
            phonenumber = '".$_POST['phonenumber']."',
            emergencynumber= '".$_POST['emergencynumber']."'
        WHERE id = '".$_POST['id']."'
    ";
$result = $mysqli->query($updateVolunteer);

$jTableResult = array();
$jTableResult['Result'] = 'OK';
print json_encode($jTableResult);
?>