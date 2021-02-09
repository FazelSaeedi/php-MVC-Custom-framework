<?php

namespace app\core\middlewares;

use app\core\Application;
use app\core\BaseMiddleware;
use app\core\Request;
use app\core\Response;

class authMiddleware
{

  public $request ;
  public $middlewareIsValid = true ;

  public function __construct(Request $request)
  {
    $this->request = $request ;
    self::execute();
  }


  public function execute()
  {

    if (!$this->middlewareIsValid) {
      echo Response::Json(['error' => 'authorized'] , '404') ;
      exit;
    }

  }
}