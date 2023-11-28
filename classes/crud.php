<?php
include_once 'DbConfig.php';
session_start();
class Crud extends DbConfig
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($query)
    {
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }
    public function checkData($query)
    {
        $result = $this->connection->query($query);
        if ($result->num_rows) {
            return true; //found 
        } else {
            return false;
        }
    }
    public function execute($query)
    {
        $result = $this->connection->query($query);

        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }

    public function delete($sku, $table)
    {
        $query = "DELETE FROM $table WHERE SKU = '$sku'";

        $result = $this->connection->query($query);

        if ($result == false) {
            $_SESSION['msgDelete'] = 'Error: cannot delete sku ' . $sku . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }

    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
}
