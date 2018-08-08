<?php

require './bootstrap.php';
$control = null;

if (isset($_GET['control'])) {
    $control = $_GET['control'] . "Controller";
    unset($_GET['control']);
    new $control;
} else {
    new Controller;
}


