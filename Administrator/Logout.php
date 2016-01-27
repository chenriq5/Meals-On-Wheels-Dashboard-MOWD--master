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
?>

<!DOCTYPE html>
<html>
    <title>Administrator Logout - Meals On Wheels Dashboard</title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='../css/bootstrap.min.css' rel='stylesheet'/>
    <link href='../css/style-admin.css' rel='stylesheet'  />
</head>
<body>
	<!-- Start Header	-->
    <div class='header'>
        <h1>Logout</h1>
    </div>
	<!-- End Header		-->
        <div class='container'>
            <h2>Thank you for your service today <?php echo $administratorName; ?>!</h2>
            <div class='row-centered'>
            <h3 class='text-black'>You are now being logged out...</h3>
            </div>
        </div>
    <?php
    $mysqli->close();
    session_destroy();
    ?>

        <script type='text/javascript'>   
        function Redirect() 
        {  
            window.location='../index.php'; 
        } 
         
        setTimeout('Redirect()', 5000);   
        </script>
</body>
</html>