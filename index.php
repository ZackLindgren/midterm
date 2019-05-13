<?php

// starting a session
session_start();

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Required file
require_once('vendor/autoload.php');
require_once('model/validation.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

// Define arrays
$f3->set('checkOptions', array('This midterm was easy', 'This midterm was unfair',
    'This midterm is for babies', 'This midterm made me run home crying'));

//Define a default route
$f3->route('GET /', function() {

    echo '<h1>Midterm Survey</h1>';
    echo '<a href="survey">Take my Midterm Survey</a>';
});


//Define a survey route
$f3->route('GET|POST /survey', function($f3) {

    if(!empty($_POST))
    {
        $name = $_POST['name'];
        $options = $_POST['options'];

        $f3->set('name', $name);
        $f3->set('options', $options);

        if(validForm()) // validates form data
        {
            $_SESSION['name'] = $name;
            $_SESSION['options'] = $options;

            $f3->reroute('/summary');
        }
    }

    $view = new Template();
    echo $view->render('views/survey.html');
});

//Define a survey route
$f3->route('GET /summary', function() {

    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();