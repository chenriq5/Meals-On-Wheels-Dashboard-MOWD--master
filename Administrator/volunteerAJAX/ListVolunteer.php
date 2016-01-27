<?php 
require '../../databaseConnect.php';

$selectVolunteerInformationOmitSchedule = 
    "
        SELECT v.id, v.email, v.name, v.birthday, v.phonenumber, v.emergencynumber
        FROM volunteers v
    ";
$result = $mysqli->query($selectVolunteerInformationOmitSchedule);
$rows = array();
while( $row = $result->fetch_array() ){
    $rows[] = $row;
}

$jTableResult = array();
$jTableResult['Result'] = 'OK';
$jTableResult['Records'] = $rows;
print json_encode($jTableResult);
?>