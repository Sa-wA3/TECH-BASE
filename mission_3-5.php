<html>
	<head>
		<title>mission3-5</title>
	</head>
	<body>
	<strong>好きな食べ物はなんですか？</strong>
	<form action='mission_3-5sent.php' method='post'>
	名前：<input type='text' name='name' value='' size='15'>
	コメント：<input type='text' name='comment' value='' size='40'>
	<br><br>
	パスワード：<input type="text" name="pass" value="" size="20">
	<input type='submit' value='送信' name='send'>
	<br><br>
	編集対象番号：<input type='text' name='num2' value='' size='5'>
	パスワード：<input type="text" name="pass3" value="" size="20">
	<input type='submit' value='編集' name='change'>
	<input type='hidden' name='nownum' value='' size='2'>
	<br><br>
	削除対象番号：<input type='text' name='num' value='' size='5'>
	パスワード：<input type="text" name="pass2" value="" size="20">
	<input type='submit' value='削除' name='delete'>
	</form>
	<過去の投稿一覧>
	<br>
	<br>
	<?php
		$content = file("mission_3-5.txt");
		$count = count(file("mission_3-5.txt"));
		for ($i=0;$i<$count;$i++){
			echo implode(" ",explode("<>",$content[$i]))."<br>";	
		}
		$nownum = "";
	?>
	</body>
</html>