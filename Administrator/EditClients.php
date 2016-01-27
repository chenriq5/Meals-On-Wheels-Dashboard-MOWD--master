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
    <title>Edit Clients - Meals On Wheels Dashboard</title>
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
        <div class='col-xs-12 col-md-6 col-md-offset-3'><h1>Edit Clients</h1></div>
            <div class='col-xs-12 col-md-1 col-md-offset-1'><h1><a class='btn btn-purple btn-lg' href='Logout.php' role='button'>Log Out</a></h1></div>
            <!--<div class='col-xs-12 col-md-1 '><h1><a class='btn btn-primary btn-lg' href='#' role='button'>Communities</a></h1></div> -->
        </div>
    </div>
<!-- End Header		-->
    <br>
    <div class='container'>
        <div id='ClientTableContainer'></div>
        <br>
        <h2><a class="btn btn-purple btn-lg btn-block" href="MainMenu.php" role="button">Main Menu</a></h2>
    </div>

    <script type='text/javascript'>
        $(document).ready(function () {
            $('#ClientTableContainer').jtable({
                title: 'Clients',
                actions: {
                    listAction: 'clientAJAX/ListClient.php',
                    createAction: 'clientAJAX/CreateClient.php',
                    updateAction: 'clientAJAX/UpdateClient.php',
                    deleteAction: 'clientAJAX/DeleteClient.php'
                },
                fields: {
                    clientID: {
                        title: 'Client ID',
                        key: true,
                        create: false
                    },
                    clientName: {
                        title: 'Name',
                        width: '10%'
                    },
                    community: {
                        title: 'Community',
                        width: '10%',
                    },
                    address: {
                        title: 'Address',
                        width: '10%'
                    },
                    phoneNumber: {
                        title: 'Phone #',
                        width: '10%'
                    },
                    information: {
                        title: 'Information',
                        width: '10%',
                        type: 'textarea'
                    },
                    monday: {
                        title: 'MON',
                        width: '5%',
                        type: 'checkbox',
                        values:{ '0' : 'NO', '1' : 'YES'}
                        //display: function (data) {
                        //    var $checkbox = $('<input type="checkbox" disabled="disabled">');
                        //    if (data.record.monday) $($checkbox).prop("checked",true);
                        //    return $checkbox;
                        //}
                    },
                    tuesday: {
                        title: 'TUE',
                        width: '5%',
                        type: 'checkbox',
                        values:{ '0' : 'NO', '1' : 'YES'}
                    },
                    wednesday: {
                        title: 'WED',
                        width: '5%',
                        type: 'checkbox',
                        values:{ '0' : 'NO', '1' : 'YES'}
                    },
                    thursday: {
                        title: 'THU',
                        width: '5%',
                        type: 'checkbox',
                        values:{ '0' : 'NO', '1' : 'YES'}
                    },
                    friday: {
                        title: 'FRI',
                        width: '5%',
                        type: 'checkbox',
                        values:{ '0' : 'NO', '1' : 'YES'}
                    },
                    saturday: {
                        title: 'SAT',
                        width: '5%',
                        type: 'checkbox',
                        values:{ '0' : 'NO', '1' : 'YES'}
                    },
                    sunday: {
                        title: 'SUN',
                        width: '5%',
                        type: 'checkbox',
                        values:{ '0' : 'NO', '1' : 'YES'}
                    }
                }
            });
            $('#ClientTableContainer').jtable('load');
        });
        
    </script>
</body>
</html>