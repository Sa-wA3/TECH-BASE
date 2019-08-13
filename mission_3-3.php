<html>
	<head>
		<title>mission3-3</title>
	</head>
	<body>
	<form action="mission_3-3sent.php" method="post">
	名前：<input type="text" name="name" value=""size="15">
	コメント：<input type="text" name="comment" value="" size="40">
	<input type="submit" value="送信" name="send">
	<br><br>
	削除対象番号：<input type="text" name="num" value="" size="5">
	<input type="submit" value="削除"  name="delete">
	</form>
	<過去の投稿一覧>
	<br>
	<br>
	<?php
		$content = file("mission_3-3.txt");
		$count = count(file("mission_3-3.txt"));
		for ($i=0;$i<$count;$i++){
			echo implode(" ",explode("<>",$content[$i]))."<br>";	
		}
	?>
	</body>
</html>