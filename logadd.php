<?php
echo"<link rel=\"stylesheet\" href=\"style.css\">";
include_once('header.php');
include_once('/var/www/html/project/hw7-lib.php');
connect($db);

//get user id

         if($stmt=mysqli_prepare($db,"SELECT `User id` from accountInfo order by `User id` DESC limit 1"))

        {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt,$uid);

                 while(mysqli_stmt_fetch($stmt))
                 {

                        $uid=htmlspecialchars($uid);
                }
                        mysqli_stmt_close($stmt);

        }


switch($step)
{
	
	case "1":
	
        $randomnum=rand(0,20);
        $salt=hash('sha256',$randomnum);
        $password=hash('sha256',$userpass.$salt);
        $username=mysqli_real_escape_string($db,$username);
        $password=mysqli_real_escape_string($db,$password);
        $useremail=mysqli_real_escape_string($db,$useremail);
        $jobpost=mysqli_real_escape_string($db,$jobpost);


	$query="select `User id` from accountInfo where `User name`=?";
	if($stmt=mysqli_prepare($db,$query))
	{        	
		mysqli_stmt_bind_param($stmt,"s",$username);
       		 mysqli_stmt_execute($stmt);
        	mysqli_stmt_bind_result($stmt,$chuid);
        	
		while(mysqli_stmt_fetch($stmt))
        	{
                	$chuid=htmlspecialchars($chuid);
        	}
	}
	if($chuid!=NULL)
	{
        	echo"<center><b>User name already exists.</br>
		<a href=/project/logup.php>Try another User Name</a></b></center>";

	}
	

	//query data in if user name is valid
	else
	{
        	 if($stmt=mysqli_prepare($db,"INSERT into accountInfo set `User id`='',Email=?,Role=?,Password=?,Salt=?,`User name`=?"))//query to change password
                 {
                        mysqli_stmt_bind_param($stmt,"sssss",$useremail,$jobpost,$password,$salt,$username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                 }

		if($jobpost=="JobApply")
		{
	  		header("Location: /project/logup.php?sval=1"); 
		}
		else
		{
			header("Location: /project/logup.php?sval=3"); 

		}
	}
	break;

	case "2":
	$comp = $_POST['comp'];
	$postname = $_POST['postname'];
	$yr = $_POST['yr'];
	$exam = $_POST['exam'];
        $passyear = $_POST['passyear'];
        $res = $_POST['res'];


	//quering all data into the database

	if($stmt=mysqli_prepare($db,"SELECT `User id` from accountInfo order by `User id` DESC limit 1"))

	{
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$uid);

		 while(mysqli_stmt_fetch($stmt))
                 {

			$uid=htmlspecialchars($uid);
		}
			mysqli_stmt_close($stmt);

	}


	  if($stmt=mysqli_prepare($db,"INSERT into `Job Seeker` set `Apply id`='',`Full name`=?, DOB=?, Address=?,`User id`=$uid"))
                {

			mysqli_stmt_bind_param($stmt,"sss",$fullname,$dob,$add);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);

                }
	

	foreach( $comp as $key => $n ) 
	{

                if($stmt=mysqli_prepare($db,"INSERT into `Work Ex` set `Work Id`='', Company=?, Post=?, Years=?,`User id`=$uid"))

		{

			mysqli_stmt_bind_param($stmt,"sss",$n,$postname[$key],$yr[$key]);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);

		}

	}

	
        foreach( $exam as $key2 => $e )
        {

		if($stmt=mysqli_prepare($db,"INSERT into `Qualification` set `Qual Id`='', Exam=?, `Pass Year`=?,GPA=?,`User id`=$uid"))

                {
	                mysqli_stmt_bind_param($stmt,"sss",$e,$passyear[$key2],$res[$key2]);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);

                }

        }

	//redirecting to resume.php
	header("Location: /project/logup.php?sval=2"); 

	break;

	case "3":

	
	 if($stmt=mysqli_prepare($db,"SELECT `User id` from accountInfo order by `User id` DESC limit 1"))

        {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt,$uid);

                 while(mysqli_stmt_fetch($stmt))
                 {

                        $uid=htmlspecialchars($uid);
                }
                        mysqli_stmt_close($stmt);

        }

	//loading resume into a directory and quering the resume name into the table

	if(isset($_POST['subres']) && $_FILES['resume']['size'] > 0)
	{
		$fileName = $_FILES['resume']['name'];
		$tmpName  = $_FILES['resume']['tmp_name'];
		$fileType = $_FILES['resume']['type'];
		$filesize = $_FILES['resume']['size'];



     
	 $file = rand(1000,100000)."-".$_FILES['resume']['name'];
	 $folder="/var/www/html/project/uploads/";
 
	 move_uploaded_file($tmpName,"/var/www/html/project/uploads/$file" );



		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		fclose($fp);


	  if($stmt=mysqli_prepare($db,"INSERT into Resume set `Resume Id`='', `Resume name`=?,Size=?,Type=?,Content=?,`User id`=?"))

                {
                        mysqli_stmt_bind_param($stmt,"sssss",$file,$fileSize,$fileType,$content,$uid);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);

                }
	}
	echo"<input type=hidden name=s value=5>";
	logout();
	header("Location: /project/add.php"); 


	break;

	case "4":

	//quering data into the database
	 if($stmt=mysqli_prepare($db,"INSERT into `Job Post` set `Post Id`='',`Company Name`=?,`Office Address`=?,Contact=?,`User id`=?"))
                 {
                        mysqli_stmt_bind_param($stmt,"ssss",$postComp,$postAdd,$postCont,$uid);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                 }
	session_destroy();
	header("Location: /project/logup.php?sval=4"); 

	break;

	case "5":

	//quering data into the database
   	if($stmt=mysqli_prepare($db,"INSERT into `Jobs` set `Job id`='',`Job Title`=?,`Vacancy`=?,`Job Description`=?,`Job Requirement`=?,`Salary`=?,`Deadline`=?,`User id`=?"))
                 {
                        mysqli_stmt_bind_param($stmt,"sssssss",$jTitle,$jVac,$jDesc,$jReq,$jSal,$jDead,$uid);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                 }

	header("Location: /project/login.php"); 

	break;

	}
?>
