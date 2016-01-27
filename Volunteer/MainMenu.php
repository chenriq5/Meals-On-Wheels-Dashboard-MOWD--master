<?php
    require_once '../startEverything.php';
    echo"       
    			<link href='../css/style-volunteer.css' rel='stylesheet'  />
    			<title>Volunteer Main Menu - Meals On Wheels Dashboard</title>
            </head>
            <body>
        ";
if($loggedIn)
{
    echo "      

            
	           <!-- Start Header	-->
                <div class= 'row header'>
                    <div class='col-xs-12 col-md-6 col-md-offset-3'><h1>Main Menu</h1></div>
                        <div class='col-xs-12 col-md-1 col-md-offset-1'><h1><a class='btn btn-primary btn-lg' href='Logout.php' role='button'>Log Out</a></h1></div>
                        <!--<div class='col-xs-12 col-md-1 '><h1><a class='btn btn-primary btn-lg' href='#' role='button'>Communities</a></h1></div> -->
                    </div>
                </div>
	           <!-- End Header		-->
                <div class='container'>
                    <h2>Hello $userName!</h2>
                    <div class='row-centered'>
                        <div class='col-xs-12 col-md-6 col-centered'>
                            <h2><a class='btn btn-primary btn-lg btn-block' href='DeliveryRoute.php' role='button'><span class='glyphicon glyphicon-road' aria-hidden='true'></span> Deliver to Communities</a></h2>
                            <h2><a class='btn btn-primary btn-lg btn-block' href='MealMenu.php' role='button'><span class='glyphicon glyphicon-apple' aria-hidden='true'></span> Meal Menu</a></h2>
                            <h2><a class='btn btn-primary btn-lg btn-block' href='Tutorial.php' role='button'><span class='glyphicon glyphicon-play' aria-hidden='true'></span> Watch Tutorial</a></h2>
                        </div>
                    </div>
        
                </div>
                <!-- jQuery Version 1.11.1 -->
                <script src='js/jquery.js'></script>

                <!-- Bootstrap Core JavaScript -->
                <script src='js/bootstrap.min.js'></script>	
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
