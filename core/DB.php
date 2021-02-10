<?php

namespace app\core;

use PDO;

abstract class DB extends Model
{

  /**
   * DB constructor.
   */


  public static function prepare($sql)
  {
    return Application::$app->db->pdo->prepare($sql);
  }

  public static function doSelect($sql , $values=[] , $fech='' , $fechstyle = PDO::FETCH_ASSOC)
  {

      $stmt = self::prepare($sql);
      foreach ($values as $key=>$value)
      {
        $stmt->bindValue($key+1,$value);
      }
      $stmt->execute();


      if($fech=='')
        $result = $stmt->fetchAll($fechstyle);
      else
        $result = $stmt->fetch($fechstyle);


      return $result;
  }


  public static function doQuery($sql, $values = array())
  {

      $stmt = self::prepare($sql);

      foreach ($values as $key => $value) {
        $stmt->bindValue($key + 1, $value);
      }
      $stmt->execute();

  }
}