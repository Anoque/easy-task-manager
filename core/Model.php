<?php

namespace Core;

class Model {
    public $table;

    public function getData() {
        $query = 'SELECT * FROM ' . $table;
    }
}