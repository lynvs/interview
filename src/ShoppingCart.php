<?php
declare(strict_types=1);

namespace Coolblue\Interview;

use Coolblue\Interview\Repository\ShoppingCartRepository;
use Smarty;
use SmartyException;

class ShoppingCart
{
    /** @var Entity\ShoppingCart */
    public Entity\ShoppingCart $cart;

    public function __construct()
    {
        $cartId = 1;

        if (array_key_exists('cartid', $_GET)) {
            $cartId = (int) $_GET['cartid'];
        }

        $this->cart = (new ShoppingCartRepository())->getShoppingCart($cartId);
    }

    /**
     * Renders Smarty template with cart data
     * @throws SmartyException
     */
    public function render()
    {
        $smarty = new Smarty();

        $smarty->assign('lines', $this->cart->getLines());
        $smarty->assign('total', $this->cart->getTotal());

        $smarty->display(__DIR__ . '/../template/cart.tpl');
    }
}
