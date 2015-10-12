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
	<form class="form-signin" action="processor.php" method="post">
		<h2 class="form-signin-heading">Save new word</h2>
		<label for="inputEmail" class="sr-only">Word</label>
		<input type="text" id="Word" name="word" class="form-control" placeholder="Enter Word" required autofocus>
		<label for="Synonyms" class="sr-only">Synonyms</label>
		<input type="text" id="Synonyms" name="synonyms" class="form-control" placeholder="Enter Synonyms" required>
		<label for="Sentence" class="sr-only">Sentence</label>
		<textarea rows="4" cols="50" id="Sentence" name="sentence" class="form-control" placeholder="Enter Relevent Sentence" ></textarea>
		</br>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Save to DB</button> </br>
		<a class="btn btn-success center-block" href="list.php" role="button">See All Words</a>
	</form>
</div>
	
</body>
</html>