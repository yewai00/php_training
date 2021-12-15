<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tutorial_01</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="checkmake">
	<?php	
		$flag = 0;
    	$grow = 8;
		for($row = 0; $row < $grow; $row++) {
			for($square = 0; $square < $grow; $square++) {
				if(!$flag) {
					echo "<div class='white'></div>";
					$flag = 1;
				}
				else {
					echo "<div class='black'></div>";
					$flag = 0;
				}
			}
			echo "<br>";
			if($flag) $flag = 0;
			else $flag = 1;
		}
	?>
	</div>
</body>
</html>

