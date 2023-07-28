<?php

define('TEMPLATES_URL',__DIR__.'/templates');
define('FUNCTIONS_URL',__DIR__.'functions.php');
define('IMAGES_FOLDER',__DIR__.'/../images/');

function addTemplate(string $name, bool $home = false){
    include TEMPLATES_URL."/$name.php";
}

function authenticated(){
    session_start();

    if(!$_SESSION['login']){
        header('location: /');
    }
}

function debugear($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}