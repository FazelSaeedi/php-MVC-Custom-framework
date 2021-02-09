<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\authMiddleware;
use app\core\Request;
use app\core\Response;
use app\model\User;
use app\Repository\testRepositoryPDO;

class AuthController extends Controller
{
  protected $repositoryPDO ;

  public function __construct()
  {


    $this->repositoryPDO = new testRepositoryPDO();


  }

  public function login(Request $request)
  {
    // return 'this is handle login' ;

    if ($request->isPost()) {


      return 'Handle submitted dataSsSsSsSsSs' ;
    }

  }

  public function register(Request $request)
  {

     new authMiddleware($request);

     $user = new User();
     $user->loadData($request->getBody());


    if(!$user->validate() )
        return Response::Json($user->errors , 404);


     return  $this->repositoryPDO->addUser($user->email ,$user->firstname, $user->lastname , $user->password);


  }

  public function test()
  {
    return 'test';
  }

}