<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  crud article admin
$routes->get('/', 'Home::index');
$routes->get('/admin/listeArticle', 'Article::listeArticle');
$routes->get('/admin/ajouterarticle', 'Article::ajouterArticle');
$routes->post('/admin/enregistrerarticle', 'Article::enregistre');
$routes->get('/admin/editer/(:num)', 'Article::editer/$1');
$routes->post('/admin/update/(:num)', 'Article::update/$1');
$routes->get('/admin/supprimer/(:num)', 'Article::supprimer/$1');

// routes vers les pages de client
$routes->get('/client/index', 'Client::index');
$routes->get('/client/about', 'Client::about');
$routes->get('/client/contact', 'Client::contact');
$routes->get('/client/menu', 'Client::menu');
$routes->get('/client/panier', 'Client::panier');


// routes d'athentification
service('auth')->routes($routes);
