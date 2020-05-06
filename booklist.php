<html>
<head>
    <?php
    include "header.php";
    ?>
   <link rel="stylesheet" href="HD.css" type="text/css">
</head>
<body>
<div class=content>
	<?php
	$books=simplexml_load_file('booklist.xml');
    $qry='/channel/item';
	$book=$books->xpath($qry);
	echo "<table border=\"1\" bordercolor=\"#21aaa7\" >";
	echo "<th>bookid</td><th>title</td><th>author</td><th>link</td><th>description</td><th>yearPublished</th><th>Add</th>\n";

    echo "<tr>";
foreach($book as $a){
	echo "<td>{$a->bookid}</td>";
	echo "<td>{$a->title}</td>";
	echo "<td>{$a->author}</td>";
	echo "<td><a href=".$a->link;"></a></td>";
	echo "<td>{$a->link}</td>";
	echo "<td>{$a->description}</td>";
	echo "<td>{$a->yearPublished}</td>";
	echo "<td><a href='saving.php?id=".$a->bookid."'>Add </a></td>";
	echo "</tr>\n";
}
	
	 

echo "</table>";
?>
<center>
<?php include "base.php";?>
</center>
</body>
</div>
</html>

