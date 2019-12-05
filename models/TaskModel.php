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

    public function getTask($id) {
        $id = mysqli_real_escape_string($GLOBALS['mysql'], $id);

        $query = "SELECT * FROM `".$this->table."` WHERE `id` = '{$id}'";

        return Database::getData($query);
    }

    public function editTask($id, $task, $status, $admin_id) {
        if ($admin_id != null) {
            $admin_id = ", `admin_id` = '{$admin_id}'";
        }
        $query = "UPDATE `".$this->table."` SET `task` = '$task', `status` = '$status' {$admin_id} WHERE `id` = '{$id}'";

        return Database::runQuery($query);
    }
}