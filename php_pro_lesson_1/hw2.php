<?php

class Db {
    protected $tableName;
    protected $id = '';
    protected $name = '';
    protected $session = '';
    public $sql;

    public function table($tableName) 
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function first($id) 
    {
        $this->id = $id;
        return $this;
    }

    public function where($key, $value)
    {
        switch($key)
        {
            case 'name':
                $this->name = $value;
                break;
            case 'id':
                $this->id = $value;
                break;
            case 'session':
                $this->session = $value;
                break;     
        }
        return $this;
    }

    public function get()
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE name = {$this->name} AND id = {$this->id} AND session = {$this->session}";
        echo $this->sql;
    }
}

$db = new Db();

echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->get();
//что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5
