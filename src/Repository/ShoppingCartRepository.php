<?php
declare(strict_types=1);

namespace Coolblue\Interview\Repository;

use Coolblue\Interview\Core\DatabaseConnection;
use Coolblue\Interview\Entity\ShoppingCart;
use Coolblue\Interview\Entity\ShoppingCartItem;
use Coolblue\Interview\Entity\ShoppingCartLine;
use PDO;

class ShoppingCartRepository extends DatabaseConnection
{
    /**
     * @param int $shoppingCartId
     * @return ShoppingCart
     */
    public function getShoppingCart(int $shoppingCartId): ShoppingCart
    {
        $selectStatement = "select * from shoppingcart where shoppingcartid = :shoppingCartId";
        $stmt = $this->connection->prepare($selectStatement);
        $stmt->bindParam(':shoppingCartId', $shoppingCartId);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return new ShoppingCart($this->getLines((int) $result['shoppingcartid']));
    }

    /**
     * @param int $shoppingCartId
     * @return ShoppingCartLine[]
     */
    private function getLines(int $shoppingCartId): array
    {
        $selectStatement = "select * from shoppingcart_line where shoppingcartid = :shoppingCartId";
        $stmt = $this->connection->prepare($selectStatement);
        $stmt->bindParam(':shoppingCartId', $shoppingCartId);
        $stmt->execute();

        $lines = [];

        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lines[] = new ShoppingCartLine($this->getItems((int) $result['shoppingcartlineid']));
        }

        return $lines;
    }

    /**
     * @param int $shoppingCartLineId
     * @return ShoppingCartLine[]
     */
    private function getItems(int $shoppingCartLineId): array
    {
        $selectStatement = "select * from shoppingcart_item where shoppingcartlineid = :shoppingCartLineId";
        $stmt = $this->connection->prepare($selectStatement);
        $stmt->bindParam(':shoppingCartLineId', $shoppingCartLineId);
        $stmt->execute();

        $items = [];

        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $items[] = new ShoppingCartItem(
                (int) $result['shoppingcartitemid'],
                (int) $result['quantity'],
                (int) $result['unitprice'],
                (string) $result['productname'],
                (string) $result['productclass']
            );
        }

        return $items;
    }
}
