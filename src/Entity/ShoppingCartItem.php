<?php
declare(strict_types=1);

namespace Coolblue\Interview\Entity;

final class ShoppingCartItem
{
    /** @var string */
    const PRODUCTCLASS_PHYSICAL = 'physical';

    /** @var string */
    const PRODUCTCLASS_INSURANCE = 'insurance';

    /** @var string */
    const PRODUCTLCASS_SERVICE = 'service';

    /** @var int */
    protected $shoppingCartItemId;

    /** @var int */
    protected $quantity;

    /** @var int */
    protected $unitPrice;

    /** @var string */
    protected $productName;

    /** @var string */
    protected $productClass;

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
    }

    /**
     * @return int
     */
    public function getShoppingCartItemId(): int
    {
        return $this->shoppingCartItemId;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @return string
     */
    public function getProductClass(): string
    {
        return $this->productClass;
    }

    /**
     * @return int
     */
    public function getSubtotal(): int
    {
        return $this->quantity * $this->unitPrice;
    }
}