<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/../template.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Store.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Report.php');

$reports = Report::getCheapest();
?>
<form METHOD="GET" action="search.php">
    <input style="width:600px;" type="text" name="q" placeholder="Search products...">
    <button class="btn btn-primary" style="width:100px;" value="Submit" type="Submit">Search</button>
</form>
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Store</th>
    </tr>
    <?php foreach ($reports as $report): ?>
        <tr>
            <td>
                <a href="view.php?product=<?= $report->product ?>">
                    <?= $report->product ?>
                 </a>
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