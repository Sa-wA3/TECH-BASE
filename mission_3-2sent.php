<html>
	<head>
		<title>mission3-2</title>
	</head>
	<body>
	<form action="mission_3-2sent.php" method="post">
	名前：<input type="text" name="name" value=""size="15">
	コメント：<input type="text" name="comment" value="" size="40">
	<input type="submit" value="送信">
	</form>
	<?php
	$name = $_POST["name"];
	$comment = $_POST["comment"];
	$date = date("Y/m/d H:i:s");
	$count = count(file("mission_3-2.txt")) + 1;
	$allcontent = $count."<>".$name."<>".$comment."<>".$date;
	if ($name == "" && $comment == "") {
		$content = file("mission_3-2.txt");
		$count = count(file("mission_3-2.txt"));
		echo "ぜひ投稿してください！"."<br><br>";
		for ($i=0;$i<$count;$i++){
			echo implode("",explode("<>",$content[$i]))."<br>";
		}
	}
	else{
		file_put_contents("mission_3-2.txt",$allcontent."\r\n",FILE_APPEND);
		$content = file("mission_3-2.txt");
		$count = count(file("mission_3-2.txt")); 
		echo implode("",explode("<>",$content[$count-1]))."を受け付けました！"."<br><br>";
		for ($i=0;$i<$count;$i++){
			echo implode("",explode("<>",$content[$i]))."<br>";
		}
	}
	//以下、共通処理
?>
	</body>
</html>