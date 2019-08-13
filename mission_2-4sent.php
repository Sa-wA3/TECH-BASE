<html>
	<head>
		<title>mission2-4sent</title>
	</head>
	<body>
	<form action="mission_2-4sent.php" method="post">
	入力欄：<input type="text" name="content" value=""size="40">
	<input type="submit" value="送信">
	</form>
	<?php
		$content = $_POST["content"];
		$count = count(file("mission_2-3.txt"));
		if ($content ==""){
			echo "投稿されませんでした…"."<br>";
			echo "<br>"."<投稿一覧>";
			
			$contents = file("mission_2-3.txt");
			foreach ($contents as $value){
				echo "<br>".$value;
			}
		}else{
			echo "投稿を受け付けました！"."<br>";
			echo "<br>"."<投稿一覧>";
			$filename ="mission_2-3.txt";
			$fp = fopen($filename,"a");
			fwrite($fp,$content."\r\n");
			fclose($fp);
			
			$contents = file("mission_2-3.txt");
			foreach ($contents as $value){
				echo "<br>".$value;
			}
		}
	?>
	</body>
</html>