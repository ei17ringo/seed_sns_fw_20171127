<?php
	// session_start();

	class Member {
		// プロパティ
		private $dbconnect = '';

		//　コンストラクタ
		function __construct(){
			// DB接続ファイルを読み込む
			require('dbconnect.php');

			// DB接続設定の値をプロパティに代入
			$this->dbconnect = $dbh;
		}

		function create(){
			// var_dump("model member の create");


			// // SQL文の作成
			// $sql = sprintf('INSERT INTO `members` (`nick_name`, `email`, `password`, `picture_path`, `created`, `modified`) VALUES ("%s", "%s", "%s", "%s", now(), now());',
			//       mysqli_real_escape_string($this->dbconnect,$_SESSION['join']['nick_name']),
			//       mysqli_real_escape_string($this->dbconnect,$_SESSION['join']['email']),
			//       mysqli_real_escape_string($this->dbconnect,sha1($_SESSION['join']['password'])),
			//       mysqli_real_escape_string($this->dbconnect,$_SESSION['join']['picture_path'])
			//       );

			// // SQL文の実行
			// // $this->dbconnect
			// mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

		}

		//認証処理
		function login($post){
			//メンバーズテーブルでテーブルの中からメールアドレスとパスワードが入力されたものと合致する
	    // データを取得
	    $sql = "SELECT * FROM `members` WHERE `email`=? AND `password`=?";

	    //SQL文実行
	    // パスワードは、入力されたものを暗号化した上で使用する
	    $data = array($post["email"],sha1($post["password"]));
	    $stmt = $this->dbconnect->prepare($sql);
	    $stmt->execute($data);

	    //1行取得
	    $member = $stmt->fetch(PDO::FETCH_ASSOC);
	    // echo "<pre>";
	    // var_dump($member);
	    // echo "</pre>";
	    
	    if ($member == false){
	      // 認証失敗
	      $error["login"] = "failed";
	    }else{
	    	//認証成功
	    	$error = array();
	    }

	    return $error;

		}


		function update(){

		}

	}

?>