<?php

namespace Controllers;

use \Core\Controller;

class MainPageController extends Controller {

    public static function getList() {
        // return 'test';
        self::drawPage('MainPageView');
    }

}

