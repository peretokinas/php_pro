<?php

namespace app\models;


class User extends DbModel
{
    public $id;
    public $login;
    public $pass;


    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;

        $this->props = $this->getProps();
    }

    protected static function getTableName() {
        return "users";
    }

}