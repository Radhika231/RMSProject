<?php
session_destroy();
include_once('/var/www/html/project/hw7-lib.php');
echo"<link rel=\"stylesheet\" href=\"style.css\">";
?>

<html>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://apis.google.com/js/client.js\"></script>



<center><h2><a href=index.php>Home </a>  |
<a href=add.php?s=5>Profile</a> |
<a href=add.php>Login </a>|
<a href=logup.php>Register</a></h2></center>
<hr>

<script>

function validatePassword(){
  if(logup.userpass.value != logup.userpassc.value) {

    	alert("Passwords Don't Match");
	return false;
  } 

return true;
}

</script>

<script>

 $(document).ready(function(){
    $("#add_more1").click(function(){
    $(".template").append('<tr><td><input type=text name=exam[] size=25></td><td><input type=date name=passyear[]></td><td><input type=text name=res[] size=2</td></tr>')
    return false;
    });
});

</script>

<script>
 $(document).ready(function(){
    $("#add_more2").click(function(){
    $(".experiences").append('<tr><td><input type=text name=comp[] size=25></td><td><input type=text name=postname[]></td><td><input type=text name=yr[] size=2</td></tr>')
    return false;
    });
});


</script>


<?php

switch($sval)
{

	default:
	echo"<section class=registerform cf><form name=logup action=logadd.php  method=post>

        <table><tr> <td> User Name: </td> <td> <input type=text name=username placeholder=example:John required>  </td> </tr>
        <tr> <td> Email address: </td> <td> <input type=email name=useremail required>  </td> </tr>
        <tr> <td> Password: </td> <td> <input type=password name=userpass placeholder=Enter Password required>  </td> </tr>
        <tr> <td> Confirm Password: </td> <td> <input type=password name=userpassc placeholder=Confirm Password required>  </td> <tr>
	<tr><td> Select your role: <input type=radio button name=jobpost value=JobPost>Job Posting</td>
	<td><input type=radio button name=jobpost value=JobApply>Applying Jobs</td>
	<input type=hidden name=jobPost value=$jobpost>
	<input type=hidden name=step value=1>
	<tr><td><input type=submit name=sub value=submit onclick=\"return validatePassword();\"></table></section>";

	break;

	case 1:


	echo"<section class=registerform cf><form name=login action=logadd.php method=post accept-charset=utf-8>

        <table><tr> <td> Full Name: </td> <td> <input type=text name=fullname placeholder=example:John required>  </td> </tr>
        <tr> <td> Date of Birth: </td> <td> <input type=date name=dob placeholder=required> </td> </tr>
        <tr> <td> Address: </td> <td> <input type=text name=add placeholder=street name required> </td> </tr></br>
        <tr><td> Qualifications: </td> </tr></table>
        <div class=template><table><tr><td>University Name</td><td>Passing Year</td><td>Result </td></tr>
        <tr><td><input type=text name=exam[] size=25></td><td><input type=date name=passyear[]></td><td><input type=text name=res[] size=2></td></tr></table></div>
        <table><td><button id=add_more1>add more</button></td>
        <tr><td>Work Experience:</td></tr></table>
        <div class=experiences><table><tr><td>Company </td><td>Post </td><td>Years </td></tr>
        <tr><td><input type=text name=comp[] size=25></td><td><input type=text name=postname[]></td><td><input type=text name=yr[] size=2></td></tr></table></div>
        <tr><td><button id=\"add_more2\">add more</button></td></tr>
        <p id=\"demo\"></p>
        <input type=hidden name=step value=2>
        <tr> <td colspan=2> <input type=submit name=submit value=NEXT> </td></tr>
        </table></section>";
	break;


	case 2:
	echo"<section class=loginform cf><center>
	<tr><td><h2>Add Resume</h2></td></tr>
	<form action=logadd.php method=post enctype=multipart/form-data >
  	<input type=file name=resume accept=\".pdf,.doc\">
  	<input type=hidden name=step value=3>
  	<input type=submit name=subres>
	</form></section>";
	break;

	case 3:


	echo"<section class=registerform cf><form name=login action=logadd.php method=post accept-charset=utf-8>

        <table><tr> <td> Company Name: </td> <td> <input type=text name=postComp placeholder=required>  </td> </tr>
        <tr> <td> Office Address: </td> <td> <input type=text name=postAdd placeholder=required> </td> </tr>
        <tr> <td>Contact No.: </td> <td> <input type=text name=postCont placeholder=required> </td> </tr></br>
        <input type=hidden name=step value=4>
        <tr> <td colspan=2> <input type=submit name=submit value=Submit> </td></tr>
        </table>

	</form></section>";

	break;

	case 4:

	echo"<section class=registerform cf><form name=login action=logadd.php method=post accept-charset=utf-8>

        <table><tr><center><h3> Post a job:</h3></center></tr>
        <tr> <td> Job Title: </td> <td> <input type=text name=jTitle placeholder=required>  </td> </tr>
        <tr> <td> No. of Vacancy: </td> <td> <input type=text name=jVac placeholder=required> </td> </tr>
        <tr> <td>Job Description: </td></tr></br>
        <tr><td></td><td><textarea cols=\"40\" rows=\"5\" name=jDesc></textarea></td></tr>
        <tr> <td>Job Requirement: </td> </tr>
        <tr><td></td><td><textarea cols=\"40\" rows=\"5\" name=jReq></textarea></td></tr>
        <tr> <td>Salary Range: </td> <td> <input type=text name=jSal placeholder=required> </td> </tr></br>
        <tr> <td>Application Deadline: </td> <td> <input type=date name=jDead placeholder=required> </td> </tr></br>
        <input type=hidden name=step value=5>
        <tr> <td colspan=2> <input type=submit name=submit value=Submit> </td></tr>
        </table>

	</form><section>";

	break;


}

echo"
</section>
</body>
</html>";

?>

