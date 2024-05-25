<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\App\Router;
use App\Config\Database;
use App\Controller\DashboardController;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Middleware\MustLoginMiddleware;
use App\Middleware\MustNotLoginMiddleware;

Database::getConnection('production');

Router::add('GET', '/', HomeController::class, 'index', []);
Router::add('GET', '/sejarah', HomeController::class, 'sejarah', []);
Router::add('GET', '/galeri', HomeController::class, 'galeri', []);
Router::add('GET', '/lokasi', HomeController::class, 'lokasi', []);
Router::add('GET', '/acara', HomeController::class, 'acara', []);

Router::add('GET', '/acara/kerajinan-tangan', HomeController::class, 'acara1', []);
Router::add('GET', '/acara/musik-tradisional', HomeController::class, 'acara2', []);
Router::add('GET', '/acara/tari-khas-pampang', HomeController::class, 'acara3', []);

Router::add('GET', '/login', UserController::class, 'login', [MustNotLoginMiddleware::class]);
Router::add('POST', '/login', UserController::class, 'postLogin', [MustNotLoginMiddleware::class]);

Router::add('GET', '/logout', UserController::class, 'logout', [MustLoginMiddleware::class]);

Router::add('GET', '/dashboard-admin', DashboardController::class, 'dashboardAdmin', [MustLoginMiddleware::class]);
Router::add('POST', '/dashboard-admin', DashboardController::class, 'crud_galeri', [MustLoginMiddleware::class]);

Router::run();
