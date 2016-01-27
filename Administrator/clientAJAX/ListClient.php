<?php 
require '../../databaseConnect.php';

$selectClientInformation = 
    "
        SELECT c.*
        FROM clients c
    ";
$result = $mysqli->query($selectClientInformation);
$rows = array();
while( $row = $result->fetch_array() ){
    $rows[] = $row;
}

$jTableResult = array();
$jTableResult['Result'] = 'OK';
$jTableResult['Records'] = $rows;
print json_encode($jTableResult);
?>