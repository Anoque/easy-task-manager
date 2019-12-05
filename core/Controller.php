<?php

namespace Core;

class Controller {

    public static function drawPage($name, $title = null) {
        $templateName = $name;
        $title = $title ?? 'Easy task manager';

        include 'view/template.php';
    }

}