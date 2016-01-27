<?php 
require '../../databaseConnect.php';
$password = $_POST['password'];
$salt1 = "h@5u*";
$salt2 = "%!rep";
$hashedPassword = hash('ripemd128',"$salt1$password$salt2");

$addVolunteerInformationDefaultTrueSchedule = 
    "
        INSERT INTO volunteers
        (`id`,`email`,`password`,`name`,`birthday`,`phonenumber`,`emergencynumber`,`monday`,`tuesday`,`wednesday`,`thursday`,`friday`,`saturday`,`sunday`)
        VALUES
        (NULL,'".$_POST['email']."','".$hashedPassword."','".$_POST['name']."','".$_POST['birthday']."','".$_POST['phonenumber']."','".$_POST['emergencynumber']."','1','1','1','1','1','1','1');
    ";
$result = $mysqli->query($addVolunteerInformationDefaultTrueSchedule);
$result = $mysqli->query('SELECT * FROM volunteers WHERE id = LAST_INSERT_ID()');
$row = $result->fetch_array();

$jTableResult = array();
$jTableResult['Result'] = 'OK';
$jTableResult['Record'] = $row;
print json_encode($jTableResult);
?>