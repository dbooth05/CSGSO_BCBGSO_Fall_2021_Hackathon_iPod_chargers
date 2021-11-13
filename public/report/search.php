<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Report.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../template.php');

$query = $_GET['q'];
$query = trim($query);
$query = htmlspecialchars($query);
$query = strtoupper($query);


$reports = Report::where(["product LIKE '%$query%'"]);
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/../partial/search-bar.php'); ?>
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