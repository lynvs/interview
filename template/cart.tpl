<!DOCTYPE html>
<html>
    <head>
        <title>Coolblue Shopping Cart</title>
        <style>
            body {
                font-family: sans-serif;
            }

            table {
                width: 100%;
            }

            table th {
                text-align: left;
                font-size: 125%;
            }

            table td {
                padding-bottom: 2rem;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->cart->getLines() as $line): ?>
                    <tr>
                        <td>
                            <?php foreach($line->getItems() as $item): ?>
                                <?php if ($item->getProductClass() === \Coolblue\Interview\Entity\ShoppingCartItem::PRODUCTCLASS_PHYSICAL): ?>
                                    <strong><?=$item->getProductName()?></strong><br />
                                <?php else: ?>
                                    <?= ucfirst($item->getProductClass()) ?>: <?=$item->getProductName()?><br />
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach($line->getItems() as $item): ?>
                                <?php if ($item->getProductClass() === \Coolblue\Interview\Entity\ShoppingCartItem::PRODUCTCLASS_PHYSICAL): ?>
                                    <strong><?=$item->getQuantity()?></strong><br />
                                <?php else: ?>
                                    <?=$item->getQuantity()?><br />
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach($line->getItems() as $item): ?>
                                <?php if ($item->getProductClass() === \Coolblue\Interview\Entity\ShoppingCartItem::PRODUCTCLASS_PHYSICAL): ?>
                                    <strong>&euro; <?=number_format($item->getSubtotal() / 100, 2)?></strong><br />
                                <?php else: ?>
                                    &euro; <?=number_format($item->getSubtotal() / 100, 2)?><br />
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <strong>Total: &euro; <?=number_format($this->cart->getTotal() / 100, 2)?></strong>
    </body>
</html>