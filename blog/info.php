<!DOCTYPE html>
<html lang="sv-se">

<head>

    <meta charset="utf-8">
    <title>php</title>	 


    <style type="text/css">
    	
    	.inputBox {
        margin: 5px;
    		height: 30px;
    		width: 300px;
    	}

    	.inputClick {

    		height: 35px;
    		width: 80px;
    	}


    </style>

</head>

    <body>


    <form action="info.php" method="post">


      <select name="cars" class="inputBox">
        <option value="null"></option>
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="fiat">Vw</option>
        <option value="audi">gamm merca</option>
      </select><br>
      <input type="number" name="Generation" class="inputBox" placeholder="Generation"><br>
    	<input class="inputClick" name="submit" type="submit">


    </form>




        <?php

        	if (isset($_POST['submit']) && !empty($_POST['cars']) && !empty($_POST['Generation'])) {
        $car = $_POST['cars'];
   			$Generation = $_POST['Generation'];

   			echo "<h1>" . "Car type: " . $car . "</h1>";

        echo  "<h1>" . "Generation: " . $Generation . "</h1>";
   		}
        
        ?>

    </body>

</html>
