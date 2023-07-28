<?php

define('TEMPLATES_URL',__DIR__.'/templates');
define('FUNCTIONS_URL',__DIR__.'functions.php');

function addTemplate(string $name, bool $home = false){
    include TEMPLATES_URL."/$name.php";
}

function authenticated():bool{
    session_start();
    $auth = $_SESSION['login'];
    if($auth){
        return true;
    }
    return false;
}

function debugear($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}