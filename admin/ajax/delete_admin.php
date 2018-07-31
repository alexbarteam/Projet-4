<?php
require_once '../model/settings.class.php';

$request = new Settings();
$request->delete_admin($request);