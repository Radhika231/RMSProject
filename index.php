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



include_once('header.php'); //including the header file
include_once('/var/www/html/project/hw7-lib.php'); //including the lib file
connect($db); // connecting to database

echo"<link rel=stylesheet href=style.css>"; //style sheet

//using function icheck to check if the variables are assigned numeric values
icheck($s);

//to switch between different pages in the application
switch($s)
{
	//Search for company names on welcome page
	case "1":

	  if($stmt=mysqli_prepare($db,"SELECT `Job Title`,Vacancy,`Job Description`,`Job Requirement`,Salary,Deadline from Jobs j,`Job Post` a where a.`Company Name`=? and a.`User id`=j.`User id`"))
                   {

                        mysqli_stmt_bind_param($stmt,"s",$search);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$jbT,$jbV,$jbD,$jbR,$jbS,$jbDl);
                        while(mysqli_stmt_fetch($stmt))
                         {
					echo"<section class=searchform cf><table><tr><td><h2>$jbT</h2></td></tr>
					<tr><td>Job Description: </td></tr>
					<tr><td><p>$jbD</p></td></tr>
					<tr><td>Job Requirement:</td></tr>
					<tr><td><p>$jbR</p></td></tr>
					<tr><td>Salary: $jbS</td></tr>
					<tr><td>Number of vacancy: $jbV</td></tr>
					<tr><td>Last date to apply: $jbDl </td</tr>					
					<form method =post action=add.php>
					<input type=hidden name=s value=6>
					<input type=hidden name=jbT value=\"$jbT\">
					<tr><td><input type=submit name=connect value=Connect></td></tr></table></section>";
                        }
			if($jbT==NULL)
			{
				echo"<h2>Job not found</h2>";
			}
                        mysqli_stmt_close($stmt);
                }

	break;


	//welcome page

	default: 
	echo"<meta http-equiv=\"refresh\" content=\"10\" >";

	$caps=strtoupper("$postUser");
	echo"<section class=loginform cf><center><h1> WELCOME $caps</h1>
	<h2><p>If you are looking for a job or talented new employees, you are at the right place.<br>\n
	CareerBoost helps you connect to various recruiters and job seekers.</p></h2>";
	echo"<form method=post action=index.php>
	<input type=text name=search placeholder=\"search company\" required>
	<input type=hidden name=s value=1>
	<input type=submit value=\"BROWSE JOBS\">
        </form></center>";


	
	break;

}

//function to check if a variable entered is a number
function icheck($i)
{	
	if($i!=null) //checks if the variable is initialized or not
	{
		if(!is_numeric($i)) //checks if the variable is a number

		{
			print "<b> ERROR: </b> // if the variable is not a number, prints an error
			Invalid Syntax.";
			exit;
		}
	}
}

echo"</body></html>";
?>


