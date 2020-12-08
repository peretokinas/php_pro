<?php

namespace app\models;

class Basket extends Model {
    public $id;
    public $goods = [1 => 3, 2 => 4, 3 => 1]; //для примера , пока нет базы 
    public $ttlQty;
    public $ttlPrice;

    public function getTtlQty() {
        foreach($this->goods as $qty){
            $ttlQty += $qty;
        }
        $this->ttlQty = $ttlQty;
        return $ttlQty;
    }

    protected function getTableName() {
        return "Basket";
    }
}