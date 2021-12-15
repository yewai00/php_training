<?php
$limit = 5;
$space = 5;
for ($i = 1; $i <= $limit; $i++) {
	for ($j = 1; $j <= $space; $j++) {
		echo "&nbsp;&nbsp;";
	}
	$space--;
	for ($star = 1; $star <= 2 * $i - 1; $star++) {
		echo "*";
	}
	echo "<br>";
}
$space = 2;
for ($i = 1; $i <= $limit; $i++) {
	for ($j = 1; $j <= $space; $j++) {
		echo "&nbsp;&nbsp;";
	}
	$space++;
	for ($star = 1; $star <= 2 * ($limit - $i) - 1; $star++) {
		echo "*";
	}
	echo "<br>";
}
?>