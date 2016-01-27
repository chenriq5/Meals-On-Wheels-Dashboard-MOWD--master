<?php
    require_once '../startEverything.php';
    $communitySelectOptions = $numberOfCommunities ="";
    $communityResult=$mysqli->query("SELECT community FROM clients GROUP BY community");
    if( $communityResult->num_rows > 0 )
    {
        $numberOfCommunities = $communityResult->num_rows;
        while( $communityResultRow = $communityResult->fetch_object() ){
            $communitySelectOptions .= "<option value='{$communityResultRow->community}'>{$communityResultRow->community}</option>";
        }
    }

    if($loggedIn){
    echo"       
    			<link href='../css/style-volunteer.css' rel='stylesheet'  />
    			<title>Delivery Dashboard - Meals On Wheels Dashboard</title>
            </head>
            <body>            
	           <!-- Start Header	-->
                <div class= 'row header'>
                    <div class='col-xs-12 col-md-6 col-md-offset-3'><h1>Delivery Dashboard</h1></div>
                        <div class='col-xs-12 col-md-1 col-md-offset-1'><h1><a class='btn btn-primary btn-lg' href='Logout.php' role='button'>Log Out</a></h1></div>
                        <!--<div class='col-xs-12 col-md-1 '><h1><a class='btn btn-primary btn-lg' href='#' role='button'>Communities</a></h1></div> -->
                    </div>
                </div>
	           <!-- End Header		-->
                <div class='container'>
                    <h2>First, select a community. Then, select clients to deliver to!</h2>
                    <hr>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-xs-12 col-md-3'>
                                <div class='row'>
                                    <h2>There are $numberOfCommunities communities you can deliver to!</h2>
                                </div>
                                <br>
                                <div class='row'>
                                    <select class='form-control' id='communitySelect'>
                                        $communitySelectOptions
                                    </select>
                                </div>
                                <br>
                                <div class='row' id='communitySubmitButtonRow'>
                                    <input type='submit' id='communitySubmit' value='Submit' class='btn btn-primary btn-lg row-centered btn-block'>
                                </div>
                            </div>
                            
                            <div class='col-xs-12 col-md-8 col-md-offset-1'>
                                <div class='row'><h2>Clients In Community:</h2></div>
                                <div class='form-group' id='clientChecklist'>
                                    
                                </div>
                                <div class='row' id='clientSubmitButtonRow'>
                                    <input type='submit' id='clientSubmit' value='Submit' class='btn btn-primary btn-lg row-centered btn-block'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    </div>
                    <div class='container' id='map-Container'>
                        <div class='map-block' id='googleMap'></div>
                    </div>
                    <br>
                    <div class='container'>
                        <hr>
                        <div class='row directions-block'>
                            <div class='col-xs-12 col-md-12' id='googleMapDirections'></div>
                        </div>
                    </div>
                    
                    <div class='container'>
                        <hr>
                        <div class='col-xs-12 col-md-12'><h1><a class='btn btn-primary btn-lg btn-block' href='Logout.php' role='button'>Finish Delivery</a></h1></div>
                        <br>
                        <input type='hidden' id='userID' value='". $_SESSION['userID'] ."'</input>
                        <input type='hidden' id='userName' value='". $_SESSION['userName'] ."'</input>
                    </div>

                                  
                                
                <!-- jQuery Version 1.11.1 -->
                <script src='../js/jquery.js'></script>
                <!-- Bootstrap Core JavaScript -->
                <script src='../js/bootstrap.min.js'></script>	
                
                
                <!-- CUSTOM SCRIPT FOR GOOGLE MAPS API -->
                <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAIl_FA5KJrhiAtB79IIKc2cPlK7ZtBSuU&callback=initialize' async defer></script>
                <script src='../js/DeliveryRoute.js'></script>

                

                
            </body>
            </html>
            ";
    }
    else
    {
        echo "<h2>You are not logged in! Redirecting you to Volunteer Login in 5 seconds. </h2>
                <h2>Or... <a href='Login.php'>Click here!</a></h2>
                <script type='text/javascript'>   
                    function Redirect() 
                    {  
                        window.location='Login.php'; 
                    } 
         
                    setTimeout('Redirect()', 5000);   
                </script>
            </body>
            </html>
        ";
}
?>

