<?php

namespace app\model;

use app\core\DBModel;
use app\core\Model;

class User extends DBModel
{

  public string $firstname = '';
  public string $lastname = '';
  public string $email = '';
  public string $password = '';
  public string $passwordConfirm = '';


  public function tableName(): string
  {
      return 'users';
  }

  public function register()
  {
     $this->save();
  }

  public function rules(): array
  {

    return [
      'firstname' => [self::RULE_REQUIRED],
      'lastname' => [self::RULE_REQUIRED],
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL , [
        self::RULE_UNIQUE , 'class' => self::class
      ]],
      'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8] , [self::RULE_MAX, 'max' => 15]],
      'passwordConfirm' => [[self::RULE_MATCH, 'match' => 'password']],

    ];

  }

  public function attributes(): array
  {
    return ['firstname' , 'lastname' , 'email' , 'password'];
  }
}