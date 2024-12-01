<?php

use App\Controllers\Dashboard;
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
$routes->get('article/detail/(:num)', 'Article::detail/$1');


// routes vers les pages de client
$routes->get('/client/index', 'Client::index');
$routes->get('/client/about', 'Client::about');
$routes->get('/client/contact', 'Client::contact');
$routes->get('/client/menu', 'Client::menu');
$routes->get('/client/panier', 'Client::panier');
$routes->get('/client/checkuser', 'CommandeController::checkuser');
$routes->get('/client/success', 'CommandeController::success');


// table admin 
$routes->get('/admin/table/table', 'TableController::showTable');
$routes->get('/admin/table/addTable', 'TableController::addTable');
$routes->get('/admin/table/edittable(:num)', 'TableController::edit/$1');
$routes->post('/admin/addTable', 'TableController::storeTable');
$routes->post('admin/edittable(:num)', 'TableController::editTable/$1');




$routes->get('/admin/reservation/showCalendar', 'AdminReservationController::showCalendar');
$routes->get('/admin/reservation/getCalendarEvents', 'AdminReservationController::getCalendarEvents');
$routes->get('/admin/reservation/cancelReservation/(:num)', 'AdminReservationController::cancelReservation/$1');

$routes->get('/client/reservation/showReservationForm', 'ClientReservationController::showReservationForm');
$routes->post('/client/reservation/makeReservation', 'ClientReservationController::makeReservation');
$routes->get('/admin/dashboard', 'AdminDashboard::index');

$routes->get('/admin/commandes', 'AdminCommandeController::index');
$routes->get('/admin/commandes/markAsDelivered/(:num)', 'AdminCommandeController::markAsDelivered/$1');
$routes->get('/admin/commandes/delete/(:num)', 'AdminCommandeController::delete/$1');




$routes->post('/enregistrecommande', 'CommandeController::enregistrecommande');




// routes d'athentification
service('auth')->routes($routes);
