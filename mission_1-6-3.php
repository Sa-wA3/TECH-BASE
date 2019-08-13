<?php
	$allword ="";
	$Shiritori = array("しりとり","りんご","ごりら","らっぱ","ぱんだ");
	foreach ($Shiritori as $word) {
		$allword = $allword . $word;
		echo $allword . "<br>";
	}
?>