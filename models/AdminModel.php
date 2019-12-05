<?php

namespace Models;

use \Core\Model;
use \Core\Database;

class AdminModel extends Model {
    public $table = 'admins';

    public function auth($name, $pass) {
        $name = mysqli_real_escape_string($GLOBALS['mysql'], $name);
        $pass = mysqli_real_escape_string($GLOBALS['mysql'], $pass);

        $query = "SELECT * FROM ". $this->table . " WHERE `username` = '{$name}' AND `password` = '{$pass}'";

        return Database::getData($query);
    }
}