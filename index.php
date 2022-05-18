<?php 
session_start();
require_once("vendor/autoload.php");

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

ini_set('display_errors',1);
error_reporting(E_ALL);

use \Slim\Slim;

//$app = new \Slim\App();
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$app->config('debug', true);

require_once("views/sistema/functions.php");

require_once("config/routes/site.php");

$app->run();

?>