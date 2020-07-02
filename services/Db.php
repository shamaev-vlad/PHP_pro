<?php

namespace app\services;

use PDO;

class Db
{
    use TSingleton;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'GB_pro',
        'charset' => 'utf8',
    ];

    /**
     * @var \PDO
     */
    private $connection = null;

    public function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->buildDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );
        }

        return $this->connection;
    }

    private function query(string $sql, array $params = []) {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function execute(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }

    public function getLastInsertId()
  {
      return $this->getConnection()->lastInsertId();
  }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($classname, $sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
      $pdoStatement = $this->query($sql, $params);
      $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $classname);
      return $pdoStatement->fetchAll();
    }

    private function buildDsnString()
    {
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset'],
        );
    }
}
