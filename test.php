
<?php

/*
		Allows the user to both create new records and edit existing records
	*/

require_once 'connection.php';


// creates the new/edit record form
 	// since this form is used  multiple times in this file, I have made it a function that is easily reusable


function renderForm($word = '' ,$synonyms = '' , $sentence = '' , $error = '' , $id = '')
{ ?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>
			
		</title>
	</head>
	<body>
		
		<?php if ($error != ''){
			echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error
						. "</div>";
				} ?>

		<form action = '' method="post">
		<div>
			<?php  if ($id != '') { ?>
				<input type = 'hidden' name = "id" value=" <?php echo $id; ?>" />
				<p>ID : <?php echo $id; ?> </p>
				<?php } ?>

		<strong>Word : *</strong>
		<input type ="text" name = "word" value="<?php echo $word; ?>" /><br/>

		<strong>Synonyms: *</strong> <input type="text" name="synonyms" value="<?php echo $synonyms; ?>"/>
		<p>* required</p>

		<strong>Sentence : *</strong>
		<input type ="text" name = "sentence" value="<?php echo $sentence; ?>" /><br/>

		<input type="submit" name="submit" value="Submit" />
	    </div>
		</form>
		
	</body>
	</html>


<?php }
       /*

           EDIT RECORD

        */
	// if the 'id' variable is set in the URL, we know that we need to edit a record

     if(isset($_GET['id']))
     {
     	if(isset($_POST['submit']))
     	{
     		if(is_numeric($_POST['id']))
     		{
     			$id = $_POST['id'];
     			$word  = htmlentities($_POST['word']  , ENT_QUOTES);
     			$synonyms = htmlentities($_POST['synonyms'], ENT_QUOTES);
     			$sentence = htmlentities($_POST['sentence'], ENT_QUOTES);

     			if($word == '' || $synonyms == '' || $sentence == '')
     			{
     				$error = "Error : Please fill in all required fields !";
     				renderForm($word,$synonyms,$sentence,$id);
     			}
     			else
     			{
     				if($stmt = $connection->prepare("update wordtable set word = ? , synonyms = ?  , sentence = ? where id = ?"))
     				{
     					$stmt->bind_param("ssi",$word,$synonyms,$sentence,$id);
     					$stmt->execute();
     					$stmt->close();
     				}
     				else
     				{
     					echo "Could not be prepared sql statement";
     				}

     				header("Location:list.php");
     			}
     		}
     		else
     		{
     			echo "Error";
     		}
     	}
     


		// if the form hasn't been submitted yet, get the info from the database and show the form

     else
     {
     	// make sure the 'id' value is valid
     	if(is_numeric($_GET['id']) && $_GET['id'] > 0)
     	{
     		$id = $_GET['id'];
     		if($stmt =  $connection->prepare("select * from wordtable where id = ?"))
     		{
     			$stmt->bind_param("i", $id);
				$stmt->execute();
					
			    $stmt->bind_result($id, $word, $synonyms, $sentence);
				$stmt->fetch();
				renderForm($word, $synonyms, $sentence,NULL,$id);
				$stmt->close();
     		}
     		else
			{
				echo "Error: could not prepare SQL statement";
			}
			


     	}
     	// if the 'id' value is not valid, redirect the user back to the view.php page
     	else
     	{
     		header("Location:list.php");
     	}
     }
 }



  /*

           NEW RECORD

        */
	// if the 'id' variable is not set in the URL, we must be creating a new record



   $connection->close();

?>