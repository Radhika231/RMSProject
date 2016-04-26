<?php

// Name : Radhika Paryekar
// Purpose : A php page that parses multiple choice list to read different files, days of the week, and an etc directory
// Author : radhika.paryekar@colorado.edu
// Version : 2.1
// Date :

echo "<html><body><title>TLEN 5839 HW2 : RADHIKA PARYEKAR</title>"; //title of page 
isset($_REQUEST["opt"]) ? $opt=$_REQUEST['opt']:$opt=""; 

if($opt==null)
{
	echo" <form> <form method=post action=hw2.php> 
	<select name =\"opt\">  // drop down menu with integer post variable opt
	<option value=\"\"> Select ..</option>
	<option value=\"0\"> File 1 </option>
	<option value=\"1\"> File 2 </option>
	<option value=\"2\"> File 3 </option>
	<option value=\"3\"> File 4 </option>
	<option value=\"4\"> Days of the week </option>
	<option value=\"5\"> Listing of etc directory </option>
	<input type=\"submit\" value=\"submit\"></select> </form>";
} //if

else if(opt!=null && is_numeric($opt))
{

	switch ($opt)
	{
		case "0": //To read file1
		fileread("file1");
		break;

		case "1": //To read file 2
		fileread("file2");
		break;

		case "2": //To read file 3
		fileread("file3");
		break;

		case "3": //To read file 4
		fileread("file4");
		break;

		case "4": //To read days of the week
		$days=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");

		for ($i=0; $i<7; $i++)
		{
			$d= $i+1;
			echo"Day $d of the week is ";
			echo $days[$i];
			echo "<br>\n";
		}//for
  		break;

		case "5": //To open the directory etc
		$path='/etc';
		$files=scandir($path);
		echo"<table style=\"width:50%\">";
		echo"<table border=1>";
		echo"<tr bgcolor=\"yellow\"><th>File Name</th><th>Type</th></tr>";

		$cnt=0;
		foreach($files as $file)
		{
			
			$type=filetype($path.'/'.$file);
			coloralternator($cnt,$file,$type);
			$cnt++;
			
		}//foreach
		echo"</table>";
	}//switch
}//else if

else  // if post variable is not an integer
{
	echo"ERROR : The variable is not a digit";
}//else


function fileread($f) //function to read all files
{
	$lines=file("$f.txt");
	$count=0;

	foreach($lines as $line)
	{
		if($count<100 &&  substr($line,0,1)!='#') // Does not read line starting with #
			{
				echo"$line<br>\n";
				$count++;
			} //if
	} //foreach
} //function

function coloralternator($c,$f,$t) //function to get alternate background color for each line
{
	if($c%2==0)
	{
		echo"<tr bgcolor=\"blue\"><td>$f</td><td>$t</br></td></tr>"; //Background color
	} //if
	else
	{
		echo"<tr bgcolor=\"yellow\"><td>$f</td><td>$t</td></tr>"; //Background color
	} //else

} //function

echo "</body></html>";
?>

