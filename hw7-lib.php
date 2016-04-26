<?php

//to check if the variables are set or not
$sval;
isset ( $_REQUEST['s'] ) ? $s = strip_tags($_REQUEST['s']) : $s = "";
isset ( $_REQUEST['step'] ) ? $step = strip_tags($_REQUEST['step']) : $step = "";
isset ( $_REQUEST['sval'] ) ? $sval = strip_tags($_REQUEST['sval']) : $sval = "";
isset ( $_REQUEST['charName'] ) ? $charName = strip_tags($_REQUEST['charName']) : $charName = "";
isset ( $_REQUEST['charRace'] ) ? $charRace = strip_tags($_REQUEST['charRace']) : $charRace = "";
isset ( $_REQUEST['charSide'] ) ? $charSide = strip_tags($_REQUEST['charSide']) : $charSide = "";
isset ( $_REQUEST['charUrl'] ) ? $charUrl = strip_tags($_REQUEST['charUrl']) : $charUrl = "";
isset ( $_REQUEST['submit'] ) ? $submit = strip_tags($_REQUEST['submit']) : $submit = "";
isset ( $_REQUEST['submit2'] ) ? $submit2 = strip_tags($_REQUEST['submit2']) : $submit2 = "";
isset ( $_REQUEST['submit3'] ) ? $submit3 = strip_tags($_REQUEST['submit3']) : $submit3 = "";
isset ( $_REQUEST['submit4'] ) ? $submit4 = strip_tags($_REQUEST['submit4']) : $submit4 = "";
isset ( $_REQUEST['submit5'] ) ? $submit5 = strip_tags($_REQUEST['submit5']) : $submit5 = "";
isset ( $_REQUEST['postUser'] ) ? $postUser = strip_tags($_REQUEST['postUser']) : $postUser = "";
isset ( $_REQUEST['postPass'] ) ? $postPass = strip_tags($_REQUEST['postPass']) : $postPass = "";
isset ( $_REQUEST['randomnum'] ) ? $randomnum = strip_tags($_REQUEST['randomnum']) : $randomnum = "";
isset ( $_REQUEST['newUser'] ) ? $newUser = strip_tags($_REQUEST['newUser']) : $newUser = "";
isset ( $_REQUEST['newPassword'] ) ? $newPassword = strip_tags($_REQUEST['newPassword']) : $newPassword = "";
isset ( $_REQUEST['newEmail'] ) ? $newEmail = strip_tags($_REQUEST['newEmail']) : $newEmail = "";
isset ( $_REQUEST['password'] ) ? $password = strip_tags($_REQUEST['password']) : $password = "";
isset ( $_REQUEST['salt'] ) ? $salt = strip_tags($_REQUEST['salt']) : $salt = "";
isset ( $_REQUEST['changePass'] ) ? $changePass = strip_tags($_REQUEST['changePass']) : $changePass = "";
isset ( $_REQUEST['changeUser'] ) ? $changeUser = strip_tags($_REQUEST['changeUser']) : $changeUser = "";
isset ( $_REQUEST['attempt'] ) ? $attempt = strip_tags($_REQUEST['attempt']) : $attempt = "";
isset ( $_REQUEST['username'] ) ? $username = strip_tags($_REQUEST['username']) : $username = "";
isset ( $_REQUEST['userpass'] ) ? $userpass = strip_tags($_REQUEST['userpass']) : $userpass = "";
isset ( $_REQUEST['useremail'] ) ? $useremail = strip_tags($_REQUEST['useremail']) : $useremail = "";
isset ( $_REQUEST['jobpost'] ) ? $jobpost = strip_tags($_REQUEST['jobpost']) : $jobpost = "";
isset ( $_REQUEST['userid'] ) ? $userid = strip_tags($_REQUEST['userid']) : $userid = "";
isset ( $_REQUEST['role'] ) ? $role = strip_tags($_REQUEST['role']) : $role = "";
isset ( $_REQUEST['randomnum'] ) ? $randomnum = strip_tags($_REQUEST['randomnum']) : $randomnum = "";
isset ( $_REQUEST['fullname'] ) ? $fullname = strip_tags($_REQUEST['fullname']) : $fullname = "";
isset ( $_REQUEST['dob'] ) ? $dob = strip_tags($_REQUEST['dob']) : $dob = "";
isset ( $_REQUEST['add'] ) ? $add = strip_tags($_REQUEST['add']) : $add = "";
isset ( $_REQUEST['uid'] ) ? $uid = strip_tags($_REQUEST['uid']) : $uid = "";
isset ( $_REQUEST['resume'] ) ? $resume = strip_tags($_REQUEST['resume']) : $resume = "";
isset ( $_REQUEST['subres'] ) ? $subres = strip_tags($_REQUEST['subres']) : $subres = "";
isset ( $_REQUEST['content'] ) ? $content = strip_tags($_REQUEST['content']) : $content = "";
isset ( $_REQUEST['filesize'] ) ? $filesize = strip_tags($_REQUEST['filesize']) : $filesize = "";
isset ( $_REQUEST['fileName'] ) ? $fileName = strip_tags($_REQUEST['fileName']) : $fileName = "";
isset ( $_REQUEST['fileType'] ) ? $fileType = strip_tags($_REQUEST['fileType']) : $fileType = "";
isset ( $_REQUEST['tmpName'] ) ? $tmpName = strip_tags($_REQUEST['tmpName']) : $tmpName = "";
isset ( $_REQUEST['folder'] ) ? $folder = strip_tags($_REQUEST['folder']) : $folder = "";
isset ( $_REQUEST['postComp'] ) ? $postComp = strip_tags($_REQUEST['postComp']) : $postComp = "";
isset ( $_REQUEST['postAdd'] ) ? $postAdd = strip_tags($_REQUEST['postAdd']) : $postAdd = "";
isset ( $_REQUEST['postCont'] ) ? $postCont = strip_tags($_REQUEST['postCont']) : $postCont = "";
isset ( $_REQUEST['jSal'] ) ? $jSal = strip_tags($_REQUEST['jSal']) : $jSal = "";
isset ( $_REQUEST['jReq'] ) ? $jReq = strip_tags($_REQUEST['jReq']) : $jReq = "";
isset ( $_REQUEST['jDesc'] ) ? $jDesc = strip_tags($_REQUEST['jDesc']) : $jDesc = "";
isset ( $_REQUEST['jVac'] ) ? $jVac = strip_tags($_REQUEST['jVac']) : $jVac = "";
isset ( $_REQUEST['jTitle'] ) ? $jTitle = strip_tags($_REQUEST['jTitle']) : $jTitle = "";
isset ( $_REQUEST['jDead'] ) ? $jDead = strip_tags($_REQUEST['jDead']) : $jDead = "";
isset ( $_REQUEST['search'] ) ? $search = strip_tags($_REQUEST['search']) : $search = "";
isset ( $_REQUEST['jbT'] ) ? $jbT = strip_tags($_REQUEST['jbT']) : $jbT = "";
isset ( $_REQUEST['jbV'] ) ? $jbV = strip_tags($_REQUEST['jbV']) : $jbV = "";
isset ( $_REQUEST['jbD'] ) ? $jbD = strip_tags($_REQUEST['jbD']) : $jbD = "";
isset ( $_REQUEST['jbR'] ) ? $jbR = strip_tags($_REQUEST['jbR']) : $jbR = "";
isset ( $_REQUEST['jbS'] ) ? $jbS = strip_tags($_REQUEST['jbS']) : $jbS = "";
isset ( $_REQUEST['jbD'] ) ? $jbD = strip_tags($_REQUEST['jbD']) : $jbD = "";
isset ( $_REQUEST['un'] ) ? $un = strip_tags($_REQUEST['un']) : $un = "";
isset ( $_REQUEST['ta'] ) ? $ta = strip_tags($_REQUEST['ta']) : $ta = "";
isset ( $_REQUEST['rid'] ) ? $rid = strip_tags($_REQUEST['rid']) : $rid = "";
isset ( $_REQUEST['rl'] ) ? $rl = strip_tags($_REQUEST['rl']) : $rl = "";
isset ( $_REQUEST['auid'] ) ? $auid = strip_tags($_REQUEST['auid']) : $auid = "";
isset ( $_REQUEST['appname'] ) ? $appname = strip_tags($_REQUEST['appname']) : $appname = "";
isset ( $_REQUEST['jp'] ) ? $jp = strip_tags($_REQUEST['jp']) : $jp = "";




