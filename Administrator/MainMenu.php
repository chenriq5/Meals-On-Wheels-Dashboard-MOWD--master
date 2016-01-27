<?php
//START SESSIONING AND DATABASE CONNECTION
    session_start();
    include_once '../databaseConnect.php';  
    if (isset($_SESSION['administratorID']))
    {
        $administratorID = $_SESSION['administratorID'];
        $administratorName= $_SESSION['administratorName'];
        $adminLoggedIn = TRUE;
    }
    else{
        $adminLoggedIn = FALSE;
    }
//END SESSIONING AND DATABASE CONNECTION
    if(!$adminLoggedIn){
        header( 'Location: Login.php' );
        die();
    }

    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administrator Main Menu - Meals On Wheels Dashboard</title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='../css/bootstrap.min.css' rel='stylesheet'/>
    <link href='../css/style-admin.css' rel='stylesheet'  />
</head>
<body>
<!-- Start Header	-->
    <div class= 'row header'>
        
        <div class='col-xs-12 col-md-6 col-md-offset-3'><h1>Main Menu</h1></div>
            <div class='col-xs-12 col-md-1 col-md-offset-1'><h1><a class='btn btn-purple btn-lg' href='Logout.php' role='button'>Log Out</a></h1></div>
            <!--<div class='col-xs-12 col-md-1 '><h1><a class='btn btn-primary btn-lg' href='#' role='button'>Communities</a></h1></div> -->
        </div>
    </div>
<!-- End Header		-->
    <div class='container'>
        <h2>Hello <?php echo $administratorName; ?>!</h2>
        <div class='row-centered'>
            <div class='col-xs-12 col-md-6 col-centered'>
                <h2><a class='btn btn-purple btn-lg btn-block' href='ViewDeliveries.php' role='button'><span class='glyphicon glyphicon-briefcase' aria-hidden='true'></span> View Deliveries</a></h2>
                <h2><a class='btn btn-purple btn-lg btn-block' href='EditVolunteers.php' role='button'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Edit Volunteers</a></h2>
                <h2><a class='btn btn-purple btn-lg btn-block' href='EditClients.php' role='button'><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Edit Clients</a></h2>
                <h2><a class='btn btn-purple btn-lg btn-block' href='EditAdministrators.php' role='button'><span class='glyphicon glyphicon-wrench' aria-hidden='true'></span> Edit Administrators</a></h2>
            </div>
        </div>
     
    </div>
    <!-- jQuery Version 1.11.1 -->
    <script src='../js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='../js/bootstrap.min.js'></script>	
</body>
</html>