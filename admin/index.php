<?php
ini_set('display_errors', 1);
require ('./controller/controller.php');

$controller = new Controller();
$controller->renderView();