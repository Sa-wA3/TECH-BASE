<html>
	<head>
		<title>mission2-4</title>
	</head>
	<body>
	<form action="mission_2-4sent.php" method="post">
	入力欄：<input type="text" name="content" value=""size="40">
	<input type="submit" value="送信">
	</form>
	<?php
	echo "<br>"."<投稿一覧>";
	$contents = file("mission_2-3.txt");
			foreach ($contents as $value){
				echo "<br>".$value;
			}
	?>
	</body>
</html>