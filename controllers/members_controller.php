<?php

session_start();

//モデルファイルの読み込み
require ('models/member.php');

// コントローラーのクラスをインスタンス化
$controller = new MembersController();

// アクション名によって実行するメソッドを変える
switch ($action) {
	case 'signup':
		// var_dump($_POST);

		$controller->signup($_POST,$_FILES);
		break;
	case 'login':
		$controller->login();
		break;
	case 'check':
		$controller->check($_POST);
		break;
	case 'thanks':
		$controller->thanks();
		break;
	
	default:
		# code...
		break;
}

class MembersController {

	// members/signup というURLで呼び出される
	function signup($post,$files){
		
		//フォームからデータがPOST送信された時
		if (!empty($post)){
		  // エラー項目の確認
		  //ニックネーム
		  if ($post['nick_name'] == ''){
		    $error['nick_name'] = 'blank';
		  }

		  //email
		  if ($post['email'] == ''){
		    $error['email'] = 'blank';
		  }

		  //パスワード（空チェック,文字長チェック：4文字以上）
		  if ($post['password'] == ''){
		    $error['password'] = 'blank';
		  }else if (strlen($post['password']) < 4){
		    $error['password'] = 'length';
		  }

		  // //画像ファイルの拡張子チェック（$_FILES）
		  // $fileName = $files['picture_path']['name'];
		  // if (!empty($fileName)){

		  //     //拡張子を取得
		  //     $ext = substr($fileName, -3);
		  //     $ext = strtolower($ext);

		  //     if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png') {
		  //       $error['picture_path'] = 'type';
		  //     }
		  // }


		  //エラーがない場合
		  if (empty($error)){
		    // //画像をアップロードする
		    // $picture_path = date('YmdHis') . $files['picture_path']['name'];
		    // move_uploaded_file($files['picture_path']['tmp_name'], '../member_picture/' . $picture_path);

		    // セッションに値を保存
		    $_SESSION['join'] = $post;
		    $_SESSION['join']['picture_path'] = $picture_path;

		    header('Location: /seed_sns_fw/members/check');
		  }
		}

//   //書き直し
//   if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'rewrite'){
//       $_POST = $_SESSION['join'];
//       $error['rewrite'] = true;
//   }


		// 見た目HTMLの表示
		$resouce = 'members';
		$action = 'signup';

		include('views/layouts/application.php');

	}

	// members/login
	function login(){
		
		// post送信されたら、認証処理を行い、tweets/indexにリダイレクトしてください
		// tweets/indexにアクセスしたらつぶやき一覧のモックアップが出るようにして欲しい
		// 認証処理部分は、モデルファイルに記述して、コントローラーは簡素に仕上げる 
		// 引数で$_POSTを受け取る必要があります

		echo 'members login';

		$resouce = 'members';
		$action = 'login';

		include('views/layouts/application.php');

	}

	// members/check
	function check($post){
		// セッションにデータがなかったらindex.phpへ遷移する
		  if (!isset($_SESSION['join'])){
		    header('Location: /seed_sns_fw/members/signup');
		    exit();
		  }


		 // DB登録処理
  		if (!empty($post)){
	  		//モデルを呼び出す
			$member = new Member();
			//登録処理の実行
			$member->create();

			header("Location: /seed_sns_fw/members/thanks");
			exit();
  		}


		$resouce = 'members';
		$action = 'check';

		include('views/layouts/application.php');

	}

	// members/check
	function thanks(){
		echo 'm thanks';

		$resouce = 'members';
		$action = 'thanks';

		include('views/layouts/application.php');

	}

	// members/logout
	function logout(){
		echo 'm logout';

		

	}

}


?>