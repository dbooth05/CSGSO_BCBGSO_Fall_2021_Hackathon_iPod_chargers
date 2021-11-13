<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Report.php');
include($_SERVER['DOCUMENT_ROOT'] . '/../template.php');

$product = $_GET['product'];

$reports = Report::where([
    "product = '$product'",
]);

?>

<h2><?= $product ?></h2>
<table>
    <tr>
        <th>
            Price
        </th>
        <th>
            Store
        </th>
        <th>
            Time reported
        </th>
    </tr>
    <?php foreach ($reports as $report): ?>
        <tr>
            <td>
                <?= $report->formatPrice() ?>
            </td>
            <td>
                <?= $report->store->nameAddress() ?>
            </td>
            <td>
                <?= $report->prettyTime() ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>