<?php

namespace Core;

use \Controllers\MainPageController;

class Route {
	public static function start() {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            if (count($routes) > 1 && mb_strlen($routes[1]) == 0) {
                MainPageController::getList();
            } else {
                // Other pages
            }

        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // For forms
        }
    }

}