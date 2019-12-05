<?php

namespace Controllers;

use \Core\Controller;
use \Core\Utils;
use \Models\AdminModel;

class AdminController extends Controller {
    public $model;

    function __construct() {
        $this->model = new AdminModel();
    }

    public function auth() {
        $data = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['username'];
            $pass = Utils::getPassword($_POST['password']);
            $admin = $this->model->auth($user, $pass);

            if (count($admin) == 1) {
                $_SESSION['admin_id'] = $admin[0]['id'];
                header('Location: /');
            } else {
                $data['error'] = 'Пользователь не найден';
            }
        }

        self::drawPage('AdminFormView', 'Авторизация', $data);
    }

    public function logout() {
        unset($_SESSION['admin_id']);
        header('Location: /');
    }
}