$randomnum=rand(0,20);


function connect(&$db)
{
 $mycnf="/etc/hw5-mysql.conf";

	 if (!file_exists($mycnf))
	{
		echo "Error file not found: $mycnf";
		exit;
	}

	$mysql_ini_array=parse_ini_file($mycnf);
	$db_host=$mysql_ini_array["host"];
	$db_user=$mysql_ini_array["user"];
	$db_pass=$mysql_ini_array["pass"];
	$db_port=$mysql_ini_array["port"];
	$db_name=$mysql_ini_array["dbName"];

	$db = mysqli_connect(
	$db_host,
	$db_user,
	$db_pass,
	$db_name,
	$db_port);

	if (!$db) {
		 print "Error connecting to DB:"
		 .mysqli_connect_error();
		 exit;
	}
}


 function authenticate($db,$postUser,$postPass) //function to check authentication
{
        $ip=$_SERVER['REMOTE_ADDR']; //gets ip address
	$attempt=0;

        $query="select `User id`,Email,`Password`,`Salt`,`Role` from accountInfo where `User name`=?"; //query to get email password salt of the user
        if($stmt=mysqli_prepare($db,$query))
        {

                mysqli_stmt_bind_param($stmt,"s",$postUser);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt,$userid,$email,$password,$salt,$role);

                while(mysqli_stmt_fetch($stmt))
                {
                        $userid=htmlspecialchars($userid);
                        $email=htmlspecialchars($email);
                        $password=htmlspecialchars($password);
                        $salt=htmlspecialchars($salt);
                        $role=htmlspecialchars($role);

                }
                mysqli_stmt_close($stmt);
               $checkpass=hash('sha256',$postPass.$salt);
		



   		$query="select Action from `Job Logins` where ip=? and Date>=DATE_SUB(now(),INTERVAL 1 HOUR)"; //to get number of failed logins in the past 1 hour
                  if($stmt=mysqli_prepare($db,$query))
                  {

                        mysqli_stmt_bind_param($stmt,"s",$ip);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt,$action);

                         while(mysqli_stmt_fetch($stmt))
                        {
                                $action=htmlspecialchars($action);
                                if($action=='fail') //counts failed logins
                                {
                                        $attempt=$attempt+1;
                                }
                        }
                }

	   	if($attempt>=5) //blocks after attempts exceed 5
                   {

                                echo"<center><b>user is blocked</b></center>";
                                unset($_SESSION['authenticated']);
                                exit;

                   }
             	
		else
		{

                        if($checkpass==$password) //checks if password entered matched the password in database
                        {

				session_regenerate_id();
                                $_SESSION['authenticated']="yes";
				$_SESSION['User_Name']=$postUser;
				$_SESSION['User_Role']=$rl;
				$_SESSION['userid']=$userid;
                                $_SESSION['email']=$email;
                                $_SESSION['authenticated']="yes";
                                $_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
                                $_SESSION['HTTP_USER_AGENT']=md5($_SERVER['SERVER_ADDR'].$_SERVER['HTTP_USER_AGENT']);
                                $_SESSION['created']=time();
				


                        }
			else
			{

				if($postUser!=NULL)
                                {

                                         if($stmt=mysqli_prepare($db,"INSERT INTO `Job Logins` set `Logs Id`='',ip=?,User=?,Date=now(),Action='fail'"))
                                        {
                                                mysqli_stmt_bind_param($stmt,"ss",$ip,$postUser);
                                                mysqli_stmt_execute($stmt);
                                        }
				}                      

                                echo"Failed to login $postUser $checkPass $password";
                                error_log("**ERROR**: careerBoost app has failed login from".$_SERVER['REMOTE_ADDR'],0);
			        header("Location: /project/login.php");

                                exit;
			}
		}
	}
}



function logout()
{
        session_destroy();      //destroys session
        header("Location: /project/login.php");     //redirects to login page
}


function checkAuth()//function to set session for user agent, ip, time created
{
        if(isset($_SESSION['HTTP_USER_AGENT']))
        {
                if($_SESSION['HTTP_USER_AGENT']!=md5($_SERVER['SERVER_ADDR'].$_SERVER['HTTP_USER_AGENT']))
                {
                        logout();
                }
        }
        else
        {
                logout();
        }

        if(isset($_SESSION['ip']))
        {
                if($_SESSION['ip']!=$_SERVER['REMOTE_ADDR'])
                {
                        logout();
                }
        }
        else
        {
                logout();
	}
        if(isset($_SESSION['created']))//timeout
        {
                if(time()-$_SESSION['created']>1800)
                {
                        logout();
                }
        }
        else
        {
                logout();
        }
         if("POST"==$_SERVER["REQUEST_METHOD"])
        {
                if(isset($_SERVER["HTTP_ORIGIN"]))
                {
                        if($_SERVER["HTTP_ORIGIN"]!="https://100.66.1.50")
                        {
                                logout();
                        }
                }
		   else
                {
                        logout();
                }
        }

}



?>
