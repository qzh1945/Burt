<?php
	require_once('dbconnect.php');
	$db=getConnection();
	$id=$_GET['id'];
	$sql='DELETE from saved_books WHERE bookID="'.$id.'"';
	$db->query($sql);
if($db){
	header("location: check.php");
}
?>