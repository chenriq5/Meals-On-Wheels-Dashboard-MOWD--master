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
$updateVolunteer= 
    "
        UPDATE clients
        SET clientName = '".$_POST['clientName']."',
            community = '".$_POST['community']."',
            address = '".$_POST['address']."',
            phoneNumber = '".$_POST['phoneNumber']."',
            information = '".$_POST['information']."',
            monday = '".$monday."',
            tuesday = '".$tuesday."',
            wednesday = '".$wednesday."',
            thursday = '".$thursday."',
            friday = '".$friday."',
            saturday = '".$saturday."',
            sunday = '".$sunday."'
        WHERE clientID = '".$_POST['clientID']."'
    ";
$result = $mysqli->query($updateVolunteer);

$jTableResult = array();
$jTableResult['Result'] = 'OK';
print json_encode($jTableResult);
?>