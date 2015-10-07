<?php
require_once 'connection.php';

$delete_id = $_GET['id'];
$delete_query = "DELETE FROM wordtable WHERE id = '$delete_id'";
$result = $connection->query($delete_query);
if($result) 
	echo "<script>window.open('list.php?deleted = word has been deleted ','_self')</script>";

?>