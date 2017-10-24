<!DOCTYPE html>
<html>
<head>

	<title>Blog</title>
	<meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>


<div class="contrainer">

		<ul class="nav-bar">
		  <a href="index.php"><div class="buttons" >Home</div></a>
		  <a href="newpost.php"><div class="buttons" >New Post</div></a>
		  <a href="edit.php"><div class="buttons" >Edit posts</div></a>

		</ul>
	
	<div class="backround">
		
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
		    echo "";
		   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				newPost($row["title"], $row["author"], $row["time"], $row["message"]);	
		   }
	
	function newPost($title, $author, $time, $maintext) {
		echo "<article class='article'>";
		echo "<h1 class='title'>" . $title . "</h1>";
		echo "<h2 class='author'>" . $author .  " | " .  $time . "</h2>";
		echo "<div class='main-text'>" . $maintext . "</div>";
		echo "</article>";

	}

?>


	
</div>


</body>
</html>