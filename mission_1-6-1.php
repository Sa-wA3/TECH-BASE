<?php
	$year = 2000;
	$thisyear = 2019;
	$n = ($thisyear - $year) / 4 + 1;
	for ($i=1; $year<=$thisyear; $i++) {
		echo $year . "<br>";
		$year = $year + 4;
	}
?>