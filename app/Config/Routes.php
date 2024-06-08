<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->post('/', 'Home::index');

$routes->get('/', 'Home::home');
$routes->get('shop', 'Home::shop');
$routes->get('shopDetail', 'Home::shopDetail');
$routes->get('contact', 'Home::contact');
$routes->get('testimonial', 'Home::testimonial');
$routes->get('error_404', 'Home::error_404');
$routes->get('cart', 'Home::cart');
$routes->get('checkout', 'Home::checkout');

$routes->get('login', 'Registration::register');
$routes->post('loginprocess', 'Registration::login');
$routes->post('login', 'Registration::login');
$routes->get('registerSuccess', 'Registration::success');

$routes->post('signup', 'Registration::signup');