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
        $result="SELECT * FROM wordtable";//select query for viewing users.  
        $result=$connection->query($result);//here run the sql query.  
        if($result->num_rows > 0) {
        while($row=$result->fetch_assoc())//while look to fetch the result and store in a array $row.  
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