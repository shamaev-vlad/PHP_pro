
<?php

namespace app\controllers;

use app\models\Auth;

class AuthController extends Controller
{
  public function actionIndex()
  {
      $auth = (object)array('message' => 'Вы не авторизованы на сайте!');
      echo $this->render("form", ['auth' => $auth]);
  }

}
