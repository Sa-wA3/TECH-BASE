<?php
	$age = 100;
	if ($age >= 85) {
		echo "免許を返納しませんか？";
	}elseif ($age >= 18) {
		echo "自動車免許が取れます。";
	}else {
		echo "自動車免許はまだ取得できません。";
	}
?>