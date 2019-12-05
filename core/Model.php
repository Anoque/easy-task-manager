<?php

namespace Core;

class Model {
    public $table = 'test';

    public function getData() {
        $query = 'SELECT * FROM ' . $this->table;
    }

    public function getCount() {
        $query = "SELECT COUNT(`id`) AS `count` FROM " . $this->table;

        return Database::getData($query);
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