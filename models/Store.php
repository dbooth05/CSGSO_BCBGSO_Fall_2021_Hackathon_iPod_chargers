<?php
require_once('Model.php');

class Store 
{
    public $id;
    public $name;
    public $address;

    public static function get($id = null)
    {
        $connection = require($_SERVER['DOCUMENT_ROOT'] . '/../dbconnection.php');
        if ($id !== null)
        {
            $result = $connection->query("SELECT * FROM grocery.Store WHERE id = $id");
            if ($row = $result->fetch_assoc())
            {
                $store = new Store;
                $store->id = $row['id'];
                $store->name = $row['name'];
                $store->address = $row['address'];
                return $store;
            }
            return null;
        }
        $result = $connection->query("SELECT * FROM grocery.Store");
        $results = [];
        while ($row = $result->fetch_assoc())
        {
            $store = new Store;
            $store->id = $row['id'];
            $store->name = $row['name'];
            $store->address = $row['address'];
            $results[] = $store;
        }
        return $results;
    }
    
}