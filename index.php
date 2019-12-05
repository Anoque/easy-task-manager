<?php

session_start();

echo $_SESSION['admin_id'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);

require_once('core/Controller.php');
require_once('core/Model.php');
require_once('core/Database.php');
require_once('core/Route.php');
require_once('core/Utils.php');
require_once('controllers/TaskController.php');
require_once('controllers/AdminController.php');
require_once('models/TaskModel.php');
require_once('models/AdminModel.php');

use \Core\Route;
use \Core\Database;

Database::connectToDb('localhost', 'hello', 'root', 'task_manager');

$GLOBALS['get'] = $_GET;

Route::start();