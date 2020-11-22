<?php

use Routes\Route;

require_once __DIR__ . '/vendor/autoload.php';


echo Route::route($_SERVER['REQUEST_URI']);






