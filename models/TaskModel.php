<?php

namespace Models;

use \Core\Model;
use \Core\Database;

class TaskModel extends Model {
    public $table = 'tasks';

    public function addTask($name, $email, $task) {
        $name = mysqli_real_escape_string($GLOBALS['mysql'], $name);
        $email = mysqli_real_escape_string($GLOBALS['mysql'], $email);
        $task = mysqli_real_escape_string($GLOBALS['mysql'], $task);

        $query = "INSERT INTO `" . $this->table . "` (`username`, `email`, `task`) VALUES ('{$name}', '{$email}', '{$task}')";

        return Database::runQuery($query);
    }
}