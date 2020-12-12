<?php


namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    public function __set($prop, $value) {
        $this->props[$prop] = [true, $value];
        $this->$prop = $value;
    }

    public function __get($prop) {
        return $this->$prop;
    }

    public function getProps() {
        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $props[$key] = [false, $value];
        }
        $this->props = $props;
        return $props;
    }

    abstract protected static function getTableName();
}