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
    echo"       <title>Volunteer Main Menu - Meals On Wheels Dashboard</title>
            </head>
            <body>            
	           <!-- Start Header	-->
                <div class= 'row header'>
                    <div class='col-xs-12 col-md-6 col-md-offset-3'><h1>Main Menu</h1></div>
                        <div class='col-xs-12 col-md-1 col-md-offset-1'><h1><a class='btn btn-primary btn-lg' href='#' role='button'>Log Out</a></h1></div>
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

                                  
                                
                <!-- jQuery Version 1.11.1 -->
                <script src='../js/jquery.js'></script>
                <!-- CUSTOM SCRIPT FOR GOOGLE MAPS API -->
                <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAIl_FA5KJrhiAtB79IIKc2cPlK7ZtBSuU&callback=initialize' async defer></script>
                <script src='../js/DeliveryRoute.js'></script>


                <!-- Bootstrap Core JavaScript -->
                <script src='../js/bootstrap.min.js'></script>	
                

                
            </body>
            </html>
            ";
?>

