<?php


namespace app\models;


use app\engine\Db;

abstract class DbModel extends Model
{
    public static function getOne($id) {
        $tableName = static::getTableName();
        $params = ["id" => $id];
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, $params, static::class);
    }

    public static function getLimit($page) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, :page";
        return Db::getInstance()->queryLimit($sql, $page);
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);

    }

    public function insert() {
        $params = [];
        $columns = [];
        $tableName = static::getTableName();

        foreach ($this->props as $key => $value) {
            $params[":{$key}"] = $value[1];
            $columns[] = "`$key`";
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ($values)"; 
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function update() {
        $params = [];
        $sql = [];
        $tableName = static::getTableName();
        $params[':id'] = $this->id;

        foreach ($this->props as $key => $value) {
            if ($value[0] == false) continue;

            $params[":{$key}"] = $value[1];
            $sql[] = "`{$key}` = :$key";
        }
        $sql = implode(", ", $sql);
        $sql = "UPDATE `{$tableName}` SET ".$sql." WHERE id = :id ";

        return Db::getInstance()->execute($sql, $params);
    }

    public function delete() {
        $tableName = static::getTableName();
        $params = [':id' => $this->id];
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, $params);
    }

    public function save() {
        is_null($this->id) ? $this->insert() : $this->update();
    }
}