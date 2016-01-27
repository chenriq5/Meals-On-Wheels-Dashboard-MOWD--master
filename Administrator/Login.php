<?php
//START SESSIONING AND DATABASE CONNECTION
    session_start();
    include_once '../databaseConnect.php';  
    if (isset($_SESSION['administratorID']))
    {
        $administratorID = $_SESSION['administratorID'];
        $adminLoggedIn = TRUE;
    }
    else{
        $adminLoggedIn = FALSE;
    }
//END SESSIONING AND DATABASE CONNECTION
$errorMessage ="";

if(isset($_POST['login'])){
    $email = $_POST['administratorEmail'];
    $password = $_POST['administratorPassword'];
    $salt1 = "h@5u*";
    $salt2 = "%!rep";
    $hashedPassword = hash('ripemd128',"$salt1$password$salt2");
    $resultSQL = $mysqli->query("SELECT administratorID, administratorName FROM administrators WHERE administratorEmail='$email' AND administratorPassword='$hashedPassword'");
    $result = $resultSQL->fetch_array();
    if(count($result) >=1){
        $_SESSION['administratorID'] = $result['administratorID'];
        $_SESSION['administratorName'] = $result['administratorName'];
        //$result->free();
        //$errorMessage->free();
        echo "<script type='text/javascript'>window.location='MainMenu.php';</script>";
        
    }
    else{
        $errorMessage = "Incorrect Login!";
    }
}

echo "
<!DOCTYPE html>
<html>
    <title>Administrator Login - Meals On Wheels Dashboard</title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='../css/bootstrap.min.css' rel='stylesheet'/>
    <link href='../css/style-admin.css' rel='stylesheet'  />
</head>
<body>
	<!-- Start Header	-->
    <div class='header'>
        <h1> Administrator Login </h1>
    </div>
	<!-- End Header		-->
    <div class='container'>
        <form method='post'>
            <div class='row-centered'>
                <div class='col-xs-12 col-md-6 col-centered'>
                    <div class='form-group'>
                        <label for=administratorEmail> <h2>E-mail</h2> </label>
                        <input type='text' class='form-control' id='administratorEmail' name='administratorEmail' placeholder='E-Mail' required>
                    </div>
                </div>

                <div class='col-xs-12 col-md-6 col-centered'>
                    <div class='form-group'>
                        <label for=administratorPassword> <h2>Password</h2> </label>
                        <input type='password' class='form-control' id='administratorPassword' name='administratorPassword' placeholder='********' required>
                    </div>
                </div>
            </div>
            <div class='row-centered'>
                <button type='submit' class='btn btn-purple btn-lg row-centered btn-block' id ='login' name='login'>Login</button>
            </div>
        </form>
	       <h2 class='error-message'>".$errorMessage."</h2>
        
        
        
    </div>
    <!-- jQuery Version 1.11.1 -->
    <script src='../js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='../js/jquery.js'></script>	
</body>
</html>
";
?>