<?php
require_once 'connection.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>See all words</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/word.css">
</head>
<body>
<div class="container">
	<div class="FormContainer">
		<a class="btn btn-primary center-block" href="index.php" role="button">Insert New</a></br>
	</div>
	 <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
         <thead>  
  
		        <tr>  
		  
		            <th>S.No</th>  
		            <th>Word</th>  
		            <th>Synonyms</th>  
		            <th>Sentence</th>  
		            <th>Edit</th>
		            <th>Delete</th>  
		        </tr>  
        </thead>  
  
        <?php  
        $i = 0; 
        $statement = $db->prepare("SELECT * FROM wordtable");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
        {  
        	$i++;
            echo "<tr>
				<td><strong>". $i. ".</strong></td>
				<td><strong>". $row["word"]. "</strong></td>
				<td> ". $row["synonyms"]. "</td> 
				<td> " . $row["sentence"] . "</td>
				<td><a href='edit.php?id=". $row["id"]. "' >Edit<a/></td>
				<td><a href='delete.php?id=". $row["id"]. "' class='delete'>Delete</a></td>
				</tr>";
        }

        }

       ?>  
  
    </table>  
</div>	
</body>
</html>