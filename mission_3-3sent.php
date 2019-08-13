<html>
	<head>
		<title>mission3-3sent</title>
	</head>
	<body>
	<form action="mission_3-3sent.php" method="post">
	名前：<input type="text" name="name" value=""size="15">
	コメント：<input type="text" name="comment" value="" size="40">
	<input type="submit" value="送信" name="send">
	<br><br>
	削除対象番号：<input type="text" name="num" value="" size="5">
	<input type="submit" value="削除" name="delete">
	</form>
	<?php
	$name = $_POST["name"];
	$comment = $_POST["comment"];
	$date = date("Y/m/d H:i:s");
	$num = $_POST["num"];
	
	if (isset($_POST["send"])) {
		$count = count(file("mission_3-3.txt")) + 1;
		$allcontent = $count."<>".$name."<>".$comment."<>".$date;
		if ($name == "" && $comment == "") {
			$content = file("mission_3-3.txt");
			$count = count(file("mission_3-3.txt"));
			echo "ぜひ投稿してください！"."<br><br>";
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$content[$i]))."<br>";
			}
		}
		else{
			file_put_contents("mission_3-3.txt",$allcontent."\r\n",FILE_APPEND);
			$content = file("mission_3-3.txt");
			$count = count(file("mission_3-3.txt")); 
			echo implode("",explode("<>",$content[$count-1]))."を受け付けました！"."<br><br>";
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$content[$i]))."<br>";
			}
		}
	}elseif (isset($_POST["delete"])) {
		$contents = file("mission_3-3.txt");
		$count = count(file("mission_3-3.txt"));
		if ($num == "") {
			echo "削除対象番号を指定してください"."<br><br>";
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$contents[$i]))."<br>";	
			}
		}else{
			$fp = fopen("mission_3-3.txt","w");
			for ($i=0;$i<$count;$i++) {
				$content = explode("<>",$contents[$i]);
				if (($num-1) != $i){
					fwrite($fp,implode(" ",explode("<>",$contents[$i])));
				}else{
				}
			}
			fclose($fp);
			
			
			$contents2 = file("mission_3-3.txt");
			$count = count(file("mission_3-3.txt"));
			$fp = fopen("mission_3-3.txt","w");
			for ($i=0;$i<$count;$i++) {
				$conten = explode(" ",$contents2[$i]);
				$conten[0] = $i+1;
				$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3]." ".$conten[4];
				//var_dump($line);
				fwrite($fp,$line);
			}
			fclose($fp);
			echo $num."番の投稿が削除されました"."<br><br>";
			
			$contents = file("mission_3-3.txt");
			$count = count(file("mission_3-3.txt"));
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$contents[$i]))."<br>";	
			}
		}
	}
	?>
	</body>
</html>