<?php

use App\Controllers\Dashboard;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  crud article admin
// $routes->get('/', 'Home::index');
// $routes->get('/admin/listeArticle', 'Article::listeArticle');
// $routes->get('/admin/ajouterarticle', 'Article::ajouterArticle');
// $routes->post('/admin/enregistrerarticle', 'Article::enregistre');
// $routes->get('/admin/editer/(:num)', 'Article::editer/$1');
// $routes->post('/admin/update/(:num)', 'Article::update/$1');
// $routes->get('/admin/supprimer/(:num)', 'Article::supprimer/$1');
// $routes->get('article/detail/(:num)', 'Article::detail/$1');


// // routes vers les pages de client
$routes->get('/client/index', 'Client::index');
$routes->get('/client/about', 'Client::about');
$routes->get('/client/contact', 'Client::contact');
$routes->get('/client/menu', 'Client::menu');
$routes->get('/client/panier', 'Client::panier');
$routes->get('/client/success', 'CommandeController::success');






// $routes->get('/client/reservation/showReservationForm', 'ClientReservationController::showReservationForm');
// $routes->post('/client/reservation/makeReservation', 'ClientReservationController::makeReservation');
// $routes->get('/admin/dashboard', 'AdminDashboard::index');

// $routes->get('/admin/commandes', 'AdminCommandeController::index');
// $routes->get('/admin/commandes/markAsDelivered/(:num)', 'AdminCommandeController::markAsDelivered/$1');
// $routes->get('/admin/commandes/delete/(:num)', 'AdminCommandeController::delete/$1');


// $routes->get('livreur/showCommande', 'LivreurCommandeController::showCommande');
// $routes->get('livreur/prendreCommande/(:num)', 'LivreurCommandeController::prendreCommande/$1');
// $routes->get('livreur/takeCommande/(:num)', 'LivreurCommandeController::takeCommande/$1');
// $routes->get('livreur/markasLivree/(:num)', 'LivreurCommandeController::markAsLivree/$1');
// $routes->get('livreur/ignorerCommande/(:num)', 'LivreurCommandeController::ignorerCommande/$1');
// $routes->get('livreur/markaslivred', 'LivreurCommandeController::markAsLivred');




$routes->group('client', function($routes) {
    // Afficher le formulaire de modification de l'adresse
    $routes->get('editAddress', 'ClientAdresseController::editAddress');

    // Soumettre le formulaire pour mettre à jour l'adresse
    $routes->post('updateAddress', 'ClientAdresseController::updateAddress');
});
$routes->group('admin', ['filter' => 'role:administrateur'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'AdminDashboard::index');

    // Gestion des articles
    $routes->get('listeArticle', 'Article::listeArticle');
    $routes->get('ajouterarticle', 'Article::ajouterArticle');
    $routes->post('enregistrerarticle', 'Article::enregistre');
    $routes->get('editer/(:num)', 'Article::editer/$1');
    $routes->post('update/(:num)', 'Article::update/$1');
    $routes->get('supprimer/(:num)', 'Article::supprimer/$1');

    // Gestion des commandes
    $routes->get('commandes', 'AdminCommandeController::index');
    $routes->get('commandes/markAsDelivered/(:num)', 'AdminCommandeController::markAsDelivered/$1');
    $routes->get('commandes/delete/(:num)', 'AdminCommandeController::delete/$1');
});
// $routes->group('client', ['filter' => 'role:client'], function ($routes) {
//     $routes->get('index', 'Client::index');
//     $routes->get('about', 'Client::about');
//     $routes->get('contact', 'Client::contact');
//     $routes->get('menu', 'Client::menu');
//     $routes->get('panier', 'Client::panier');
//     $routes->get('success', 'CommandeController::success');
// });
$routes->group('livreur', ['filter' => 'role:livreur'], function ($routes) {
    $routes->get('showCommande', 'LivreurCommandeController::showCommande');
    $routes->get('prendreCommande/(:num)', 'LivreurCommandeController::prendreCommande/$1');
    $routes->get('takeCommande/(:num)', 'LivreurCommandeController::takeCommande/$1');
    $routes->get('markasLivree/(:num)', 'LivreurCommandeController::markAsLivree/$1');
    $routes->get('ignorerCommande/(:num)', 'LivreurCommandeController::ignorerCommande/$1');
    $routes->get('markaslivred', 'LivreurCommandeController::markAsLivred');
});

$routes->get('/no-access', function () {
    return view('errors/no_access');
});

$routes->get('/', 'Home::index');










$routes->post('/enregistrecommande', 'CommandeController::enregistrecommande');




// routes d'athentification
service('auth')->routes($routes);
