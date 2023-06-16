<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Coolblue\Interview\ShoppingCart;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

try {
    (new ShoppingCart())->render();
} catch (SmartyException $e) {
    echo $e->getMessage();
}
