<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\RegisterModel;
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

     $registerModel = new RegisterModel();
     $registerModel->loadData($request->getBody());


    if(!$registerModel->validate())
        return Response::Json($registerModel->errors , 404);



    return $this->repositoryPDO->test();


  }

  public function test()
  {
    return 'test';
  }

}