<?php
declare(strict_types=1);

namespace Coolblue\Interview;

use Coolblue\Interview\Repository\ShoppingCartRepository;

class ShoppingCart
{
    /** @var \Coolblue\Interview\Entity\ShoppingCart */
    private $cart;

    public function __construct()
    {
        $this->cart = (new ShoppingCartRepository())->getShoppingCart(($_GET["cartid"]) ? $_GET["cartid"] : 1);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        ob_start();

        require __DIR__ . '/../template/cart.tpl';

        $result = ob_get_contents();
        ob_clean();

        return $result;
    }
}
