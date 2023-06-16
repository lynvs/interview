<?php
declare(strict_types=1);

namespace Coolblue\Interview\Entity;

final class ShoppingCartLine
{
    /** @var ShoppingCartItem[] */
    private array $items = [];

    /**
     * @param ShoppingCartItem[] $items
     */
    public function __construct(array $items)
    {
        array_walk($items, [$this, 'addItem']);
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