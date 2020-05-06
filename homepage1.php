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