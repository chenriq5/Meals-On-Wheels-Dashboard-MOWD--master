<?php 
require '../../databaseConnect.php';

$updateAdministrator= 
    "
        UPDATE administrators
        SET administratorEmail = '".$_POST['administratorEmail']."',
            administratorName = '".$_POST['administratorName']."',
            administratorEmail = '".$_POST['administratorEmail']."'
        WHERE administratorID = '".$_POST['administratorID']."'
    ";
$result = $mysqli->query($updateAdministrator);

$jTableResult = array();
$jTableResult['Result'] = 'OK';
print json_encode($jTableResult);
?>