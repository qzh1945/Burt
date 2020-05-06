<?php
if(isset($_POST["button"])){
	require_once('dbconnect.php');
	$db=getConnection();
	date_default_timezone_set('Europe/London');
	$date = date('Y-m-d H:i:s');
    $result=$db->query("SELECT bookID,memberID,bookTitle,author,description,link,yearPublished,dateSaved FROM saved_books");
	list($bookID,$memberID,$bookTitle,$author,$description,$link,$yearPublished,$dateSaved)=$result->fetch(PDO::FETCH_NUM);
	$book_array=array(
	  "channel"=>array("bookID"=>$bookID,
	  "memberID"=>$memberID,
	  "bookTitle"=>$bookTitle,
	  "author"=>$author,
	  "description"=>$description,
	  "link"=>$link,
	  "yearPublished"=>$yearPublished,
	  "dateSaved"=>$dateSaved
	)
	);
	$dom = new DOMDocument('1.0');
    $dom->formatOutput= true; 
	$rootelement=$dom->createElement("savedbooks");
	foreach($book_array as $key=>$value){
		$book=$dom->createElement("channel");
		$bookID=$dom->createElement("bookID",$value['bookID']);
		$memberID=$dom->createElement("memberID",$value['memberID']);
		$bookTitle=$dom->createElement("bookTitle",$value['bookTitle']);
		$author=$dom->createElement("author",$value['author']);
		$description=$dom->createElement("description",$value['description']);
		$link=$dom->createElement("link",$value['link']);
		$yearPublished=$dom->createElement("yearPublished",$value['link']);
		$dateSaved=$dom->createElement("dateSaved",$value['dateSaved']);
		$book->appendChild($bookID);
		$book->appendChild($memberID);
		$book->appendChild($bookTitle);
		$book->appendChild($author);
		$book->appendChild($description);
		$book->appendChild($link);
		$book->appendChild($yearPublished);
		$book->appendChild($dateSaved);
		$rootelement->appendChild($book);
	}
	$dom->appendChild($rootelement);
	$filename="exported_booklist.xml";
	echo"successful";
    echo 'XMLsize:' . $dom->save($filename) . 'Byte';

}