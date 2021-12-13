<?php
#====================================#
session_start();
#echo $_SESSION['login'];
include('connection/connection.php') 
#====================================#
?>

<!DOCTYPE html>
<html>
<head>
	<title>Clinic</title>
	
</head>

<body>
	<div class="wrapper">
			<tr>
				<td>
					<?php
						#navigation menu
						include ('menu.php');
						echo "<br>";
						if(isset($_GET['page'])) 
						{
							$page = $_GET['page'];
							include ("$page.php");
						}
						else
						{
							include("core/bot.php");
						}
	            	?>
				</td>
			</tr>
	</div>
</body>
</html>