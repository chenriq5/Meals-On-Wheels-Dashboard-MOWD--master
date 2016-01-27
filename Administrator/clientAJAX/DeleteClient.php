<?php 
require '../../databaseConnect.php';

$deleteClient= 
    "
        DELETE
        FROM clients
        WHERE clientID = '".$_POST['clientID']."'
    ";
$result = $mysqli->query($deleteClient);

$jTableResult = array();
$jTableResult['Result'] = 'OK';
print json_encode($jTableResult);
?>