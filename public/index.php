<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Coolblue\Interview\ShoppingCart;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

echo (new ShoppingCart())->render();