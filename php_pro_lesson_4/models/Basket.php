<?php


namespace app\models;


class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $product_id;

    public static function getBasket($session_id) {
        $sql = "JOIN";
        return [];
    }

    protected static function getTableName()
    {
        return "basket";
    }
}