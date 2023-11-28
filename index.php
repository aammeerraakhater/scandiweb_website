<?php
include "init.php";
include_once("classes/Crud.php");
?>
<div class="container">
    <div class="clearfix m-3">
        <div class="float-start">
            <h3>Product list</h3>
        </div>
        <div class="float-end">
            <form action="procedure.php" id="product_form" method="POST">
                <a href="addComponent.php" class="btn btn-outline-info" tabindex="-1" role="button" aria-disabled="true">ADD</a>
                <button type="submit" name="deleteProduct" class="btn btn-outline-danger" tabindex="-1" role="button" aria-disabled="true" id="delete-product-btn" onClick="return confirm('Are you sure you want to delete?')">MASS DELETE</button>

        </div>
    </div>
    <?php
    if ($_SESSION['msgSuccess']) {
    ?>
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['msgSuccess']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

    }
    if ($_SESSION['msgDelete']) {
    ?>
        <div class="alert alert-info  alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['msgDelete']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }

    $crud = new Crud();
    $query = "SELECT * FROM product ORDER BY SKU";
    $results = $crud->getData($query);
    ?>
    <hr>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        <?php
        $i = 0;
        foreach ($results as $result) {
        ?>
            <div class="col">
                <div class="card shadow-sm">
                    <div>
                        <input type="checkbox" name="deleteProductCheck[<?php echo $i; ?>]" value="<?php echo $result['SKU'] ?>" id="" class="delete-checkbox">

                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $result['SKU'] ?></p>
                        <p class="card-text"><?php echo $result['productName'] ?></p>
                        <p class="card-text"><?php echo $result['price'] ?> $</p>
                        <?php
                        if ($result['productType'] == "cd") { ?>
                            <p class="card-text">Size: <?php echo $result['productProperties']; ?>MB</p>
                        <?php } elseif ($result['productType'] == "books") { ?>
                            <p class="card-text">Weight: <?php echo $result['productProperties']; ?>KG</p>

                        <?php } else { ?>
                            <p class="card-text">Dimension: <?php echo $result['productProperties']; ?></p>
                        <?php }
                        $i++;
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    </form>
</div>
<?php
session_unset();
require_once "template/footer.php"
?>