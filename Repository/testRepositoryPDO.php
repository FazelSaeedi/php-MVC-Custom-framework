<?php

namespace app\Repository;

use app\core\DB;
use app\model\User;

class testRepositoryPDO implements testRepositoryInterface
{

  public function addUser($email, $firstname, $lastname , $password )
  {

    $sql = "insert into users (email, firstname, lastname, password ) VALUES (?,?,?,?)";
    $value = array($email, $firstname, $lastname , $password );

    return DB::doQuery($sql, $value);


  }
}