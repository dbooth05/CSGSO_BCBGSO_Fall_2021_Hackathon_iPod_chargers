<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/../template.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Store.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Report.php');

$reports = Report::getCheapest();
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
                <?= $report->formatPrice() ?>
            </td>
            <td>
                <?= $report->store->nameAddress() ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>