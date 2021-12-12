<!DOCTYPE html>
<html>
<head>
	<!--=====================================================-->
	<title>Hospital</title>
	<!--=====================================================-->
	<meta charset="utf-8">
	<meta name="description" content="">
	<!--=====================================================-->
	<meta name="keywords" content="">

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