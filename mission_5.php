<?php
	$dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	//MySQLへの接続
	
	$sql = "CREATE TABLE IF NOT EXISTS mission5"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "comment TEXT,"
	. "date TEXT,"
	. "pass TEXT"
	.");";
	$stmt = $pdo->query($sql);
	//テーブルの作成
	
	function insert($pdo, $name, $comment, $date, $pass){
		$sql = $pdo -> prepare("INSERT INTO mission5 (name, comment, date, pass) VALUES (:name, :comment, :date, :pass)");
		$sql -> bindParam(':name', $name, PDO::PARAM_STR);//:nameに$nameを代入
		$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);//:commentに$commentを代入
		$sql -> bindParam(':date', $date, PDO::PARAM_STR);//:dateに$dateを代入
		$sql -> bindParam(':pass', $pass, PDO::PARAM_STR);//:passに$passを代入
		$sql -> execute();//実行
		
		//queryの場合はそのまま実行→ユーザーからの入力を利用しない
		//prepareの場合は最後にexecute()が必要となる→ユーザーからの入力を利用
	}
	//投稿処理

	function delete($pdo, $id, $pass){

		$sql = 'delete from mission5 where id=:id and pass=:pass';
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt;
	}
	//削除処理
	
	function update($pdo, $id, $name, $comment, $date, $pass){
		if(!empty($pass)){
			$sql = 'update mission5 set name=:name,comment=:comment, date=:date where id=:id and pass=:pass';
		}else{
			$sql = 'update mission5 set name=:name,comment=:comment, date=:date where id=:id';
		}
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
		$stmt->bindParam(':date', $date, PDO::PARAM_STR);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if(!empty($pass)){
			$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
		}
		$stmt->execute();
	}
	
	function select($pdo){
		$sql = 'SELECT * FROM mission5';
		$stmt = $pdo->query($sql);
		$results = $stmt->fetchAll();
		foreach ($results as $row){
		echo $row['id'].' ';
		echo $row['name'].' ';
		echo $row['comment'].' ';
		echo $row['date'].'<br>';
		}
		echo "<hr>";
	}
	//表示処理
	if(!empty($_POST["cha_id"])){
		$stmt = $pdo->prepare("SELECT * FROM mission5 where id=:id and pass=:pass");
		$stmt->bindParam(':id', $_POST["cha_id"], PDO::PARAM_INT);
		$stmt->bindParam(':pass', $_POST["cha_pass"], PDO::PARAM_STR);
		$stmt->execute();

		$record = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if(!empty($record)){
			$cha_name = $record['name'];
			$cha_comment = $record['comment'];
			$cha_pas = $record['pass'];
		}else{
			$_POST["cha_id"] = NULL;
		}
	}//編集処理
	
?>

<html>
	<h1>掲示板だよ</h1>
	<head>
		<title>mission5</title>
	</head>
	<body>
	<form action="" method="post">
	名前：<input type="text" name="name" placeholder="名前を入力" value="<?php if(!empty($cha_name)) echo $cha_name ?>">
	コメント：<input type="text" name="comment" placeholder="コメントを入力" value="<?php if(!empty($cha_comment)) echo $cha_comment ?>">
	<br><br>
	パスワード：<input type="text" name="pass" placeholder="パスワードを入力" value="<?php if(!empty($cha_pas)) echo $cha_pas ?>">
	<input type="submit" value="送信">
	<br><br>
	編集対象番号：<input type='text' name='cha_id' placeholder="編集対象番号を入力">
	パスワード：<input type="text" name="cha_pass" placeholder="パスワードを入力">
	<input type='submit' value='編集'>
	<?php if (!empty($_POST["cha_id"])) : ?>
    <input type="hidden" name="id" value="<?php echo $_POST["cha_id"] ?>">
  <?php endif ?>
	<br><br>
	削除対象番号：<input type='text' name='del_id' placeholder="削除対象番号を入力">
	パスワード：<input type="text" name="del_pass" placeholder="パスワードを入力">
	<input type='submit' value='削除'>
	</form>
	</body>
</html>
<?php
	
	if(!empty($_POST["name"]) && !empty($_POST["comment"])){
		if(!empty($_POST["id"])){
			update($pdo, $_POST["id"], $_POST["name"], $_POST["comment"], date("Y/m/d H:i:s"), $_POST["cha_pass"]);
		}//新規投稿処理
		else{
			insert($pdo, $_POST["name"], $_POST["comment"], date("Y/m/d H:i:s"), $_POST["pass"]);
		}//編集処理
	}elseif(!empty($_POST["del_id"])){
		delete($pdo, $_POST["del_id"],$_POST["del_pass"]);
	}//削除処理
	select($pdo);//表示処理
?>