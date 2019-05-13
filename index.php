<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Required file
require_once('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {

    echo '<h1>Midterm Survey</h1>';
    echo '<a href="survey">Take my Midterm Survey</a>';
});


//Define a route
$f3->route('GET /summary', function() {

    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();