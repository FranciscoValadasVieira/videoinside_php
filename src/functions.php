<?php 
require __DIR__ . './../vendor/autoload.php';

function e404() {
    require __DIR__ . './../public/404.php';
    exit();
}


function dd(...$vars) {
    foreach($vars as $var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

function get_pdo() : PDO {
    return new PDO('mysql:host=localhost;dbname=videoinside', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

}

function h(?string $value) : string {
    if ($value === null) {
        return '';
    }
    return htmlspecialchars($value);
}

function render(string $include, $parameters = []) {
    extract($parameters);
    include __DIR__ ."./../public/includes/{$include}.php"; //accolades pour que php ne comprend pas la variable comme $view.php
}

function getPostParam($param)
{
  return isset($_POST[$param]) ? trim($_POST[$param]) : "";
}