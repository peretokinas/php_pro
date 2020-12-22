<?php


namespace app\models;


use app\engine\Db;

abstract class DbModel extends Model
{
    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ["id" => $id], static::class);
    }

    public static function getLimit($page) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT ?";
        return Db::getInstance()->queryLimit($sql, $page);
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);

    }

    public static function getOneWhere($name, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}`=:value";
        return Db::getInstance()->queryObject($sql, ['value' => $value], static::class);

    }

    public static function getCountWhere($name, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE `{$name}`=:value";

        return Db::getInstance()->queryOne($sql, ["value" => $value])['count'];
    }

    public static function getSumWhere($name, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT SUM(price) FROM {$tableName} WHERE `{$name}`=:value";

        return Db::getInstance()->queryOne($sql, ["value" => $value]);
    }

    protected function insert() {

        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            $params[":{$key}"] = $this->$key;
            $columns[] = "`$key`";
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $tableName = static::getTableName();
        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ($values)";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    protected function update() {
        $params = [];
        $colums = [];
        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params[":{$key}"] = $this->$key;
            $colums[] .= "`{$key}` = :{$key}";
            //TODO сбрасывать props только при успешном выполнении запроса
            $this->props[$key] = false;
        }
        $colums = implode(", ", $colums);
        $params[':id'] = $this->id;
        $tableName = static::getTableName();
        $sql = "UPDATE `{$tableName}` SET {$colums} WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, [':id' => $this->id]);
    }

    public function save() {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
}