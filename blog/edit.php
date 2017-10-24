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

		<h1 class="editHeader">Edit posts</h1>	

		

 <?php

 		$servername = "localhost";
		$username = "root";
		$password = "password";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=blog", $username);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
			catch(PDOException $e) {
		    echo "Connection failed: " . $e->getMessage();
		    }

		    $sql = "select * from posts";

		    $stmt = $conn->prepare($sql);
		    $stmt->execute();
		    echo "<ul class='editList'>";
		   	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				addElement($row["title"], $row["author"], $row["id"]);	
		   	}
		   echo "</ul>";



		   function addElement($Title, $Author, $Id) {
		   	echo "<form action='edit.php' method='post'>";
		   	echo "<li class='theElement'>" . $Title . " " . $Author . "
		   	<input class='elementBTN' name='remove' type='submit' value='delete'> <input type='hidden' name='id' value='" . $Id . "'> </li>";
		   	echo "</form>";
		   }


		   	if (isset($_POST['remove'])) {
		   		try {
		    $conn = new PDO("mysql:host=$servername;dbname=blog", $username);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
			catch(PDOException $e) {
		    echo "Connection failed: " . $e->getMessage();
		    }
		    $Id = $_POST['id'];
		    $sql = "DELETE FROM posts
			WHERE id=$Id";


		    $stmt = $conn->prepare($sql);
		    $stmt->execute();
		    header("Location: /webbsprogram/blog/edit.php");

		   	}

        ?>


	
	 </div>


</body>
</html>