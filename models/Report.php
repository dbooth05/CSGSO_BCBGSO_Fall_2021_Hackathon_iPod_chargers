<?php

class Report 
{
    public $id;
    public $product;
    public $price;
    public $store;
    public $time;

    public function flush() {
        $connection = require($_SERVER['DOCUMENT_ROOT'] . '/../dbconnection.php');
        $query = $connection->prepare('
            INSERT INTO grocery.Report VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE product = ?, price = ?, store = ?)
        ');
        $query->bind_param('isdssds', $this->id, $this->product, $this->price, $this->formatTime(), $this->product, $this->price, $this->time);
        $query->execute();
    }

    public static function get($id = null)
    {
        $connection = require($_SERVER['DOCUMENT_ROOT'] . '/../dbconnection.php');
        if ($id !== null)
        {
            $result = $connection->query("SELECT * FROM grocery.Report WHERE id = $id");
            if ($row = $result->fetch_assoc())
            {
                $report = new Store;
                $report->id = (int) $row['id'];
                $report->product = $row['product'];
                $report->price = (float) $row['price'];
                $report->store = Store::get((int) $row['store']);
                $report->time = new DateTime($row['time']);
                return $report;
            }
            return null;
        }
        $result = $connection->query("SELECT * FROM grocery.Report");
        $results = [];
        while ($row = $result->fetch_assoc())
        {
            $report = new Report;
            $report->id = (int) $row['id'];
            $report->product = $row['product'];
            $report->price = (float) $row['price'];
            $report->store = Store::get(((int) $row['store']));
            $report->time = new DateTime($row['time']);
            $results[] = $report;
        }
        return $results;
    }

    public static function create($product, $price, $store) {
        $connection = require($_SERVER['DOCUMENT_ROOT'] . '/../dbconnection.php');
        $time = date('Y-m-d H:i:s');
        $query = $connection->prepare('INSERT INTO grocery.Report (product, price, store, time) VALUES (?, ?, ?, ?)');
        $query->bind_param('sdis', $product, $price, $store->id, $time);
        $query->execute();
        return self::get($connection->insert_id);
    }
   
    public function formatTime() {
        return $this->time->format('Y-m-d H:i:s');
    }

    public function prettyTime() {
        return $this->time->format('d M Y h:i A');
    }

    public function formatPrice() {
        return sprintf("$%.2f", $this->price);
    }
}
