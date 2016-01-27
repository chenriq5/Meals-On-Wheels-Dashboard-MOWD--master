<?php 
require '../../databaseConnect.php';
//Create Schedule
if(empty($_POST['monday']))
{
    $monday = 0;
} else{
    $monday = 1;
}

if(empty($_POST['tuesday']))
{
    $tuesday = 0;
} else{
    $tuesday = 1;
}

if(empty($_POST['wednesday']))
{
    $wednesday = 0;
} else{
    $wednesday = 1;
}

if(empty($_POST['thursday']))
{
    $thursday = 0;
} else{
    $thursday = 1;
}

if(empty($_POST['friday']))
{
    $friday = 0;
} else{
    $friday = 1;
}

if(empty($_POST['saturday']))
{
    $saturday = 0;
} else{
    $saturday = 1;
}

if(empty($_POST['sunday']))
{
    $sunday = 0;
} else{
    $sunday = 1;
}

//End Create Schedule
$addClient = 
    "
    INSERT INTO clients
    (`clientID`,`clientName`,`community`,`address`,`phoneNumber`,`information`,`monday`,`tuesday`,`wednesday`,`thursday`,`friday`,`saturday`,`sunday`)
    VALUES
    (NULL,'". $_POST['clientName'] ."','". $_POST['community'] ."','". $_POST['address'] ."','". $_POST['phoneNumber'] ."','". $_POST['information'] ."','". $monday ."','". $tuesday ."','". $wednesday ."','". $thursday ."','". $friday ."','". $saturday ."','". $sunday ."')
    ";
$result = $mysqli->query($addClient);
$result = $mysqli->query('SELECT * FROM clients WHERE clientID = LAST_INSERT_ID()');
$row = $result->fetch_array();

$jTableResult = array();
$jTableResult['Result'] = 'OK';
$jTableResult['Record'] = $row;
print json_encode($jTableResult);
?>