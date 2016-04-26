<?php
session_start();

//logout automatically by unsetting previous session if login called in another tab
unset($_SESSION['authenticated']);

include_once('/var/www/html/project/hw7-lib.php');


echo"<html>
<body>
<center>
<link rel=\"stylesheet\" href=\"style.css\">
<h2><a href=index.php> Home </a>  |
<a href=add.php?s=5> Profile</a> |
<a href=add.php>Login </a>|
<a href=logup.php>Register</a></h2>
<hr>


<section class=loginform cf>
<form action=add.php method=post>
<table><tr> <td> Username: </td> <td> <input type=text name=postUser placeholder=example:John required>  </td> </tr>
<tr> <td> Password: </td> <td> <input type=password name=postPass placeholder=password required> </td> </tr>
<input type=hidden name=s value=5></table>
<center><input type=submit name=sub2 value=Login></center>
        

</form>
</section>
</center>
</body>
</html>";
?>




