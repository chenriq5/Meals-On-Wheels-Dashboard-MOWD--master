<!DOCTYPE html>
<html>
<head>
	<title>Volunteer Meal Menu - Meals On Wheels Dashboard</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<link href='../css/style-volunteer.css' rel='stylesheet'  />
	
</head>
<body>
	<!-- Start Header	-->
    <div class="row header">
            <div class="col-xs-12 col-md-6 col-md-offset-3"><h1>Meal Menu</h1></div>
            <div class="col-xs-12 col-md-1 "><h1><a class="btn btn-primary btn-lg" href="MainMenu.php" role="button">Main Menu</a></h1></div>
            <div class="col-xs-12 col-md-2 "><h1><a class="btn btn-primary btn-lg" href="Logout.php" role="button">Log Out</a></h1></div>
    </div>
	<!-- End Header		-->
    <h2>Check the calender below for today's meal!</h2>
    <object  class="center-block" data="../content/MENU-update.pdf" type="application/pdf" width="75%%" height="100%">
        <p>It appears you don't have a PDF plugin for this browser. That's fine! You can <a href="../content/MENU-update.pdf">click here to download the PDF file.</a></p>
    </object>
    <div class="row-centered">
        <div class="col-xs-12 col-xs-6 col-centered">
            <h2><a class="btn btn-primary btn-lg btn-block" href="MainMenu.php" role="button">Main Menu</a></h2>
        </div>
    </div>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>	
</body>
</html>