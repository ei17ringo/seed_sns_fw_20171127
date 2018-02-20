<?php
echo "Hello tweets_controller!";

// コントローラーのクラスをインスタンス化
$controller = new TweetsController();

// アクション名によって実行するメソッドを変える
switch ($action) {
  case 'index':
    $controller->index();
  default:
    break;
}


class TweetsController {

  function index(){

    echo "indexメソッド実行してます";

    $resouce = 'tweets';
    $action = 'index';

    include('views/layouts/application.php');
  }

}
?>