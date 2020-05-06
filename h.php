<?php
$article_array = array(
    "第一篇" => array(
	"title"=>"PHP访问MySql数据库 初级篇", 
	"link"=>"http://blog.csdn.net/morewindows/article/details/7102362"
	)
	);
	$dom = newDOMDocument('1.0', 'UTF-8');
    $dom->formatOutput= true;
	$rootelement = $dom->createElement("MoreWindows");
    foreach ($article_array as $key=>$value){
	$article = $dom->createElement("article", $key);
	$title = $dom->createElement("title", $value['title']);
	$link = $dom->createElement("link", $value['link']);
	$article->appendChild($title);
	$article->appendChild($link);
	$rootelement->appendChild($article);
	}
    $dom->appendChild($rootelement);
	$filename = "C:\Users\刘东垚\Desktop\test.xml";
    echo 'XML文件大小' . $dom->save($filename) . '字节';
	?>

