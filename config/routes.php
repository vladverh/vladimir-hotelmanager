<?php

$router = $container->getRouter();
$router->setNamespace('App\Controller');

/**
 * Routes de base
 */
$router->get('', 'PagesController@index'); // Page d'accueil contenant entre autres la liste des rooms


/**
 * Routes ROOM
 */
$router->get('', 'PagesController@index'); // Page d'accueil contenant entre autres la liste des rooms
$router->get('/rooms/(\d+)', 'RoomsController@show'); // Affichage de 1 room

$router->get('/rooms/new', 'RoomsController@neww'); // afficher formulaire ajout room
$router->post('/rooms', 'RoomsController@create'); // Ajout d'une room

$router->get('/rooms/(\d+)/edit/', 'RoomsController@edit');     // Affiche le formulaire d'édition
$router->post('/rooms/(\d+)/edit/', 'RoomsController@update');  // Traite le formulaire d'édition puis redirige

/**
 * Routes CLIENT
 */
$router->get('/clients/all', 'ClientsController@index'); // Affichage de tout les clients
$router->get('/clients/(\d+)', 'ClientsController@show'); // Affichage de 1 client

$router->get('/clients/new', 'ClientsController@neww'); // afficher formulaire ajout client
$router->post('/clients', 'ClientsController@create'); // Ajout d'une client
$router->get('/clients/(\d+)/delete/', 'ClientsController@delete'); // Action de supprimer un client

$router->get('/clients/(\d+)/edit/', 'ClientsController@edit');     // Affiche le formulaire d'édition
$router->post('/clients/(\d+)/edit/', 'ClientsController@update');  // Traite le formulaire d'édition puis redirige


$router->run();