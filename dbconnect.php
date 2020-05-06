<?php  
function getConnection(){
$db = new PDO("mysql:host=localhost:3308;dbname=book", 'root','');
return $db;
}
?>