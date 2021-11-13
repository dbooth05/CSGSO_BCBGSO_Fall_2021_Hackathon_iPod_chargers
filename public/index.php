<?php
include_once('../template.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Store.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Report.php');

$reports = [
    (object) [
        'id' => 0,
        'product' => 'Banana',
        'price' => 0.69,
        'store' => (object) [
            'id' => 0,
            'name' => 'Hy-Vee',
            'address' => '1400 Pennsylvania Avenue',
        ],
    ],
    (object) [
        'id' => 1,
        'product' => 'Apple',
        'price' => 0.40,
        'store' => (object) [
            'id' => 1,
            'name' => 'Fareway',
            'address' => '123 Ass Street',
        ],
    ],
];

?>
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Store</th>
    </tr>
    <?php foreach ($reports as $report): ?>
        <tr>
            <td>
                <?= $report->product ?>
            </td>
            <td> 
                <?= $report->price ?>
            </td>
            <td>
                <?= $report->store->name ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>