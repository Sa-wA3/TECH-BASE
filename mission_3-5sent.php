<html>
	<head>
		<title>mission3-5sent</title>
	</head>
	<body>
	<strong>好きな食べ物はなんですか？</strong>
	<?php
	$name = $_POST["name"];
	$comment = $_POST["comment"];
	$date = date("Y/m/d H:i:s");
	$num = $_POST["num"];
	$num2 = $_POST["num2"];
	$nownum = $_POST["nownum"];
	$pass = $_POST["pass"];
	$pass2 = $_POST["pass2"];
	$pass3 = $_POST["pass3"];
	
	if (isset($_POST["send"])) {//投稿処理開始
		$count = count(file("mission_3-5.txt")) + 1;
		$allcontent = $count."<>".$name."<>".$comment."<>".$date."<>".$pass;
		if ($name == "" && $comment == "" && $nownum == "") { //未入力の場合
			echo "<form action='mission_3-5sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo "<br><br>";
			echo "パスワード：<input type='text' name='pass' value='' size='20'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass3' value='' size='20'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='" . $num2 . "' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass2' value='' size='20'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			echo "ぜひ投稿してください！"."<br><br>";
			$content = file("mission_3-5.txt");
			$count = count(file("mission_3-5.txt"));
			for ($i=0;$i<$count;$i++){
				$conten = explode("<>",$content[$i]);
				$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3];
				echo $line."<br>";
			}
		
		}elseif ($name != "" && $comment != "" && $nownum != ""){//編集ボタンの後
			echo "<form action='mission_3-5sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo "<br><br>";
			echo "パスワード：<input type='text' name='pass' value='' size='20'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass3' value='' size='20'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass2' value='' size='20'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			echo "編集処理しました。";
			echo "<br><br>";
			$contents = file("mission_3-5.txt");
			$count = count(file("mission_3-5.txt"));
			$fp = fopen("mission_3-5.txt","w");
			for ($i=0;$i<$count;$i++) {
				$content = explode("<>",$contents[$i]);
				if (($nownum-1) != $i){
					fwrite($fp,implode("<>",explode("<>",$contents[$i])));
				}else{
					fwrite($fp,$nownum."<>".$name."<>".$comment."<>".$date."<>".$pass."\r\n");
				}
			}
			fclose($fp);
			$contents = file("mission_3-5.txt");
			$count = count(file("mission_3-5.txt"));
			for ($i=0;$i<$count;$i++){
				$conten = explode("<>",$contents[$i]);
				$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3];
				echo $line."<br>";	
			}
		
		}else{//通常投稿
			echo "<form action='mission_3-5sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo "<br><br>";
			echo "パスワード：<input type='text' name='pass' value='' size='20'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass3' value='' size='20'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass2' value='' size='20'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			file_put_contents("mission_3-5.txt",$allcontent."\r\n",FILE_APPEND);
			$content = file("mission_3-5.txt");
			$count = count(file("mission_3-5.txt")); 
			echo implode("",explode("<>",$content[$count-1]))."を受け付けました！"."<br><br>";
			for ($i=0;$i<$count;$i++){
				$conten = explode("<>",$content[$i]);
				$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3];
				echo $line."<br>";
			}
		}
		//以上投稿処理
	}elseif (isset($_POST["delete"])) {//削除処理開始
		$contents = file("mission_3-5.txt");
		$count = count(file("mission_3-5.txt"));
		if ($num == "") {//番号指定されてない場合
			echo "<form action='mission_3-5sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo "<br><br>";
			echo "パスワード：<input type='text' name='pass' value='' size='20'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass3' value='' size='20'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass2' value='' size='20'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			echo "削除対象番号を指定してください"."<br><br>";
			for ($i=0;$i<$count;$i++){
				$conten = explode("<>",$contents[$i]);
				$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3];
				echo $line."<br>";
			}//for文
			
		}else{//通常削除処理
			$conten =  explode("<>",$contents[$num-1]);
			if ($pass2 != "" && $conten[4] != "" && $pass2."\r\n" == $conten[4]){
			echo "<form action='mission_3-5sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo "<br><br>";
			echo "パスワード：<input type='text' name='pass' value='' size='20'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass3' value='' size='20'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass2' value='' size='20'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			$conten = explode("<>",$contents[$num-1]);
			$fp = fopen("mission_3-5.txt","w");
			for ($i=0;$i<$count;$i++) {
				$content = explode("<>",$contents[$i]);
				if (($num-1) != $i){
					fwrite($fp,implode("<>",explode("<>",$contents[$i])));
				}else{
				}
			}//for文
			fclose($fp);
			
			//以下番号の差し替え
			$contents2 = file("mission_3-5.txt");
			$count = count(file("mission_3-5.txt"));
			$fp = fopen("mission_3-5.txt","w");
			for ($i=0;$i<$count;$i++) {
				$conten = explode("<>",$contents2[$i]);
				$conten[0] = $i+1;
				$line = $conten[0]."<>".$conten[1]."<>".$conten[2]."<>".$conten[3]."<>".$conten[4];
				//var_dump($line);
				fwrite($fp,$line);
			}//for文
			fclose($fp);
			echo $num."番の投稿が削除されました"."<br><br>";
			$contents = file("mission_3-5.txt");
			$count = count(file("mission_3-5.txt"));
			for ($i=0;$i<$count;$i++){
				$conten = explode("<>",$contents[$i]);
				$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3];
				echo $line."<br>";
			}//for文
			}else{
				echo "<form action='mission_3-5sent.php' method='post'>";
				echo "名前：<input type='text' name='name' value='' size='15'>";
				echo " コメント：<input type='text' name='comment' value='' size='40'>";
				echo "<br><br>";
				echo "パスワード：<input type='text' name='pass' value='' size='20'>";
				echo " <input type='submit' value='送信' name='send'>";
				echo "<br><br>";
				echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
				echo " パスワード：<input type='text' name='pass3' value='' size='20'>";
				echo " <input type='submit' value='編集' name='change'>";
				echo " <input type='hidden' name='nownum' value='' size='2'>";
				echo "<br><br>";
				echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
				echo " パスワード：<input type='text' name='pass2' value='' size='20'>";
				echo " <input type='submit' value='削除' name='delete'>";
				echo "</form>";
				echo "パスワードが間違っているか、削除できない投稿です。"."<br><br>";
				$contents = file("mission_3-5.txt");
				$count = count(file("mission_3-5.txt"));
				for ($i=0;$i<$count;$i++){
				$conten = explode("<>",$contents[$i]);
				$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3];
				echo $line."<br>";
				}//for文
			}
		}
		//以上削除処理
	}elseif (isset($_POST["change"])) {//編集処理開始
		$contents = file("mission_3-5.txt");
		$count = count(file("mission_3-5.txt"));
		if ($num2 == "") {//番号指定されてない場合
			echo "<form action='mission_3-5sent.php' method='post'>";
			echo "名前：<input type='text' name='name' value='' size='15'>";
			echo " コメント：<input type='text' name='comment' value='' size='40'>";
			echo "<br><br>";
			echo "パスワード：<input type='text' name='pass' value='' size='20'>";
			echo " <input type='submit' value='送信' name='send'>";
			echo "<br><br>";
			echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass3' value='' size='20'>";
			echo " <input type='submit' value='編集' name='change'>";
			echo " <input type='hidden' name='nownum' value='' size='2'>";
			echo "<br><br>";
			echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
			echo " パスワード：<input type='text' name='pass2' value='' size='20'>";
			echo " <input type='submit' value='削除' name='delete'>";
			echo "</form>";
			echo "編集対象番号を指定してください"."<br><br>";
			for ($i=0;$i<$count;$i++){
				$conten = explode("<>",$contents[$i]);
				$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3];
				echo $line."<br>";
			}	
		}else{//通常編集処理
				$conten =  explode("<>",$contents[$num2-1]);
				if ($pass3 != "" && $conten[4] != "" && $pass3."\r\n" == $conten[4]){
			//$fp2 = fopen("mission_3-5.txt","w");
				for ($i=0;$i<$count;$i++) {
					$content = explode("<>",$contents[$i]);
					if (($num2-1) != $i){
						//fwrite($fp2,implode("<>",explode("<>",$contents[$i])));
					}else{	
						$name = $content[1];
						$comment = $content[2];
						$pass = $content[4];
					}
					//fclose($fp2);
				}
				echo "<form action='mission_3-5sent.php' method='post'>";
				echo "名前：<input type='text' name='name' value='" . $name . "' size='15'>";
				echo " コメント：<input type='text' name='comment' value='" . $comment . "' size='40'>";
				echo "<br><br>";
				echo "パスワード：<input type='text' name='pass' value='" . $pass . "' size='20'>";
				echo " <input type='submit' value='送信' name='send'>";
				echo "<br><br>";
				echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
				echo " パスワード：<input type='text' name='pass3' value='' size='20'>";
				echo " <input type='submit' value='編集' name='change'>";
				echo " <input type='hidden' name='nownum' value='" . $num2 . "' size='2'>";
				echo "<br><br>";
				echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
				echo " パスワード：<input type='text' name='pass2' value='' size='20'>";
				echo " <input type='submit' value='削除' name='delete'>";
				echo "</form>";
				echo "<現在の投稿>";
				echo "<br><br>";
				for ($i=0;$i<$count;$i++){
					$conten = explode("<>",$contents[$i]);
					$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3];
					echo $line."<br>";
				}
				}else{
					echo "<form action='mission_3-5sent.php' method='post'>";
					echo "名前：<input type='text' name='name' value='' size='15'>";
					echo " コメント：<input type='text' name='comment' value='' size='40'>";
					echo "<br><br>";
					echo "パスワード：<input type='text' name='pass' value='' size='20'>";
					echo " <input type='submit' value='送信' name='send'>";
					echo "<br><br>";
					echo "編集対象番号：<input type='text' name='num2' value='' size='5'>";
					echo " パスワード：<input type='text' name='pass3' value='' size='20'>";
					echo " <input type='submit' value='編集' name='change'>";
					echo " <input type='hidden' name='nownum' value='' size='2'>";
					echo "<br><br>";
					echo "削除対象番号：<input type='text' name='num' value='' size='5'>";
					echo " パスワード：<input type='text' name='pass2' value='' size='20'>";
					echo " <input type='submit' value='削除' name='delete'>";
					echo "</form>";
					echo "パスワードが間違っているか、編集できない投稿です。"."<br><br>";
					$contents = file("mission_3-5.txt");
					$count = count(file("mission_3-5.txt"));
					for ($i=0;$i<$count;$i++){
						$conten = explode("<>",$contents[$i]);
						$line = $conten[0]." ".$conten[1]." ".$conten[2]." ".$conten[3];
						echo $line."<br>";
					}//for文
				}
		}//else	
	}//以上編集処理
	?>
	</body>
</html>