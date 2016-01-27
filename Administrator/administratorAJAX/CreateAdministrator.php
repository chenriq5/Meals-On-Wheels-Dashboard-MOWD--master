<?php 
require '../../databaseConnect.php';
$password = $_POST['administratorPassword'];
$salt1 = "h@5u*";
$salt2 = "%!rep";
$hashedPassword = hash('ripemd128', "$salt1$password$salt2");

$addAdministrator = 
    "
        INSERT INTO administrators
        (`administratorID`,`administratorEmail`,`administratorPassword`,`administratorName`)
        VALUES
        (NULL,'".$_POST['administratorEmail']."','".$hashedPassword."','".$_POST['administratorName']."')
    ";
$result = $mysqli->query($addAdministrator);
$result = $mysqli->query('SELECT * FROM administrators WHERE administratorID = LAST_INSERT_ID()');
$row = $result->fetch_array();

$jTableResult = array();
$jTableResult['Result'] = 'OK';
$jTableResult['Record'] = $row;
print json_encode($jTableResult);
?>