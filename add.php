<?php

	
// Name : Radhika Paryekar
// Purpose : A web based recruitment management system
// Web application that allows people with either of the two roles to register: job recruiters, job seekers
// Job seekers can add all their personal details, work experience and qualifications
// Job seekers can also upload their resume for job recruiters to see
// Job seekers can search for jobs using company names and apply for the same
// Job recruiters can add all their details, company name, job title, description andd qualifications
// Both Job seekers and recruiters can see their profile which displays all the details they added in the database
// Job recruiters will get the details of the applicants and their cover letter in the applications tab
// Job seekers can check out various jobs in the job boards
// Only one user can be logged in from a browser at a time
// Author : radhika.paryekar@colorado.edu
// Version : 10.1
// Date  : 03/15/16

session_start();

include_once('/var/www/html/project/hw7-lib.php');

echo"<meta http-equiv=\"refresh\" content=\"2\" >"; //auto refresh

connect($db);

echo"<link rel=stylesheet href=style.css>"; //style sheets
echo"<link rel=stylesheet href=style2.css>";


if(!isset($_SESSION['authenticated']))  
{
	authenticate($db,$postUser,$postPass);  //check if user is authenticated
}

	$postUser=$_SESSION['User_Name'];

    	$postUser=mysqli_real_escape_string($db,$postUser);

	if($stmt=mysqli_prepare($db, "SELECT Role from accountInfo where `User name`=?"))
                {
                        mysqli_stmt_bind_param($stmt,"s",$postUser);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$rl);
                       while(mysqli_stmt_fetch($stmt))
                        {
                                $rl=htmlspecialchars($rl);

                        }
                        mysqli_stmt_close($stmt);
                }


echo"</head>
<body>
<center>
<h2><a href=index.php> Home </a>  |
<a href=add.php?s=5> Profile</a> |
<a href=add.php?s=92>Logout</a>|
<a href=add.php?s=9>JobBoard</a>|
<a href=logup.php>Register</a>";



if($rl=="JobPost")
{
	echo"|<a href=add.php?s=8> Applications</a></h2>";
}

echo"<hr>";




checkAuth();

icheck($s);			//calls function icheck to check if variable is a number


