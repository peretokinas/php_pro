<?php

namespace app\models\example;

class DigitalProduct extends Model {
    
    public function getProfit()  {
        return $this->profit = $this->price*0.5 - $this->firstPrice;
    }

}