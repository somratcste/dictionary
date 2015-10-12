<?php 
require_once 'connection.php';
$id = $_REQUEST['id'];
$statement = $db->prepare("DELETE FROM wordtable where id=?");
$statement->execute(array($id));
if($statement)
	echo "<script>window.open('list.php?deleted = word has been deleted ','_self')</script>";

?>