<?php

include_once('/var/www/html/project/hw7-lib.php');

echo"<html>  
<head>  
<title> careerBoost </title> 
</head> 
<body>  
<center>";  

session_start();
$postUser=$_SESSION['User_Name'];

echo"<h2><a href=index.php> Home </a>  |   
<a href=add.php?s=5> Profile</a> |";
if(isset($postUser))
{
echo"<a href=add.php?s=92>Logout </a>|";
}
if(!isset($postUser))
{
echo"<a href=add.php>Login </a>|";
}
echo"<a href=logup.php>Register</a></h2>
 <hr> ";
?>
