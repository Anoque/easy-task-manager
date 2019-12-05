<?php

namespace Core;

class Database {

    public static function runQuery($query) {
        return mysqli_query($GLOBALS['mysql'], $query);
    }

    public static function connectToDb($host, $user, $pass, $db) {
        $GLOBALS['mysql'] = mysqli_connect($host, $user, $pass, $db);
    }
}