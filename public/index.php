<?php
require '../vendor/autoload.php';
use phpbrowscap\Browscap;

// Instantiate the application
$app = new \Slim\Slim(array(
  'view' => '\Slim\LayoutView',
  'templates.path' => '../templates',
  'layout' => 'layouts/desktop.php'
));

/*
$app->hook('slim.before', function () use ($app) {
    // create a new Browscap object (loads or creates the cache)
    $bc = new Browscap('../cache');

    // get information about the current browser's user agent
    $current_browser = $bc->getBrowser();

    // redirect to the mobile site if this is mobile
    if ($current_browser->isMobileDevice) {
        $path = $app->request()->getResourceUri();
        $url = 'http://m.example.com' . $path;
        $app->response()->redirect($url, 301);
    }
});
*/

// add device-switching middleware
$app->add(new LayoutSwitcherMiddleware());

// define the routes
$app->get('/', function () use ($app) {
    $app->render('home.php');    
});

$app->get('/download', function () use ($app) {
    $app->render('download.php');    
});

// run the application
$app->run();
