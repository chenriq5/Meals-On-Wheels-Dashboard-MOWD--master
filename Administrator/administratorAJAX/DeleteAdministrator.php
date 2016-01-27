<?php 
require '../../databaseConnect.php';

$deleteAdministrator= 
    "
        DELETE
        FROM administrators
        WHERE administratorID = '".$_POST['administratorID']."'
    ";
$result = $mysqli->query($deleteAdministrator);

$jTableResult = array();
$jTableResult['Result'] = 'OK';
print json_encode($jTableResult);
?>