<?php

namespace Core;

class Model {
    public $table = 'test';

    public function getData() {
        $query = 'SELECT * FROM ' . $this->table;
    }

    public function getDataForOnePage($orderBy = 'id', $asc = true, $offset = 0, $limit = 3) {
        $query = "SELECT * FROM " . $this->table;

        if ($orderBy) {
            $query .= " ORDER BY {$orderBy} " . (($asc) ? 'ASC' : 'DESC');
        }

        $query .= " LIMIT {$offset}, {$limit}";

        return Database::getData($query);
    }
}