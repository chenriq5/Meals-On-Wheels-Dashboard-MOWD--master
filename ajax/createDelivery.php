<?php
    if(isset($_POST['clientAddress'])){
        require '../databaseConnect.php';
        $currentClientAddress = $mysqli->real_escape_string($_POST['clientAddress']);
        $volunteerID = $mysqli->real_escape_string($_POST['userID']);
        $selectClientIDFromAddressQuery=
            "
                SELECT c.*
                FROM clients c 
                WHERE c.address='". $currentClientAddress ."'
            ";
        $clientResult = $mysqli->query($selectClientIDFromAddressQuery);
        $clientRow = $clientResult->fetch_object();
        
        $addDeliveryQuery=
            "
            INSERT INTO `fau-mysql`.`delivery` (`deliveryID`, `deliveryDate`, `volunteerID`,`clientID`,`comment`)
            VALUES (NULL, curdate(),'". $volunteerID. "', '". $clientRow->clientID ."', NULL)
            ";
        if($deliveryResult = $mysqli->query($addDeliveryQuery)){
            echo "Delivery Success!";
        }
        else{
            echo $mysqli->error;
        }
        //echo $deliveryResult;
    }
    else{
        echo "isset never entered";
    }
?>