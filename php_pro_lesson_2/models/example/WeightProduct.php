<?php

namespace app\models\example;

class WeightProduct extends Model {
    public $weight = 1.25;

    public function getProfit()  {
        return $this->profit = $this->price*$this->weight - $this->firstPrice;
    }

}