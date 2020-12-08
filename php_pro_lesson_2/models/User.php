<?php

namespace app\models;

class User extends Model
{
    public $id;
    public $name;
    public $surname;
    public $login;
    public $pass;

    protected function getTableName() {
        return "User";
    }
}