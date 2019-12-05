<?php

namespace Core;

class Controller {
    public $model;

    public static function drawPage($name, $title = null, $data = null) {
        $templateName = $name;
        $title = $title ?? 'Easy task manager';

        include 'view/template.php';
    }

}