<?php

namespace Core;

class Database {

    public static function runQuery($query) {
        self::clearFields($query);
        return mysqli_query($GLOBALS['mysql'], $query);
    }

    public static function connectToDb($host, $user, $pass, $db) {
        $GLOBALS['mysql'] = mysqli_connect($host, $user, $pass, $db);
    }

    public static function getData($query) {
        if ($run = self::runQuery($query)) {
            $data = array();

            while ($row = mysqli_fetch_assoc($run)) {
                $data[] = $row;
            }

            return $data;
        }
        
        return false;
    }

    public static function clearFields(&$field) {
        $field = preg_replace('#<script[^>]*>.*?</script>#is', '', $field);
        $field = strip_tags($field);
    }
}