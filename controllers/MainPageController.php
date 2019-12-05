<?php

namespace Controllers;

use \Core\Controller;

class MainPageController extends Controller {

    public static function getList() {

        self::drawPage('MainPageView', 'Главная страница');
    }

}

