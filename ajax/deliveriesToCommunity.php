<?php
    if(isset($_POST['communityName'])){
        require '../databaseConnect.php';
        //$communityName = $mysqli->real_escape_string($_POST['communityName']);
        //echo $_POST['communityName'];
        $getDeliveriesToBeMadeQuery = 
            "       SELECT deliveriesToBeMadeToday.*
                    FROM ( 	SELECT c.* 
		                    FROM clients c
                    WHERE 
                        CASE dayname(CURDATE())
				            WHEN 'Monday' THEN c.monday!=0
                            WHEN 'Tuesday' THEN c.tuesday!=0
                            WHEN 'Wednesday' THEN c.wednesday!=0
                            WHEN 'Thursday' THEN c.thursday!=0
                            WHEN 'Friday' THEN c.friday!=0
                            WHEN 'Saturday' THEN c.saturday!=0
                            WHEN 'Sunday' THEN c.sunday!=0
			             END
		            AND c.community='". $mysqli->real_escape_string($_POST['communityName']) ."' ) deliveriesToBeMadeToday
                    WHERE deliveriesToBeMadeToday.clientID NOT IN ( SELECT d.clientID 
												                    FROM delivery d
												                    WHERE d.deliveryDate = CURDATE() )";
        $clientsResult=$mysqli->query($getDeliveriesToBeMadeQuery);
        if( $clientsResult->num_rows > 0){
            $clientData = "";
            while( $clientRow = $clientsResult->fetch_object() ){
                $clientData .= "<hr>
                                <div class='row'>
                                    <h3 class='text-black'>
                                        <div class='col-md-1'>
                                            <input type='checkbox' name='client' value='{$clientRow->address}' />
                                        </div>
                                        <div class='col-md-11'>
                                            <div class='row'>
                                                <div class='col-md-4 text-underline'>Name: </div>
                                                <div class='col-md-8'>{$clientRow->clientName}</div>
                                            </div>
                                            <br>
                                            <div class='row'>
                                                <div class='col-md-4 text-underline'>Address: </div>
                                                <div class='col-md-8'>{$clientRow->address}</div>
                                            </div>
                                            <br>
                                            <div class='row'>
                                                <div class='col-md-4 text-underline'>Phone Number: </div> 
                                                <div class='col-md-8'>{$clientRow->phoneNumber}</div>
                                            </div>
                                            <br>
                                            <div class='row'>
                                            <div class='col-md-4 text-underline'>Information: </div> 
                                            <div class='col-md-8'>{$clientRow->information}</div>
                                            </div>
                                            <br>
                                        </div>
                                    </h3>
                                </div>";
            }
            
            echo $clientData;
        }
        else{
            $noClientData ="";
            $noClientData =   "
                                <div class='row'>
                                    <h3 class='text-black'>There are no more clients who need deliveries in this community today!</h3>
                                </div>
                            ";
            echo $noClientData;
        }
    }
    else echo "isset never entered";
?>