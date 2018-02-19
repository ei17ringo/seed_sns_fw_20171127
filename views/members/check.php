<?php
  $nick_name = htmlspecialchars($_SESSION['join']['nick_name'],ENT_QUOTES,'UTF-8');
  $email = htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES,'UTF-8');
?>

  <div class="row">
      <div class="col-md-4 col-md-offset-4 content-margin-top">
        <form method="post" action="" class="form-horizontal" role="form">
          <input type="hidden" name="action" value="submit">
          <div class="well">ご登録内容をご確認ください。</div>
            <table class="table table-striped table-condensed">
              <tbody>
                <!-- 登録内容を表示 -->
                <tr>
                  <td><div class="text-center">ニックネーム</div></td>
                  <td><div class="text-center"><?php echo $nick_name; ?></div></td>
                </tr>
                <tr>
                  <td><div class="text-center">メールアドレス</div></td>
                  <td><div class="text-center"><?php echo $email; ?></div></td>
                </tr>
                <tr>
                  <td><div class="text-center">パスワード</div></td>
                  <td><div class="text-center">●●●●●●●●</div></td>
                </tr>
                <tr>
                  <td><div class="text-center">プロフィール画像</div></td>
                  <td><div class="text-center"><img src="http://c85c7a.medialib.glogster.com/taniaarca/media/71/71c8671f98761a43f6f50a282e20f0b82bdb1f8c/blog-images-1349202732-fondo-steve-jobs-ipad.jpg" width="100" height="100"></div></td>
                </tr>
              </tbody>
            </table>

            <a href="index.html">&laquo;&nbsp;書き直す</a> |
            <input type="submit" class="btn btn-default" value="会員登録">
          </div>
        </form>
      </div>
    </div>