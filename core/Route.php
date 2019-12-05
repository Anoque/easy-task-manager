<?php

namespace Core;

use \Controllers\TaskController;
use \Controllers\AdminController;
use \Core\Controller;
use \Core\Utils;

class Route {
	public static function start() {
        $routes = explode('?', $_SERVER['REQUEST_URI']);
        $routes = explode('/', $routes[0]);

        if (mb_strlen($routes[1]) == 0 || $routes[1] == 'tasks') {
            $task = new TaskController();

            if ($routes[1] == 'tasks') {
                switch ($routes[2]) {
                    case 'add':
                        $task->addTask();
                        break;

                    case 'edit':
                        if (count($routes) > 3 && Utils::isAdmin())
                            $task->editTask($routes[3]);
                        else
                            self::error404();

                        break;

                    default:
                        self::error404();
                        break;
                }
            } else {
                // Main page
                $task->getList();
            }
        } else if ($routes[1] == 'admin') {
                $admin = new AdminController();

                switch ($routes[2]) {
                    case 'auth':
                        $admin->auth();
                        break;
                    case 'logout':
                        $admin->logout();
                        break;
                    default:
                        self::error404();
                        break;
                }
        } else {
            self::error404();
        }
    }

    public static function error404() {
        Controller::drawPage('error404', 'Страница не найдена');
    }
}