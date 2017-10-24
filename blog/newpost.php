<!DOCTYPE html>
<html>
<head>

	<title>New Post</title>
	<meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" type="text/css" href="newpost.css">

</head>
<body>


<div class="contrainer">

		<ul class="nav-bar">
		  <a href="index.php"><div class="buttons" >Home</div></a>
		  <a href="newpost.php"><div class="buttons" >New Post</div></a>
		  <a href="edit.php"><div class="buttons" >Edit posts</div></a>

		</ul>
	
	<div class="backround">

	<form action="newpost.php" class="input-form" method="post">
      	<input type="text" name="Title" class="input-title input" placeholder="Title"><br>
      	<input type="text" name="Author" class="input-author input" placeholder="Author"><br>
      	<textarea type="text" name="Message" class="input-message input" placeholder="Message"></textarea><br>
    	<input class="input-sumbit input" name="submit" type="submit">


    </form>
		

 <?php
		$servername = "localhost";
		$username = "root";
		$password = "password";
        	if (isset($_POST['submit']) && !empty($_POST['Title']) && !empty($_POST['Author']) && !empty($_POST['Message'])) {
        		$Author = filter_input(INPUT_POST, 'Author', FILTER_SANITIZE_SPECIAL_CHARS);
        		$Title = filter_input(INPUT_POST, 'Title', FILTER_SANITIZE_SPECIAL_CHARS);
        		$Message = filter_input(INPUT_POST, 'Message', FILTER_SANITIZE_SPECIAL_CHARS);
				try {
				    $conn = new PDO("mysql:host=$servername;dbname=blog", $username);
				    // set the PDO error mode to exception
				    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				    $sql = $conn->prepare("INSERT INTO posts (author, title, message)
					VALUES (:author, :title, :message)");
					$sql->bindParam(':title', $Title);
					$sql->bindParam(':author', $Author);
					$sql->bindParam(':message', $Message);
				    // use exec() because no results are returned
				    $sql->execute();
				    }
				catch(PDOException $e) {
				    echo $sql . "<br>" . $e->getMessage();
				    }
   			}
        
        ?>


	
	 </div>


</body>
</html>