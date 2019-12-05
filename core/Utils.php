<?php

namespace Core;

class Utils {

    public static function getAllUrl($variable, $value) {
        $add = array();
        $get = $_GET;

        if (array_key_exists($variable, $get)) {
            $get[$variable] = $value;
        } else {
            $add[$variable] = $value;
        }

        return http_build_query(array_merge($add, $get));
    }

    public static function orderByCheck($key) {
        return isset($_GET['orderBy']) && $_GET['orderBy'] == $key;
    }

    public static function getPassword($pass) {
        return md5('lol' . $pass . 'kek');
    }

    public static function isAdmin() {
        return isset($_SESSION['admin_id']) && $_SESSION['admin_id'] > 0;
    }

}