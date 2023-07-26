<?php
require 'app.php';

function addTemplate(string $name, bool $home = false){
    include TEMPLATES_URL."/$name.php";
}