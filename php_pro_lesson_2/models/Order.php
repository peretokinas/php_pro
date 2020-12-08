<?php

namespace app\models;

class Order extends Model {
    public $id;
    public $userId;
    public $userFullName;
    public $goods = [1 => 3, 2 => 4, 3 => 1]; //для примера , пока нет базы 
    public $ttlQty;
    public $ttlPrice;
    public $status;

    public function getUser($user) {
        $this->userId = $user->id;
        $this->userFullName = $user->name." ".$user->surname;
        return $this;
    }

    protected function getTableName() {
        return "Order";
    }
}