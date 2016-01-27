<?php
    session_start();
    echo "
        <!DOCTYPE html>
        <html>
        <head>";
    include_once 'databaseConnect.php';
    
    if (isset($_SESSION['userID']))
    {
        $userName = $_SESSION['userName'];
        $userID = $_SESSION['userID'];
        $loggedIn = TRUE;
    }
    else 
    {
    	$loggedIn = FALSE;
	}    

    echo "
        <meta http-equiv='Content-Type content='text/html, charset=utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='../css/bootstrap.min.css' rel='stylesheet'/>
         ";
?>
