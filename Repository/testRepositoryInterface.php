<?php

namespace app\Repository;

use app\model\User;

interface testRepositoryInterface
{
  public function addUser($email, $firstname, $lastname , $password );
}