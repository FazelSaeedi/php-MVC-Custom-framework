<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{

  public function login(Request $request)
  {
    // return 'this is handle login' ;

    if ($request->isPost()) {
      return 'Handle submitted dataSsSsSsSsSs' ;
    }

  }

  public function register()
  {
    return 'this is handle register' ;
  }

}