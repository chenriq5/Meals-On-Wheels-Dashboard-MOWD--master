<?php 
require '../../databaseConnect.php';

$selectAdministratorInformation = 
    "
        SELECT *
        FROM administrators
    ";
$result = $mysqli->query($selectAdministratorInformation);
$rows = array();
while( $row = $result->fetch_array() ){
    $rows[] = $row;
}

$jTableResult = array();
$jTableResult['Result'] = 'OK';
$jTableResult['Records'] = $rows;
print json_encode($jTableResult);
?>