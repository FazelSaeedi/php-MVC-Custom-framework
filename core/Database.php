<?php

namespace app\core;



class Database
{

  public \PDO $pdo;
  /**
   * Database constructor.
   */
  public function __construct(array $config)
  {


    $user = $config['user'] ?? '';
    $password = $config['password'] ?? '';
    $host = $config['host'] ?? '';
    $port = $config['port'] ?? '';
    $dbname = $config['dbname'] ?? '';


    $attr = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $this->pdo  = new \PDO('mysql:host=' .$host. ';port = '.$port.';dbname=' .$dbname , $user , $password , $attr);

    $this->pdo->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);


  }

  public function applyMigrations()
  {
    $this->createMigrationsTable();
    $appliedMigrations = $this->getAppliedMigrations();

    $files = scandir(Application::$ROOT_DIR . '/migrations');
    $toApplyMigrations = array_diff($files, $appliedMigrations);

    foreach ($toApplyMigrations as $migration) {
      if ($migration === '.' || $migration === '..') {
        continue;
      }

      require_once Application::$ROOT_DIR . '/migrations/' . $migration;
      $className = pathinfo($migration, PATHINFO_FILENAME);
      $instance = new $className();
      $this->log("Applying migration $migration");
      $instance->up();
      $this->log("Applied migration $migration");
      $newMigrations[] = $migration;

    }

    if (!empty($newMigrations)) {
      $this->saveMigrations($newMigrations);
    } else {
      $this->log("There are no migrations to apply");
    }


  }

  protected function createMigrationsTable()
  {
    $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;");
  }

  protected function getAppliedMigrations()
  {
    $statement = $this->pdo->prepare("SELECT migration FROM migrations");
    $statement->execute();

    return $statement->fetchAll(\PDO::FETCH_COLUMN);
  }


  protected function saveMigrations(array $newMigrations)
  {
    $str = implode(',', array_map(fn($m) => "('$m')", $newMigrations));
    $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $str
        ");
    $statement->execute();
  }

  public function prepare($sql): \PDOStatement
  {
    return $this->pdo->prepare($sql);
  }


  private function log($message)
  {
    echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
  }
}

