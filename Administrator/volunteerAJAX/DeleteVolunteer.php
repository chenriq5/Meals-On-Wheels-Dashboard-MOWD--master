<?php 
require '../../databaseConnect.php';

$deleteVolunteer= 
    "
        DELETE
        FROM volunteers
        WHERE id = '".$_POST['id']."'
    ";
$result = $mysqli->query($deleteVolunteer);

$jTableResult = array();
$jTableResult['Result'] = 'OK';
print json_encode($jTableResult);
?>