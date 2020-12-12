<?php

namespace app\models;

class News extends DbModel {

    protected $id;
    protected $header;
    protected $article;
    protected $create_at;

    public function __construct($header = null, $article = null, $create_at = null)
    {
        $this->header = $header;
        $this->article = $article;
        $this->create_at = $create_at;

        $this->props = $this->getProps();
    }


    protected static function getTableName() {
        return "News";
    }

}