switch($s)
{

	default;
	 //Redirects to a web form wherein you can add new characters, their race and side.
        case "5":
                //php web form

		 echo"<style>
                 table, th, td {
                 	 border: 1px solid black;
	                 border-collapse: collapse;
        	         width :60%;
                	 height:20%;
	                 padding: 10px;
        	         text-align:left;

                }

                </style>";


	//Querying the data for profile with role of job posting
	if($rl=="JobPost")
	{
		$postUser=mysqli_real_escape_string($db,$postUser);

        	if($stmt=mysqli_prepare($db, "SELECT u.`User id`,`Email`, Role,`Company Name`,`Office Address`,`Contact` from accountInfo u,`Job Post` j  WHERE u.`User id`=j.`User id` and `User name`=?"))
                {
                        mysqli_stmt_bind_param($stmt,"s",$postUser);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$usid,$email,$role,$company,$offadd,$cont);
                        while(mysqli_stmt_fetch($stmt))
                        {
                                $email=htmlspecialchars($email);
                                $role=htmlspecialchars($role);
				echo"<table style><tr><td><b>Name: </b>$postUser</td></tr>
				<tr><td><b>Email Id: </b> $email</td></tr>
				<tr><td><b>Role: </b> $role</td></tr>
				<tr><td><b>Company Name: </b> $company</td></tr>
				<tr><td><b>Office Address: </b>$offadd</td></tr>
				<tr><td><b>Contact:</b> $cont</td></tr><br></table>";

                        }
                        mysqli_stmt_close($stmt);
                }


       		 echo "</br><table><tr><td><b><u>JOBS POSTED:</b></u></td></tr></table>";

        	//quering data for job description
		 $usid=mysqli_real_escape_string($db,$usid);

	        if($stmt=mysqli_prepare($db, "SELECT `Job Title`, `Vacancy`,`Job Description`,`Job Requirement` from Jobs where `User id`=?"))
                {
                        mysqli_stmt_bind_param($stmt,"s",$usid);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$jobt,$jobv,$jobd,$jobr);
                        while(mysqli_stmt_fetch($stmt))
                        {
                                $jobt=htmlspecialchars($jobt);
                                $jobv=htmlspecialchars($jobv);
                                $jobd=htmlspecialchars($jobd);
                                $jobr=htmlspecialchars($jobr);
                                echo"<table style><tr><td><b>Job Title: $jobt</b></td></tr>
                                <tr><td><b>Vacancy: $jobv</b></td></tr>
                                <tr><td><b>Job Description:</b> $jobd</td></tr>
                                <tr><td><b>Job Requirement:</b> $jobr</td></tr></table>";

                        }
                        mysqli_stmt_close($stmt);
                }


		echo"</table></section>";

	}

	//Quering the data for profile with role of applying for jobs


	else
	{
        	$postUser=mysqli_real_escape_string($db,$postUser);

  		if($stmt=mysqli_prepare($db, "SELECT `Full name`,Email,DOB,Address from `Job Seeker` j,accountInfo a  where a.`User name`=? and a.`User id`=j.`User id`"))
                {
                        mysqli_stmt_bind_param($stmt,"s",$postUser);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$fname,$fmail,$fdob,$fadd);
                        while(mysqli_stmt_fetch($stmt))
                        {
                                $fname=htmlspecialchars($fname);
                                $fdob=htmlspecialchars($fdob);
                                $fmail=htmlspecialchars($fmail);
                                $fadd=htmlspecialchars($fadd);

                                echo"<table style><tr><td><b>Name: </b>$fname</td></tr>
                                <tr><td><b> Email Id: </b> $fmail</td></tr>
                                <tr><td><b> Date of Birth: </b>$fdob</td></tr>
                                <tr><td><b> Address: </b>$fadd</td></tr></table></br>";

                        }
                        mysqli_stmt_close($stmt);
                }

	//quering data for qualification
	echo"<table><tr><td>Qualification:</table> 
	<table style><tr><th>University</th><th>Passing Year</th><th>GPA</th></tr>";

	if($stmt=mysqli_prepare($db, "SELECT Exam,`Pass Year`,GPA from Qualification q,accountInfo a  where a.`User name`=? and a.`User id`=q.`User id`"))
                {
                        mysqli_stmt_bind_param($stmt,"s",$postUser);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$fexam,$fpassy,$gpa);
                        while(mysqli_stmt_fetch($stmt))
                        {
                                $fcomp=htmlspecialchars($fexam);
                                $fpost=htmlspecialchars($fpassy);
                                $fyear=htmlspecialchars($fgpa);

                                echo"<tr><td>$fexam</td><td>$fpassy</td><td>$gpa</td></tr>";

                        }
                        mysqli_stmt_close($stmt);
                }
	echo"</table>";

	//quering data for work experience
	echo"</br><table><tr><td>Work Experience:</table>
        <table style><tr><th>Company</th><th>Post</th><th>Years of Experience</th></tr>";

	if($stmt=mysqli_prepare($db, "SELECT Company,Post,Years from `Work Ex` w,accountInfo a  where a.`User name`=? and a.`User id`=w.`User id`"))
                {
                        mysqli_stmt_bind_param($stmt,"s",$postUser);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$fcomp,$fpost,$fyear);
                        while(mysqli_stmt_fetch($stmt))
                        {
                                $fcomp=htmlspecialchars($fcomp);
                                $fpost=htmlspecialchars($fpost);
                                $fyear=htmlspecialchars($fyear);

                                echo"<tr><td>$fcomp</td><td>$fpost</td><td>$fyear</td></tr>";

                        }
                        mysqli_stmt_close($stmt);
                }


	echo"</table>";

	 //quering data for resume
	  if($stmt=mysqli_prepare($db, "SELECT `Resume Name` from Resume r, accountInfo a  where `User name`=? and r.`User id`=a.`User id` "))
		{

                        mysqli_stmt_bind_param($stmt,"s",$postUser);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$rname);
                        while(mysqli_stmt_fetch($stmt))
                        {
                                $rname=htmlspecialchars($rname);
				echo"<table style><tr><td><a href=uploads/$rname>Here's a link to my Resume.</a>
				</td></tr></table>";


                        }
                        mysqli_stmt_close($stmt);
		}

	}


        break;

        //Adds the character to the database.
        //Redirects to a web form wherein you can paste the picture url of that character.


 
        case "6":

	//Quering data for applicant to send message
         $jbT=mysqli_real_escape_string($db,$jbT);        

        if($stmt=mysqli_prepare($db,"Select j.`User id`,`User name`,`Office Address`,`Contact` from accountInfo a, `Job Post` j, Jobs s  where s.`Job Title`=? and s.`User id`=j.`User id` and s.`User id`=a.`User id`"))
               	{
                        	mysqli_stmt_bind_param($stmt,"s",$jbT);
	                        mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt,$rid,$un,$oa,$cn);
				
				   while(mysqli_stmt_fetch($stmt))
                                        {
                                                $rid=htmlspecialchars($rid);
                                                $un=htmlspecialchars($un);
                                                $oa=htmlspecialchars($oa);
                                                $ca=htmlspecialchars($cn);
						echo"<table><tr><td>Recruiter Name: $un</td></tr>
						<tr><td>Job Title : $jbT</td></tr>
						<tr><td>Office Address: $oa</td></tr>
						<tr><td>Contact: $cn</td></tr>";
                                        }
                        		mysqli_stmt_close($stmt);

               	 }
						echo"<tr><td><form method =post action =add.php>
						<tr><td>Message: (Type a message to be sent to the job recruiter in addition to your profile information)</td><tr>
						<tr><td>To: $un</td><tr>
                                                <tr><td><textarea cols=\"60\" rows =\"20\" name=ta placeholder=\"cover letter\" required></textarea></td></tr>
						<input type=hidden name=un value=$un>
						<input type=hidden name=rid value=$rid>
						<input type=hidden name=s value=7>
						<tr><td><input type=submit value=SEND></td></tr>
                                                </form></td></tr></table>";


        break;



	case "7":

	//query to insert applicants message

         $postUser=mysqli_real_escape_string($db,$postUser);        

	 if($stmt=mysqli_prepare($db,"SELECT `User id` from accountInfo where `User name`=?"))

                {
                                mysqli_stmt_bind_param($stmt,"s",$postUser);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_bind_result($stmt,$auid);
				while(mysqli_stmt_fetch($stmt))
				{
					$auid=htmlspecialchars($auid);
		
				}
                                mysqli_stmt_close($stmt);

                 }

         $un=mysqli_real_escape_string($db,$un);        
         $ta=mysqli_real_escape_string($db,$ta);        
         $auid=mysqli_real_escape_string($db,$auid);        


 	if($stmt=mysqli_prepare($db,"INSERT into `Applications` set `Applicant id`='',`Recruiter Name`=?,`Cover Letter`=?,`User id`=?"))
                {
                                mysqli_stmt_bind_param($stmt,"sss",$un,$ta,$auid);
                                mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);

                 }

	echo"<h2>Message sent successfully</h2>";

        break;

	 
        
	case "8":

	//query for job poster to see applicants messages and details

         $postUser=mysqli_real_escape_string($db,$postUser);        

	   if($stmt=mysqli_prepare($db," Select `Full name`,DOB,address,`Cover Letter`,`Resume Name` from Applications a, `Job Seeker` j,Resume r  where a.`Recruiter Name`=? and a.`User id`=j.`User id` and a.`User id`=r.`User id`"))

                {
                                mysqli_stmt_bind_param($stmt,"s",$postUser);
                                mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt,$appname,$appdob,$appadd,$cl,$appr);
				while(mysqli_stmt_fetch($stmt))
                         	{
					$cl=htmlspecialchars($cl);
					$appname=htmlspecialchars($appname);
					echo"<section class =searchform><table><tr><td>Applicant Name : $appname</td></tr>
					<tr><td>Date of Birth: $appdob</td></tr>
					<tr><td>Address: $appadd</td></tr>
					<tr><td><a href=uploads/$appr>Here's a link to my Resume.</a>
					<tr><td>Cover Letter:</td></tr>
					<tr><td>$cl</td></tr><tr></tr></br></table></section>";

				}
					mysqli_stmt_close($stmt);
		}


        break;


	case "9":

	//query for job board
	  if($stmt=mysqli_prepare($db,"SELECT `Job Title`,Vacancy,`Job Description`,`Job Requirement`,Salary,Deadline from Jobs"))
                   {

                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$jbT,$jbV,$jbD,$jbR,$jbS,$jbDl);
                        while(mysqli_stmt_fetch($stmt))
                         {
					echo"<section class=jobform ><table><tr><td><h1>$jbT</h1></td></tr>
                                        <tr><td><b>Job Description:</b> </td></tr>
                                        <tr><td><p>$jbD</p></td></tr>
                                        <tr><td><b>Job Requirement:</b></td></tr>
                                        <tr><td><p>$jbR</p></td></tr>
                                        <tr><td><b>Salary:</b> $jbS</td></tr>
                                        <tr><td><b>Number of vacancy:</b> $jbV</td></tr>
                                        <tr><td><b>Last date to apply:</b> $jbDl </td</tr></table></section>";
			}
                                mysqli_stmt_close($stmt);
		}

	break;

	case "92":
	logout();	//calls function logout
	break;

	
}
		


function icheck($i)
{
        if($i!=null) //checks if the variable is initialized or not
        {
                if(!is_numeric($i)) //checks if the variable is a number
                {
                        print "<b> ERROR: </b> Invalid Syntax.";
							// if the variable is not a number, prints an error
                        exit;
                }
        }
}


?>
