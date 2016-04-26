<?php
echo"<html>
<head>
<title> careerBoost </title>
</head>
<body>
<center>
<h2><a href=index.php> Home </a>  |
<a href=add.php?s=5> Profile</a> |
<a href=add.php?s=92>Logout</a>|
<a href=add.php?s=9>JobBoard</a>|
<a href=logup.php>Register</a>";
if($jobPost=="JobPost")
{
echo"<a href=add.php?s=8>Applications</a></h2>";
}
echo" <hr>";
?>

