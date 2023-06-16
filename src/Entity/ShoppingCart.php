<?php
declare(strict_types=1);

namespace Coolblue\Interview\Entity;

final class ShoppingCart
{
    /** @var ShoppingCartLine[] */
    public array $lines = [];

    /**
     * @param ShoppingCartLine[] $lines
     */
    public function __construct(array $lines)
    {
        array_walk($lines, [$this, 'addLine']);
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

        foreach ($this->getLines() as $line) {
            foreach ($line->getItems() as $item) {
                $total += $item->getSubtotal();
            }
        }

        return $total;
    }
}