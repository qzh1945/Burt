<html>

<head><title>BOOK<img src='pics/head.jpg' width=150 height=150 align=auto></a></title>
    <br>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="HD.css" type="text/css">

</head>
<body>

<?php
session_start();
/*Location variable created so once logged out user will return to previous page*/
$Location = $_SERVER['REQUEST_URI'];

if(isset($_SESSION['login_username']))
{

    echo "	
			<center><img src='pics/head.jpg' width=150 height=150 align=auto><br><h7>BOOK</h7></a></center>	
			<center>
			<div class=navbar>			
			<a href=homepage.php style='margin-left: 50px'><img src='pics/h1.png' width=50 height=50 align=auto></a>
			
					
  <div class=dropdown>
    <button class=dropbtn>Services 
      </button>
    <div class=dropdown-content>
		<a href=check.php>Check saved books</a>
		
	</div>
	</div>
	
			<a href=booklist.php>Books Gallery</a>
			
					<div class=dropdown>
					<a href=logout.php style='margin-left: 250px'>Logout</a>
	</div>	
		
";



}
else
{
    echo "	
		
			<center>
			<img src='pics/head.jpg' width=150 height=150 align=auto><br><h7>BOOK</h7></a>
			</center>	
			<center>
			<div class=navbar>
			<a href=homepage.php style='margin-left: 50px'><img src='pics/h1.png' width=50 height=50 align=auto></a>
		    <a href=login.php><back=$Location>Login</a>";


}

?>

</center>
</div>
</body>
</html>