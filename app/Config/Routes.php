<?php

use CodeIgniter\Router\RouteCollection;



/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Home/callviewjenisusaha', 'Home::callviewjenisusaha');
$routes->get('/Home/callviewdataumkm', 'Home::callviewdataumkm');
$routes->get('/Home/callviewdatakriteria', 'Home::callviewdatakriteria');
$routes->get('/Home/callviewdataalter', 'Home::callviewdataalter');
$routes->get('/Home/callviewdatabobot', 'Home::callviewdatabobot');
$routes->get('/Home/callviewhitung', 'Home::callviewhitung');
$routes->get('/Home/callviewnormalisasi', 'Home::callviewnormalisasi');
$routes->get('/Home/callviewranking', 'Home::callviewranking');
$routes->get('/Home/callviewkeputusan', 'Home::callviewkeputusan');
$routes->get('/Home/normalisasi', 'Home::normalisasi');

$routes->get('/formtambah', 'Home::formtambah');
$routes->post('/prosesTambahJenis', 'Home::prosesTambahJenis');
$routes->get('home/formEditJenisUsaha/(:num)', 'Home::formEditJenisUsaha/$1');
$routes->post('/home/prosesEditJenisUsaha/(:num)', 'Home::prosesEditJenisUsaha/$1');
$routes->get('/home/hapusJenisUsaha/(:num)', 'Home::hapusJenisUsaha/$1');
$routes->get('/formtambahkriteria', 'Home::formtambahkriteria');
$routes->post('/createdatakriteria', 'Home::createdatakriteria');
$routes->get('home/formupdatekriteria/(:num)', 'Home::formupdatekriteria/$1');
$routes->post('/home/updatedatakriteria/(:num)', 'Home::updatedatakriteria/$1');
$routes->get('/home/deletedatakriteria/(:num)', 'Home::deletedatakriteria/$1');
$routes->get('/formtambahalter', 'Home::formtambahalter');
$routes->post('/createdataalter', 'Home::createdataalter');
$routes->get('home/formupdatealter/(:num)', 'Home::formupdatealter/$1');
$routes->post('/home/updatedataalter/(:num)', 'Home::updatedataalter/$1');
$routes->get('/home/deletedataalter/(:num)', 'Home::deletedataalter/$1');

