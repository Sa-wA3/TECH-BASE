﻿<html>
	<head>
		<title>mission2-1-1sent</title>
	</head>
	<body>
	<form action="mission_2-1-1sent.php" method="post">
	入力：<input type="text" name="content" value=""size="20">
	<input type="submit" value="送信">
	</form>
	<?php
		$content = $_POST["content"];
		if ($content == "") {
			//echo "入力されていません";
		}elseif ($content == "あいうえお") {
			echo "あ行ですね！";
		}elseif ($content == "かきくけこ") {
			echo "か行ですね！！";
		}else{
			echo $content."を受け付けました";
			$filename ="mission_2-2.txt";
			$fp = fopen($filename,"w");
			fwrite($fp,$content);
			fclose($fp);
		}	
	?>
	</body>
</html>