<?php

class Product
{
    public $id;
    public $price;

    public function __construct($price = null, $id = null)
    {
        $this->price = $price;
    }
}

class Wear extends Product
{
    public $size;
    public $gender;

    public function __construct($price = null, $id = null, $size = null, $gender = null)
    {
        parent::__construct($price, $id);
        $this->size = $size;
        $this->gender = $gender;
    }
}

class Accessories extends Product
{
    public $collection;
    public $composition;

    public function __construct($price = null, $id = null, $collection = null, $composition = null)
    {
        parent::__construct($price, $id);
        $this->collection = $collection;
        $this->composition = $composition;
    }
}

class Basket
{
    public $items = [];
    public $amount;
    public $total;

    public function __construct($items = null, $amount = null, $total = null,)
    {
        $this->items = $items;
        $this->amount = $amount;
        $this->total = $total;
    }

    public function render()
    {
        // рендер корзины
    }
}
