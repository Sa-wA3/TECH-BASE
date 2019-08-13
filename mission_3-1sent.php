<html>
	<head>
		<title>mission3-1</title>
	</head>
	<body>
	<form action="mission_3-1sent.php" method="post">
	名前：<input type="text" name="name" value=""size="15">
	コメント：<input type="text" name="comment" value="" size="40">
	<input type="submit" value="送信">
	</form>
	<?php
	$name = $_POST["name"];
	$comment = $_POST["comment"];
	$date = date("Y/m/d H:i:s");
	$count = count(file("mission_3-1.txt"))+ 1;
	$content = $count."<>".$name."<>".$comment."<>".$date;
	
	$filename ="mission_3-1.txt";
	$fp = fopen($filename,"a");
	fwrite($fp,$content."\r\n");
	fclose($fp);
	echo $content."を受け付けました！";
?>
	</body>
</html>