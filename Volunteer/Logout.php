<?php
    require_once '../startEverything.php';
    echo "
    	<link href='../css/style-volunteer.css' rel='stylesheet'  />
        <title>Volunteer Logout - Meals On Wheels Dashboard</title>
    </head>
    <body>
        <!-- Start Header	-->
        <div class= 'row header'>
            <div class='col-xs-12 col-md-6 col-md-offset-3'><h1>Log Out </h1></div>
        </div>
        <!-- End Header		-->
        
        <div class='container'>
            <h2>Thank you for your service today $userName!</h2>
            <div class='row-centered'>
            <h3 class='text-black'>You are now being logged out...</h3>
            </div>
        </div>";

    $mysqli->close();
    session_destroy();

    echo "
        <script type='text/javascript'>   
        function Redirect() 
        {  
            window.location='../index.php'; 
        } 
         
        setTimeout('Redirect()', 5000);   
        </script>
        
    ";
?>