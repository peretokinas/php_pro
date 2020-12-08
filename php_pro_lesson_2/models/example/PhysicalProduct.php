<?php

namespace app\models\example;

class PhysicalProduct extends Model {

    public function getProfit()  {
        return $this->profit = $this->price - $this->firstPrice;
    }

}