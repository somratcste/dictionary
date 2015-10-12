<?php

if(!isset($_REQUEST['id'])) {
	header("location: post-view.php");
}
else {
	$id = $_REQUEST['id'];
}

include ('connection.php');


?>


<?php

if(isset($_POST['form'])) {

	try {
				
		$statement = $db->prepare("UPDATE wordtable SET word=?, synonyms=?, sentence=? WHERE id=?");
		$statement->execute(array($_POST['word'],$_POST['synonyms'],$_POST['sentence'],$id));

		$success_message = "Word updated is successful";
		}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
		}


}

?>




<?php
$statement = $db->prepare("SELECT * FROM wordtable WHERE id=?");
$statement->execute(array($id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
	$word = $row['word'];
	$synonyms = $row['synonyms'];
	$sentence = $row['sentence'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Word Project</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/word.css">
</head>
<body>
<div class="container form">
	<?php
	if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
	if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
	?>

<form class="form-signin" action="" method="post" name="form">
	<h2 class="form-signin-heading">Save new word</h2>
	<label for="inputEmail" class="sr-only">Word</label>
	<input type="text" id="Word" name="word" class="form-control" placeholder="Enter Word" required autofocus value="<?php echo $word ; ?>">
	<label for="Synonyms" class="sr-only">Synonyms</label>
	<input type="text" id="Synonyms" name="synonyms" class="form-control" placeholder="Enter Synonyms" required value="<?php echo $synonyms; ?>">
	<label for="Sentence" class="sr-only">Sentence</label>
	<textarea rows="4" cols="50" id="Sentence" name="sentence" class="form-control" placeholder="Enter Relevent Sentence" ><?php echo $sentence; ?></textarea>
	</br>
	<input type="submit" value="Update" class="tn btn-lg btn-primary btn-block" name="form" >
	<a class="btn btn-success center-block" href="list.php" role="button">See All Words</a>
</form>
</div>
	
</body>
</html>