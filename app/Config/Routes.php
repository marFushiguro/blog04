<?php
$routes->get('/', 'Auth::login'); 
$routes->post('/login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('posts', 'Posts::index');
    $routes->get('posts/create', 'Posts::create');
    $routes->post('posts/store', 'Posts::store');
    $routes->get('posts/edit/(:num)', 'Posts::edit/$1');
    $routes->post('posts/update/(:num)', 'Posts::update/$1');
    $routes->get('posts/delete/(:num)', 'Posts::delete/$1');
});