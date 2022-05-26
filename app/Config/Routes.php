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

// Authentication Routing ---- Removed 


$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');

$routes->get('admin', 'Home::mahasiswa', ['filter' => 'role:superadmin,admin']);

$routes->group('pendaftar', ['filter' => 'role:mahasiswa'], function ($routes) {
	$routes->get('/', 'Home::mahasiswa');
	$routes->get('formulir', 'Pendaftar::index');
	$routes->post('add-formulir', 'Pendaftar::add');
	$routes->get('data-diri', 'Pendaftar::data');

	$routes->get('pembayaran', 'Pembayaran::index');
	$routes->post('pembayaran-add', 'Pembayaran::add');

	$routes->get('pengumuman', 'Pengumuman::index');
});

$routes->post('pembayaran-update-notifikasi', 'Pembayaran::notifikasi');

$routes->group('admin', ['filter' => 'role:superadmin'], function ($routes) {
	$routes->get('/', 'Home::mahasiswa');
	$routes->get('dashboard-datatable', 'Home::datatable');
	$routes->get('data-users', 'Users::index');
	$routes->get('data-users', 'Users::index');
	$routes->get('data-users-datatable', 'Users::datatable');
	$routes->get('data-users-detail', 'Users::get_detail');
	$routes->post('data-users-add', 'Users::attemptRegister');
	$routes->post('data-users-import', 'Users::import');
	$routes->post('data-users-edit', 'Users::edit');
	$routes->post('data-users-delete', 'Users::delete');
	$routes->post('data-users-reset-password', 'Users::attemptReset');

	$routes->get('data-mahasiswa', 'DataMahasiswa::index');
	$routes->get('data-mahasiswa-datatable', 'DataMahasiswa::datatable');
	$routes->get('data-mahasiswa-datatable-lulus', 'DataMahasiswa::datatable_lulus');
	$routes->post('data-mahasiswa-setlulus', 'DataMahasiswa::setlulus');
	$routes->post('data-mahasiswa-add', 'DataMahasiswa::add');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}