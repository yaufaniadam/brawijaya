<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->resource('ApiUsersList');

$routes->get('/', 'Home::index');

// $routes->resource('tugas');
// $routes->post('tugas', 'Tugas::index');

// tugas routes
$routes->post('tugas/post', 'Tugas::post', ['filter' => 'checkresiden']);
$routes->post('tugas/nilai/post', 'Tugas::postNilai', ['filter' => 'checkadminspv']);
$routes->get('tugas/tambah', 'Tugas::tambah', ['filter' => 'checkresiden']);
$routes->get('tugas/saya', 'Tugas::saya', ['filter' => 'checkresiden']);
$routes->delete('tugas/(:num)', 'Tugas::delete/$1', ['filter' => 'checkresiden']);
$routes->get('tugas/edit/(:num)', 'Tugas::edit/$1', ['filter' => 'checkresiden']);
$routes->post('tugas/edit', 'Tugas::update', ['filter' => 'checkresiden']);
$routes->get('tugas/(:num)', 'Tugas::detail/$1');
$routes->get('tugas/jenis/(:any)', 'Tugas::index/$1');
$routes->get('tugas/saya/(:any)', 'Tugas::saya/$1');
$routes->get('tugas/bimbingansaya/(:any)', 'Tugas::bimbinganSaya/$1', ['filter' => 'checkadminspv']);

// logbook routes
$routes->get('logbook/', 'Logbook::index');
$routes->get('logbook/(:num)', 'Logbook::detail/$1');
$routes->delete('logbook/(:num)', 'Logbook::delete/$1', ['filter' => 'checkresiden']);
$routes->get('logbook/edit/(:num)', 'Logbook::edit/$1');
$routes->get('logbook/update/', 'Logbook::update');
$routes->get('logbook/tambah', 'Logbook::tambah');
$routes->post('logbook/tambah', 'Logbook::post', ['filter' => 'checkresiden']);

// sidang routes
$routes->get('sidang/', 'Sidang::view');
$routes->get('sidang/(:num)', 'Sidang::detail/$1');
$routes->post('sidang/absen', 'Sidang::absen');
$routes->get('sidang/isiabsen/(:id_sidang)', 'Sidang::isiAbsen/$1');

// notif routes
$routes->get('notifications', 'Notif::index');
$routes->get('notifications/(:num)', 'Notif::index/$1');

$routes->group('admin', function ($routes) {
	$routes->get('/', 'Home::index');
	$routes->get('users/(:num)', 'Admin\Users::detail/$1');
	$routes->get('users/', 'Admin\Users::view');
	$routes->get('ppds/lobby', 'Admin\Users::lobby');
	$routes->post('stase', 'StaseResource::index');
	$routes->post('ppds/selectstaseppds', 'Admin\Users::postPpdsStase');
	$routes->post('ppds/staseselesai', 'Admin\Users::staseSelesai');
	$routes->get('ppds/tahap/(:num)', 'Admin\Users::ppds/$1');
	$routes->get('ppds/(:num)', 'Admin\Users::detailppds/$1');
	// $routes->addRedirect('stase', '/');
	$routes->addRedirect('ppds/', 'admin/users');
	$routes->delete('users/(:num)', 'Admin\Users::delete/$1');
	// $routes->resource('admin/users');
});

// ppds by my stase
$routes->group('supervisor', function ($routes) {
	$routes->get('/', 'Home::index');
	$routes->get('ppds_saya/', 'Admin\Users::ppdsPerSpv');
	$routes->get('ppds_saya/stase/', 'Admin\Users::ppdsPerStase');
});

// penguji api
$routes->resource('Spvresource');

$routes->group('residen', function ($routes) {
	$routes->get('/', 'Home::index');
});


$routes->get('/user/profile', 'User::profile');
$routes->post('/user/edit_profile', 'User::edit_profile');


$routes->group('login', function ($routes) {
	$routes->get('', 'Auth::view');
	$routes->post('', 'Auth::login');
});

$routes->get('/logout', 'Auth::logout');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
