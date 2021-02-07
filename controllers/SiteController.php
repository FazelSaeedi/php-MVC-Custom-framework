<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{

  public function home()
  {
    $params = [
      'name' => "the Code Holic"
    ];

    return $this->render('home' , $params);
  }


  public function handlecontect(Request $request)
  {

     $body = $request->getBody();

     print_r($_POST);

     return 'this is handle Content' ;

  }


  public function hellow()
  {
    return 'hi';
  }


  public function Json()
  {

    // print_r($_POST);

    return 'hi';

    $data = [
      'hi' => 'salam' ,
      '2' => [
        'hi' => 'hi' ,
        'w' => '2' ,
        3 => 3
      ],
    ];
    // header('Content-Type: application/json');
    // return json_encode($data);


    //$data = file_get_contents('php://input');

    //$decodedText = html_entity_decode($data);
    //$myArray = json_decode($decodedText, true);


    //print_r($myArray['2']['3']);
  }


}