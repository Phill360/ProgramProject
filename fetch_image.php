<?php

//*********** Show
		  function displayimage($rspcaID)
		  {
		        // Connect AWS MYSQL Server
                require_once('./_php/connect.php');
			
			echo "$rspcaID";
			
				$qry = "select * from animals where rspcaID='".$rspcaID."'";
				$result=mysqli_query($connection,$qry);
				while ($row = mysqli_fetch_array($result)) 
				{
					echo '<img height="300" width="300" src="data:image;base64, '.$row['imageData']. ' ">';
				}
				mysqli_close($connection);
		  }
		  
?>