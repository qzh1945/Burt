<html>
<head>
    <?php
    include "header.php";
    ?>
   <link rel="stylesheet" href="HD.css" type="text/css">
   	<meta charset="UTF-8">
</head>
<body>
<div class=content>
	<title>Saved Books</title>
</head>
<body>
<center>
<?php 
    try{
	require_once('dbconnect.php');
	$db=getConnection();
	if(isset($_SESSION['login_username']))
	{
	echo "<table border='1' bordercolor='#21aaa7' >";
	echo '<caption>Saved form</caption>';
	echo "<th>bookID</td><th>memberID</td><th>book Title</td><th>author</td><th>description</td><th>link</td><th>yearPublished</td><th>dateSaved</th><th>Delete</th>\n";
	
	$user=$_SESSION['login_username'];
	$sql=$db->query("SELECT memberID FROM members WHERE email='".$user."'");
	$a=$sql->fetch();
	$sql1=$db->query("SELECT bookID,memberID,bookTitle,author,description,link,yearPublished,dateSaved FROM saved_books WHERE memberID= '".$a['memberID']."'");
	
    foreach($sql1 as $key=>$value){
		echo "<tr><td>".$value['bookID']."</td>";
		echo "<td>".$value['memberID']."</td>";
		echo "<td>".$value['bookTitle']."</td>";
		echo "<td>".$value['author']."</td>";
		echo "<td>".$value['description']."</td>";
		echo "<td><a href=".$value['link'];"></a></td>";
		echo "<td>".$value['link']."</td>";
		echo "<td>".$value['yearPublished']."</td>";
		echo "<td>".$value['dateSaved']."</td>";
	    echo "<td><a href='deleting.php?id=".$value['bookID']."'>delete</a></form></td></tr>";
	}
	
	echo '</table>';

	}}
catch( PDOException $e ) {
		echo $e->getMessage();
		}
?>
<form action=export.php  method=POST>
<input type ="submit" value="export" name="button">
</center>
</div>
</body>
</html>
<?php include "base.php";?>