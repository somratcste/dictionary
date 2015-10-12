<?php
require_once 'connection.php';

$word = test_input($_POST['word']);
$synonyms = test_input($_POST['synonyms']);
$sentence = test_input($_POST['sentence']);


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$statement = $db->prepare("INSERT INTO wordtable
		 (word,synonyms,sentence) values (?,?,?)");
		
$statement->execute(array($word,$synonyms,$sentence));

if(!$statement) {
	echo "Connection error". $connection->error;
}
else {
	?>
	<script>alert("Insertion Successful");</script>
	<?php
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Word Project of Somrat.</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/word.css">
</head>
<body>
<div class="FormContainer1">
<a class="btn btn-primary center-block" href="index.php" role="button">Insert New</a>
</br>
<a class="btn btn-info center-block" href="list.php" role="button">See All Words</a>
</div>
	
</body>
</html>