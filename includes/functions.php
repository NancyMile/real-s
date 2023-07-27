<?php
require 'app.php';

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