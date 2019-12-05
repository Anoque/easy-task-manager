<?php

namespace Controllers;

use \Core\Controller;
use \Models\TaskModel;

class TaskController extends Controller {
    public $model;

    function __construct() {
        $this->model = new TaskModel();
    }

    public function getList() {
        $orderBy = 'id';
        $asc = true;
        $offset = 0;
        $limit = 3;

        if (isset($GLOBALS['get']['page']))
            $offset = $limit * ($_GET['page'] - 1);
        if (isset($GLOBALS['get']['orderBy']))
            $orderBy = $GLOBALS['get']['orderBy'];
        if (isset($GLOBALS['get']['desc']))
            $asc = false;

        $data['tasks'] = $this->model->getDataForOnePage($orderBy, $asc, $offset, $limit);
        $count = $this->model->getCount();
        $data['pages'] = ceil($count[0]['count'] / $limit);

        self::drawPage('MainPageView', 'Главная страница', $data);
    }

    public function addTask() {
        $data = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['username'];
            $email = $_POST['email'];
            $task = $_POST['task'];

            if (!(mb_strlen($name) > 0 && mb_strlen($name) <= 255)) {
                $data['errors']['username'] = 'Недопустимые значения или длина (длина текста 1-255)';
            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $data['errors']['email'] = 'Недопустимые значения или длина';
            }

            if (!(mb_strlen($task) > 0 && mb_strlen($task) <= 255)) {
                $data['errors']['task'] = 'Недопустимые значения или длина (длина текста 1-255)';
            }

            if (isset($data['errors']) && !empty($data['errors'])) {
                $data['added'] = false; 
            } else {
                $data['added'] = $this->model->addTask($name, $email, $task);
            }
        }

        self::drawPage('AddTaskView', 'Добавление задачи', $data);
    }

    public function editTask($id) {
        $data = array();
        $task = $this->model->getTask($id);

        $data['id'] = $id;
        $data['username'] = $task[0]['username'];
        $data['email'] = $task[0]['email'];
        $data['task'] = $task[0]['task'];
        $data['status'] = $task[0]['status'];
        $data['isAdmin'] = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin_id = null;
            $task = $_POST['task'];
            $status = isset($_POST['status']) ? '1' : '0';

            if (!(mb_strlen($task) > 0 && mb_strlen($task) <= 255)) {
                $data['errors']['task'] = 'Недопустимые значения или неверная длина (1-255)';
            }


            if ($data['task'] != $task) {
                $admin_id = $_SESSION['admin_id'];
            }

            $data['edited'] = (isset($data['errors']) && !empty($data['errors'])) ? false : $this->model->editTask($id, $task, $status, $admin_id);

            if ($data['edited']) {
                header('Location: /tasks/edit/' . $id);
            }
        }

        self::drawPage('AddTaskView', 'Добавление задачи', $data);
    }

}