<?php
declare(strict_types=1);

namespace Coolblue\Interview\Entity;

final class ShoppingCartItem
{
    /** @var int */
    protected int $shoppingCartItemId;

    /** @var int */
    public int $quantity;

    /** @var int */
    public int $unitPrice;

    /** @var string */
    public string $productName;

    /** @var string */
    public string $productClass;

    /** @var float|int */
    public float|int $subTotal;

    /**
     * @param int $shoppingCartItemId
     * @param int $quantity
     * @param int $unitPrice
     * @param string $productName
     * @param string $productClass
     */
    public function __construct(int $shoppingCartItemId, int $quantity, int $unitPrice, string $productName, string $productClass)
    {
        $this->shoppingCartItemId = $shoppingCartItemId;
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;
        $this->productName = $productName;
        $this->productClass = $productClass;
        $this->subTotal = $this->getSubtotal();
    }

    /**
     * @return int
     */
    public function getSubtotal(): int
    {
        return $this->quantity * $this->unitPrice;
    }
}