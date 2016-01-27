<?php
include_once '../startEverything.php';
if(isset($_POST['login'])){
    $email = $_POST['volunteerEmail'];
    $password = $_POST['volunteerPassword'];
    $salt1 = "h@5u*";
    $salt2 = "%!rep";
    $hashedPassword = hash('ripemd128',"$salt1$password$salt2");
    $resultSQL = $mysqli->query("SELECT id, name FROM volunteers WHERE email='$email' AND password='$hashedPassword'");
    $result = $resultSQL->fetch_array();
   	if(count($result) >=1){
        $_SESSION['userID'] = $result['id'];
        $_SESSION['userName'] = $result['name'];
        $result='';
        $errorMessage='';
        echo "<script type='text/javascript'>window.location='MainMenu.php';</script>";
        
    }
    else{
        $errorMessage = "Invalid Login!";
    }
}


echo "
    <title>Volunteer Login - Meals On Wheels Dashboard</title>
    <link href='../css/bootstrap.min.css' rel='stylesheet'/>
	<link href='../css/style-volunteer.css' rel='stylesheet'/>
</head>
<body>
	<!-- Start Header	-->
    <div class='header'>
        <h1> Volunteer Login </h1>
    </div>
	<!-- End Header		-->
    <div class='container'>
        <form method='post'>
            <div class='row-centered'>
                <div class='col-xs-12 col-md-6 col-centered'>
                    <div class='form-group'>
                        <label for=volunteerEmail> <h2>E-mail</h2> </label>
                        <input type='text' class='form-control' id='volunteerEmail' name='volunteerEmail' placeholder='E-Mail' required>
                    </div>
                </div>

                <div class='col-xs-12 col-md-6 col-centered'>
                    <div class='form-group'>
                        <label for=volunteerPassword> <h2>Password</h2> </label>
                        <input type='password' class='form-control' id='volunteerPassword' name='volunteerPassword' placeholder='********' required>
                    </div>
                </div>
            </div>
            <div class='row-centered'>
                <button type='submit' class='btn btn-primary btn-lg row-centered btn-block' id ='login' name='login'>Login</button>
            </div>
        </form>
	       <h2 class='error-message'>".$errorMessage."</h2>
        <hr>  
        
        
    </div>
    <!-- jQuery Version 1.11.1 -->
    <script src='js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='js/bootstrap.min.js'></script>	
</body>
</html>";
?>