<?php
require_once('dbconnect.php');
	$db=getConnection();
	if (!isset($_SESSION)) 
				{
					session_start();
				}
        if(isset($_SESSION['login_username']))
		{
	    $id=$_GET['id'];
		$user=$_SESSION['login_username'];
		$sql=$db->query("SELECT memberID FROM members WHERE email='".$user."'");
		$r=$sql->fetch();
		$books=simplexml_load_file('booklist.xml');
        $qry='/channel/item';
	    $book=$books->xpath($qry);
		date_default_timezone_set('Europe/London');
        $date = date('Y-m-d H:i:s');
		
		foreach($book as $a){
			if($id==$a->bookid){
				$title=$a->title;
				$description=$a->description;
				$author=$a->author;
				$link=$a->link;
				$year=$a->yearPublished;
          $s=$db->query('INSERT INTO saved_books (bookID,memberID,bookTitle,author,description,link,yearPublished,dateSaved) VALUES ("'.$id.'", "'.$r['memberID'].'", "'.$title.'","'.$author.'", "'.$description.'", "'.$link.'","'.$a->yearPublished.'","'.$date.'")');
			header("location: check.php");
			}
		else{
			
		}
		
	
	}
		}
	


?>