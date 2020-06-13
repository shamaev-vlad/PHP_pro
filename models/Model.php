<?php
namespace app\models;

use app\interfaces\IModel;
use app\services\Db;

abstract class Model implements IModel
{
    protected $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getColumns($table)
    {
    $sql = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='{$table}'";
    $result = $this->db->queryAll($sql);
    $columns = ``;
    foreach ($result as $value){
        foreach ($value as $find){
            if($find !== 'id' & $find !== 'created'){
                $columns .= $find . ", ";
            }
        }
    }
    return substr($columns, 0, -2);
    }

    public function create($params = [])
    {
        $table = $this->getTableName();
        $columns = $this->getColumns($table);
        $values = implode(", ", $params);
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        return $this->db->execute($sql);
    }


    public function getById(int $id): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function getOne($id)
    {
    $table = $this->getTableName();
    $sql = "SELECT * FROM {$table} WHERE id = :id";
    return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function getAll()
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    public function delete($id)
    {
        $table = $this->getTableName();
        $sql = "DELETE FROM {$table} WHERE id = {$id[0]}";
        var_dump($sql);
        var_dump($id[0]);
        return $this->db->execute($sql, $id);
    }
}
