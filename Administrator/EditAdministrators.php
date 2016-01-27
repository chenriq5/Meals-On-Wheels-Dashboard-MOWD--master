<?php
//START SESSIONING AND DATABASE CONNECTION
    session_start();
    include_once '../databaseConnect.php';  
    if (isset($_SESSION['administratorID']))
    {
        $administratorID = $_SESSION['userID'];
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
    <title>Edit Administrators - Meals On Wheels Dashboard</title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='js/jquery-ui/jquery-ui.min.css' rel='stylesheet' type='text/css' />
    <link href='js/jtable/themes/metro/purple/jtable.min.css' rel='stylesheet' type='text/css' />
    <link href='../css/bootstrap.min.css' rel='stylesheet'/>
    <link href='../css/style-admin.css' rel='stylesheet'  />
    
    <script src='js/jquery.js' type='text/javascript'></script>
    <script src='js/jquery-ui/jquery-ui.min.js' type='text/javascript'></script>
    <script src='js/jtable/jquery.jtable.js' type='text/javascript'></script>
</head>
<body>
<!-- Start Header	-->
    <div class= 'row header'>
        <div class='col-xs-12 col-md-6 col-md-offset-3'><h1>Edit Administrators</h1></div>
            <div class='col-xs-12 col-md-1 col-md-offset-1'><h1><a class='btn btn-purple btn-lg' href='Logout.php' role='button'>Log Out</a></h1></div>
            <!--<div class='col-xs-12 col-md-1 '><h1><a class='btn btn-primary btn-lg' href='#' role='button'>Communities</a></h1></div> -->
        </div>
    </div>
<!-- End Header		-->
    <br>
    <div class='container'>
        <div id='AdministratorTableContainer'></div>
        <br>
        <h2><a class="btn btn-purple btn-lg btn-block" href="MainMenu.php" role="button">Main Menu</a></h2>
    </div>

    <script type='text/javascript'>
        $(document).ready(function () {
            $('#AdministratorTableContainer').jtable({
                title: 'Administrators',
                actions: {
                    listAction: 'administratorAJAX/ListAdministrator.php',
                    createAction: 'administratorAJAX/CreateAdministrator.php',
                    updateAction: 'administratorAJAX/UpdateAdministrator.php',
                    deleteAction: 'administratorAJAX/DeleteAdministrator.php'
                },
                fields: {
                    administratorID: {
                        title: 'Administrator ID',
                        key: true,
                        create: false
                    },
                    administratorName: {
                        title: 'Name',
                        width: '20%'
                    },
                    administratorEmail: {
                        title: 'E-mail',
                        width: '20%'
                    },
                    administratorPassword: {
                        title: 'Password',
                        type: 'password',
                        list: false,
                        edit: false
                    }
                }
            });
            $('#AdministratorTableContainer').jtable('load');
        });
        
    </script>
</body>
</html>