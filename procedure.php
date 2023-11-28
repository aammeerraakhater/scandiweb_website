<?php

include_once("classes/Crud.php");
include_once("classes/Validation.php");
$crud = new Crud();
$validation = new Validation();
$_SESSION['msg'] = "";
$_SESSION['msgSuccess'] = "";
$_SESSION['msgDelete'] = "";
if (isset($_POST['addProduct'])) {
    $sku = $crud->escape_string($_POST['SKU']);
    $productName = $crud->escape_string($_POST['name']);
    $price = $crud->escape_string($_POST['price']);
    $productType = $crud->escape_string($_POST['productType']);
    if ($productType == "cd") {
        $dimension = $crud->escape_string($_POST['size']);
    } elseif ($productType == "books") {
        $dimension = $crud->escape_string($_POST['weight']);
    } else {
        $height = $crud->escape_string($_POST['height']);
        $width = $crud->escape_string($_POST['width']);
        $length = $crud->escape_string($_POST['length']);
        $dimension = $height . " x " . $width . " x " . $length;
    }
    $result = $crud->checkData("SELECT * FROM product WHERE sku = '$sku'");
    if ($result) {
        $_SESSION['msg'] = "SKU already found";
        header("Refresh:0;url=addComponent.php");
    } else {
        $result = $crud->execute("INSERT INTO product(sku,productName,price,productType,productProperties) VALUES('$sku','$productName','$price','$productType','$dimension')");
        $_SESSION['msgSuccess'] = "Product added Succesfully";
        header("Refresh:0;url=index.php");
    }
}
if (isset($_POST['deleteProduct'])) {
    if (isset($_POST['deleteProductCheck'])) {
        foreach ($_POST['deleteProductCheck'] as $deleteProdSKU) {
            $crud->delete($deleteProdSKU, 'product');
        }
        $_SESSION['msgDelete'] = "Deleted successfully";
    } else {
        $_SESSION['msgDelete'] = "Please select something to delete";
    }
    header("Refresh:0;url=index.php");
}
