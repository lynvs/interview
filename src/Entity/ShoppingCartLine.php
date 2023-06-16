<?php
declare(strict_types=1);

namespace Coolblue\Interview\Entity;

final class ShoppingCartLine
{
    /** @var int */
    private $shoppingCartLineId;

    /** @var ShoppingCartItem[] */
    private $items = [];

    /**
     * @param int $shoppingCartLineId
     * @param ShoppingCartItem[] $items
     */
    public function __construct(int $shoppingCartLineId, array $items)
    {
        $this->shoppingCartLineId = $shoppingCartLineId;
        array_walk($items, [$this, 'addItem']);
    }

    /**
     * @return int
     */
    public function getShoppingCartLineId(): int
    {
        return $this->shoppingCartLineId;
    }

    /**
     * @return ShoppingCartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ShoppingCartItem $item
     * @return ShoppingCartLine
     */
    public function addItem(ShoppingCartItem $item): self
    {
        $this->items[] = $item;

        return $this;
    }
}