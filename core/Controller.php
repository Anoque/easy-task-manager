<?php

namespace Core;

class Controller {

    public static function drawPage($name) {
        $templateName = $name;
        include 'view/template.php';
    }

}