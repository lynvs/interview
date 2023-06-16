<!DOCTYPE html>
<html lang="en">
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
            {foreach $lines as $line}
                <tr>
                    <td>
                        {foreach $line->items as $item}
                            {if $item->productClass eq getenv('PRODUCTCLASS_PHYSICAL')}
                                <strong>{$item->ProductName}</strong>
                                <br />
                            {else}
                                {$item->productClass|capitalize}: {$item->productName|capitalize}
                            {/if}
                        {/foreach}
                    </td>
                    <td>
                        {foreach $line->items as $item}
                            {if $item->productClass eq getenv('PRODUCTCLASS_PHYSICAL')}
                                <strong>{$item->quantity}</strong>
                                <br />
                            {else}
                                {$item->quantity}
                                <br />
                            {/if}
                        {/foreach}
                    </td>
                    <td>
                        {foreach $line->items as $item}
                            {if $item->productClass eq getenv('PRODUCTCLASS_PHYSICAL')}
                                <strong>&euro;{($item->subTotal / 100 * 2)|number_format:2}</strong><br />
                            {else}
                                &euro;{($item->subTotal / 100 * 2)|number_format:2}
                                <br />
                            {/if}
                        {/foreach}
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        <strong>Total: &euro;{($total / 100 * 2)|number_format:2}</strong>
    </body>
</html>