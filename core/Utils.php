<?php

namespace Core;

class Utils {

    public static function getAllUrl($variable, $value) {
        $add = array(
            $variable => $value
        );
        
        if (array_key_exists($variable, $GLOBALS['get'])) {
            // if (!($variable == 'orderBy' && $value == $GLOBALS['get'][$variable])) {
                unset($GLOBALS['get'][$variable]);
            // }
        }

        return http_build_query(array_merge($add, $GLOBALS['get']));
    }

    public static function orderByCheck($key) {
        return isset($GLOBALS['get']['orderBy']) && $GLOBALS['get']['orderBy'] == $key;
    }

    public static function getPassword($pass) {
        return md5('lol' . $pass . 'kek');
    }

    public static function isAdmin() {
        return isset($_SESSION['admin_id']) && $_SESSION['admin_id'] > 0;
    }

}