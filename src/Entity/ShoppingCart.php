<?php
declare(strict_types=1);

namespace Coolblue\Interview\Entity;

final class ShoppingCart
{
    /** @var int */
    private $shoppingCartId;

    /** @var ShoppingCartLine[] */
    private $lines = [];

    /**
     * @param int $shoppingCartId
     * @param ShoppingCartLine[] $lines
     */
    public function __construct(int $shoppingCartId, array $lines)
    {
        $this->shoppingCartId = $shoppingCartId;
        array_walk($lines, [$this, 'addLine']);
    }

    /**
     * @return int
     */
    public function getShoppingCartId(): int
    {
        return $this->shoppingCartId;
    }

    /**
     * @return array
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @param ShoppingCartLine $line
     * @return self
     */
    public function addLine(ShoppingCartLine $line): self
    {
        $this->lines[] = $line;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        $total = 0;

        foreach ($this->getLines() as $line)
        {
            /** @var ShoppingCartLine $line */
            foreach ($line->getItems() as $item) {
                /** @var ShoppingCartItem $item */
                $total += $item->getSubtotal();
            }
        }

        return $total;
    }
}