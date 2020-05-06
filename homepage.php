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
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
	<?php
       if(isset($_POST['select'])){
		   $xml=simplexml_load_file("booklist.xml");
		   $word=$_POST['word'];
		   $query=$xml->xpath("/channel/item[contains(author,'$word')or contains(title,'$word')]");
		   echo "<table border=\"1\" bordercolor=\"#21aaa7\">";
	       echo "<th>bookid</td><th>title</td><th>author</td><th>link</td><th>description</td><th>yearPublished</th>\n";
		   echo "<tr>";
		   foreach($query as $q){
			   foreach($q->children() as $tag=>$value){
				   echo "<td>{$value}</td>";
			   }
			   echo "</tr>\n";
		   }
		   echo "</table>";
	   }
	?>
	<form action="homepage.php" method="POST">
		<center><label>please input：</label>
		<input type="text" name="word" id="word" width:50% height:50vh margin:auto >

		<input type="submit" name="select" value="select"></center>
	</form>
&nbsp
&nbsp
&nbsp
</div>
</body>
</html>
<?php include "base.php";?>
