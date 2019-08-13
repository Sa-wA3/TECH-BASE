<html>
	<head>
		<title>mission3-4sent</title>
	</head>
	<body>

	<?php
	$name = $_POST["name"];
	$comment = $_POST["comment"];
	$date = date("Y/m/d H:i:s");
	$num = $_POST["num"];
	$num2 = $_POST["num2"];
	$nownum = $_POST["nownum"];
	
	if (isset($_POST["send"])) {
		$count = count(file("mission_3-4.txt")) + 1;
		$allcontent = $count."<>".$name."<>".$comment."<>".$date;
		if ($name == "" && $comment == "") {
			echo "<form action='mission_3-4sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='" . $num2 . "' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			$content = file("mission_3-4.txt");
			$count = count(file("mission_3-4.txt"));
			echo "ぜひ投稿してください！"."<br><br>";
			$count = count(file("mission_3-4.txt"));
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$content[$i]))."<br>";	
			}
			//以上投稿処理1
		}elseif ($name != "" && $comment != "" && $nownum != ""){
			echo "<form action='mission_3-4sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			echo "編集処理を作成してください。";
			echo "<br><br>";
			$contents = file("mission_3-4.txt");
			$count = count(file("mission_3-4.txt"));
			$fp = fopen("mission_3-4.txt","w");
			for ($i=0;$i<$count;$i++) {
				$content = explode("<>",$contents[$i]);
				if (($nownum-1) != $i){
					fwrite($fp,implode("<>",explode("<>",$contents[$i])));
				}else{
					fwrite($fp,$nownum."<>".$name."<>".$comment."<>".$date."\r\n");
				}
			}
			fclose($fp);
			$contents = file("mission_3-4.txt");
			$count = count(file("mission_3-4.txt"));
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$contents[$i]))."<br>";	
			}
			//編集処理
		}else{
			echo "<form action='mission_3-4sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			file_put_contents("mission_3-4.txt",$allcontent."\r\n",FILE_APPEND);
			$content = file("mission_3-4.txt");
			$count = count(file("mission_3-4.txt")); 
			echo implode("",explode("<>",$content[$count-1]))."を受け付けました！"."<br><br>";
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$content[$i]))."<br>";
			}
		}
		//以上投稿処理2
	}elseif (isset($_POST["delete"])) {
		$contents = file("mission_3-4.txt");
		$count = count(file("mission_3-4.txt"));
		if ($num == "") {
			echo "<form action='mission_3-4sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			echo "削除対象番号を指定してください"."<br><br>";
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$contents[$i]))."<br>";	
			}
			//以上削除処理1
		}else{
			echo "<form action='mission_3-4sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			$fp = fopen("mission_3-4.txt","w");
			for ($i=0;$i<$count;$i++) {
				$content = explode("<>",$contents[$i]);
				if (($num-1) != $i){
					fwrite($fp,implode("<>",explode("<>",$contents[$i])));
				}else{
				}
			}
			fclose($fp);
			
			
			$contents2 = file("mission_3-4.txt");
			$count = count(file("mission_3-4.txt"));
			$fp = fopen("mission_3-4.txt","w");
			for ($i=0;$i<$count;$i++) {
				$conten = explode("<>",$contents2[$i]);
				$conten[0] = $i+1;
				$line = $conten[0]."<>".$conten[1]."<>".$conten[2]."<>".$conten[3];
				//var_dump($line);
				fwrite($fp,$line);
			}
			fclose($fp);
			echo $num."番の投稿が削除されました"."<br><br>";
			$contents = file("mission_3-4.txt");
			$count = count(file("mission_3-4.txt"));
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$contents[$i]))."<br>";	
			}
		}
		//以上削除処理2
		//以下編集処理へ
	}elseif (isset($_POST["change"])) {
		$contents = file("mission_3-4.txt");
		$count = count(file("mission_3-4.txt"));
		if ($num2 == "") {
			echo "<form action='mission_3-4sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			echo "編集対象番号を指定してください"."<br><br>";
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$contents[$i]))."<br>";	
			}	
		}else{
			//$fp2 = fopen("mission_3-4.txt","w");
				for ($i=0;$i<$count;$i++) {
					$content = explode("<>",$contents[$i]);
					if (($num2-1) != $i){
						//fwrite($fp2,implode("<>",explode("<>",$contents[$i])));
					}else{	
						$name = $content[1];
						$comment = $content[2];
					}
					//fclose($fp2);
				}
			echo "<form action='mission_3-4sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='" . $name . "' size='15'>";
			echo " コメント：<input type='text' name='comment' value='" . $comment . "' size='40'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='" . $num2 . "' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			echo "<現在の投稿>";
			echo "<br><br>";
			for ($i=0;$i<$count;$i++){
				echo implode(" ",explode("<>",$contents[$i]))."<br>";	
			}
			}	
		}
	?>
	</body>
</html>