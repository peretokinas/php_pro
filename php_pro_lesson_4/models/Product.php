<?php

namespace app\models;

class Product extends DbModel {

    protected $id;
    protected $name;
    protected $description;
    protected $price;

    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;

        $this->props = $this->getProps();
    }


    protected static function getTableName() {
        return "products";
    }

}