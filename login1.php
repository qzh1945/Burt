<?php 
    try{
		require_once('dbconnect.php');
	$db=getConnection();

	$user=$_POST['email'];

	$qry=$db->query("SELECT password FROM members WHERE email='$user'");
	
	$a=$qry->fetch();
	if(password_verify($_POST['password'],$a[0])){
	date_default_timezone_set('Europe/London');
    $date = date('Y-m-d H:i:s');
	$sql='UPDATE members SET lastLogin="'.$date.'" WHERE email="'.$user.'" and password="'.$pass.'"';
    $db->query($sql);
	$count=$qry->rowCount();
	
	if($count>0){
			if(isset ($_SESSION['login_username']))
			{
				session_destroy();
			}
			session_start();
			$_SESSION['login_username'] = $user;
			header("location: homepage.php");
	}     
	else{
		header("location:login.php");
		echo "Email not recognised";
	
	}
	}
	else {
		
		echo "please check your password";}
	}
	catch( PDOException $e ) {
		echo $e->getMessage();
		}
	
?>
