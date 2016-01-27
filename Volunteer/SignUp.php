<?php
include_once '../startEverything.php';

if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordRepeat'];
    $name = $_POST['fullName'];
    $birthday = $_POST['birthday'];
    $phonenumber = $_POST['phoneNumber'];
    $emergencyphonenumber = $_POST['emergencyPhoneNumber'];
    $monday = $_POST['Monday'];
    $tuesday = $_POST['Tuesday'];
    $wednesday = $_POST['Wednesday'];
    $thursday = $_POST['Thursday'];
    $friday = $_POST['Friday'];
    $saturday = $_POST['Saturday'];
    $sunday = $_POST['Sunday']; 
    if($monday) $monday = 1;
    if($tuesday) $tuesday = 1; 
    if($wednesday) $wednesday = 1; 
    if($thursday) $thursday = 1; 
    if($friday) $friday = 1; 
    if($saturday) $saturday = 1; 
    if($sunday) $sunday = 1;   
    
    $salt1 = "h@5u*";
    $salt2 = "%!rep";
    $hashedPassword = hash('ripemd128',"$salt1$password$salt2");
    
    
    if( $mysqli->query("INSERT INTO volunteers VALUES(NULL,'$email','$hashedPassword','$name','$birthday','$phonenumber','$emergencyphonenumber','$monday','$tuesday','$wednesday','$thursday','$friday','$saturday','$sunday')") === TRUE){
            //echo "User was added";
            echo "<script type='text/javascript'>window.location='Login.php';</script>";
    }
}

echo "
    <title>Volunteer Main Menu - Meals On Wheels Dashboard</title>
</head>
<body>

<!-- Start Header	-->
     <div class= 'row header'>
         <div class='col-xs-12 col-md-6 col-md-offset-3'><h1>Sign Up</h1></div>
             <div class='col-xs-12 col-md-1 col-md-offset-1'><h1><a class='btn btn-primary btn-lg' href='Login.php' role='button'>Return to Login</a></h1></div>
             <!--<div class='col-xs-12 col-md-1 '><h1><a class='btn btn-primary btn-lg' href='#' role='button'>Communities</a></h1></div> -->
         </div>
     </div>
    <!-- End Header		-->
    
    <!-- Start Form     -->
    <div class='container'>
        <form class='form-horizontal' method='post'>
            <h2>Login Information:</h2>
            <div class='form-group'>
                <label for='email' class='col-sm-2 control-label'>E-mail</label>
                <div class='col-sm-10'>
                    <input type='email' class='form-control' id='email' name='email' placeholder='JohnSmith@MailProvider.com' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required>
                </div>
            </div>
            <div class='form-group'>
                <label for='password' class='col-sm-2 control-label'>Password</label>
                <div class='col-sm-10'>
                    <input type='password' class='form-control' id='password' name='password'  placeholder='********' required>
                </div>
            </div>
            <div class='form-group'>
                <label for='passwordRepeat' class='col-sm-2 control-label'>Repeat Password</label>
                <div class='col-sm-10'>
                    <input type='password' class='form-control' id='passwordRepeat' name='passwordRepeat' placeholder='********' required>
                </div>
            </div>

            <hr>
            
            <h2>Personal Information:</h2>
            
            <div class='form-group'>
                <label for='fullName' class='col-sm-2 control-label'>Full Name</label>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' id='fullName' name='fullName' placeholder='John Smith' required>
                </div>  
            </div>
            
            <div class='form-group'>
                <label for='birthday' class='col-sm-2 control-label'>Birthday</label>
                <div class='col-sm-10'>
                    <input type='date' class='form-control' id='birthday' name='birthday' placeholder='YYYY-MM-DD' pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}' required>
                </div>  
            </div>
            
            <div class='form-group'>
                <label for='phoneNumber' class='col-sm-2 control-label'>Phone #</label>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' id='phoneNumber' name='phoneNumber' placeholder='XXX-XXX-XXXX' pattern = '[0-9]+-[0-9]{3}-[0-9]+' required>
                </div>  
            </div>
            
            <div class='form-group'>
                <label for='emergencyPhoneNumber' class='col-sm-2 control-label'>Emergency Contact #</label>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' id='emergencyPhoneNumber' name='emergencyPhoneNumber' placeholder='XXX-XXX-XXXX' pattern = '[0-9]+-[0-9]{3}-[0-9]+'  required>
                </div>  
            </div>
            
            <hr>
            
            <h2>Schedule: </h2>
            <div class='form-group'>
                <h3>
                <div class='col-xs-12 col-md-4 checkbox'>
                    <label><input type='checkbox' name='Monday' value='Monday'>Monday</label>
                </div>
                <div class='col-xs-12 col-md-4 checkbox'>
                    <label><input type='checkbox' name='Tuesday' value='Tuesday'>Tuesday</label>
                </div>
                <div class='col-xs-12 col-md-4 checkbox'>
                    <label><input type='checkbox' name='Wednesday' value='Wednesday'>Wednesday</label>
                </div>
                <div class='col-xs-12 col-md-4 checkbox'>
                    <label><input type='checkbox' name='Thursday' value='Thursday'>Thursday</label>
                </div>
                <div class='col-xs-12 col-md-4 checkbox'>
                    <label><input type='checkbox' name='Friday' value='Friday'>Friday</label>
                </div>
                <div class='col-xs-12 col-md-4 checkbox'>
                    <label><input type='checkbox' name='Saturday' value='Saturday'>Saturday</label>
                </div>
                <div class='col-xs-12 col-md-4 checkbox'>
                    <label><input type='checkbox' name='Sunday' value='Sunday'>Sunday</label>
                </div>
                </h3>
            </div>
            <button type='submit' class='btn btn-primary btn-lg row-centered btn-block' id='signup' name='signup'>Submit</button>
        </form>
    </div>
    <!-- End Form       -->
    <br>
    
    
    
    <!-- jQuery Version 1.11.1 -->
    
    <script src='js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='js/bootstrap.min.js'></script>	
</body>
</html>";
?>

