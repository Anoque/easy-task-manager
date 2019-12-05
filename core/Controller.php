<?php

namespace Core;

class Controller {
    public $model;

    public static function drawPage($name, $title = null, $data = null) {
        $templateName = $name;
        $title = ($title == null) ? 'Easy task manager' : $title;

        include 'view/template.php';
    }

}