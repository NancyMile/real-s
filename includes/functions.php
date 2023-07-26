<?php
require 'app.php';

function addTemplate($name, $home = false){
    include TEMPLATES_URL."/$name.php";
}