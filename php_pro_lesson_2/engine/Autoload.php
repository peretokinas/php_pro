<?php

class Autoload
{
    public function loadClass($className) {
        $className = str_replace("app","", str_replace("\\", "/", $className));
        include_once DOCROOT . $className . '.php';
    }
}