<?php

function __autoload($classe) {
    
    if (file_exists("Apps/" . $classe . ".php")) {
        require "Apps/" . $classe . ".php";
    }
    if (file_exists("Classes/" . $classe . ".php")) {        
        require "Classes/" . $classe . ".php";
    }
    if (file_exists("Controllers/" . $classe . ".php")) {
        require "Controllers/" . $classe . ".php";
    }
    if (file_exists("Dao/" . $classe . ".php")) {
        require "Dao/" . $classe . ".php";
    }
    if (file_exists("Views/" . $classe . ".php")) {        
        require "Views/" . $classe . ".php";
    }
}
