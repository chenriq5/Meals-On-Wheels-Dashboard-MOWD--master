<?php 
require '../../databaseConnect.php';

$selectDeliveryInformation = 
    "
        SELECT d.deliveryID, d.deliveryDate, d.volunteerID, d.clientID, c.clientName, v.name
        FROM delivery d, clients c, volunteers v
        WHERE d.volunteerID = v.id AND d.clientID = c.clientID
        ORDER BY d.deliveryDate DESC, d.deliveryID DESC
    ";
$result = $mysqli->query($selectDeliveryInformation);
$rows = array();
while( $row = $result->fetch_array() ){
 
//foreach($row as $key=>$val) {
//    print "||Key:$key--Val:$val\n||";
//}
    $rows[] = $row;
}

$jTableResult = array();
$jTableResult['Result'] = 'OK';
$jTableResult['Records'] = $rows;

//print $jTableResult['Records'][0]['clientName'];
print json_encode($jTableResult);

?>