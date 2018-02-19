<?php
echo 'routes.phpをとおったよ';
var_dump($_REQUEST['url']);
// members/login というような文字列が格納されてくる
// リソース名/アクション名　という関係で表される

// 1.GET送信されたパラメータを取得
// リソース名、アクション名をそれぞれ配列の状態で代入
// explode:第二引数の文字を第一引数の文字列を区切り文字として分解し、配列で返す
$params = explode("/", $_REQUEST['url']);

// 2.パラメータの分解
$resource = $params[0]; //例)members
$action = $params[1]; //例)login


// 3.コントローラーの呼び出し
require('controllers/'.$resource.'_controller.php');


?>