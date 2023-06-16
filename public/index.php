<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Coolblue\Interview\ShoppingCart;

echo (new ShoppingCart())->render();
