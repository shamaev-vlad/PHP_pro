<?php

namespace app\models;

use app\interfaces\IRecord;
use app\services\Db;
use app\services\IDb;

abstract class Record implements IRecord
{
    protected $id;
    protected $db = null;

    public function __construct(IDb $db)
    {
        $this->db = $db;
    }

    public static function getById(int $id): Record
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject(get_called_class(), $sql, [':id' => $id])[0];
    }

    public static function getALl()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete()
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function insert()
    {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if(in_array($key,['db', 'tableName'])) {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsertId();
    }

    public function actionLogin()
    {
        $this->useLayout = true;
        $login = $_GET['login'];
        $pass = $_GET['pass'];
        if ($login && $pass) {
            $query = "SELECT * FROM users WHERE login = '{$login}' AND password = '{$pass}'";
            $auth = Auth::freeQuery($query)[0];
            if ($auth) {
                $auth->message = 'Авторизация прошла успешно!';
                echo $this->render("auth", ['auth' => $auth]);
            } else {
                $this->actionIndex();
            }
            return;
        }
        $this->actionIndex();
    }


    public function update()
    {

    }

    public function save()
    {
      if (is_null($this->id)) {
            return $this->insert();
        } else {
            return $this->update();
        }

    }


}
