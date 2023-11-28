<?php
include "init.php";
session_start();
?>
<div class="container">
    <div class="clearfix m-3">

        <div class="float-start">
            <h3>Product Add</h3>
        </div>
        <form action="procedure.php" id="product_form" method="POST">
            <div class="float-end">
                <button type="submit" name="addProduct" class="btn btn-outline-info">Save</button>
                <a href="index.php" class="btn btn-outline-danger " tabindex="-1" role="button" aria-disabled="true">Cancel</a>
            </div>


    </div>
    <?php
    if (isset($_SESSION['msg'])) {
    ?>
        <div class="alert alert-danger  alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['msg']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>
    <hr>
    <div class="row mb-3">
        <label for="sku" class="col-sm-2 col-form-label">SKU</label>
        <div class="col-sm-10">
            <input required type="text" name="SKU" class="form-control" id="sku">
        </div>
    </div>
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input required type="text" name="name" class="form-control" id="name">
        </div>
    </div>
    <div class="row mb-3">
        <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
        <div class="col-sm-10">
            <input required type="number" name="price" class="form-control" id="price">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="productType">Select option</label>
        <div class="col-sm-10">
            <select required name="productType" class="form-select" id="productType">
                <option value="" selected disabled>Select option</option>
                <option value="books">Books</option>
                <option value="cd">CD</option>
                <option value="furniture">Furniture</option>
            </select>
        </div>
    </div>
    <div class="row mb-3 booksOption hidden">
        <p>Please, provide weight</p>
        <label for="weight" class="col-sm-2 col-form-label">weight (KG)</label>
        <div class="col-sm-10">
            <input type="number" step="any" class="form-control booksRequired" name="weight" id="weight">
        </div>
    </div>
    <div class="row mb-3 cdOption hidden">
        <p>Please, provide size</p>
        <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
        <div class="col-sm-10">
            <input type="number" step="any" class="form-control cdRequired" name="size" id="size">

        </div>
    </div>
    <div class="row mb-3 furnitureOption hidden">
        <p>Please, provide dimensions</p>
        <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
        <div class="col-sm-10 mb-3">
            <input type="number" step="any" class="form-control furnitureRequired" name="height" id="height">
        </div>
        <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
        <div class="col-sm-10 mb-3">
            <input type="number" step="any" class="form-control furnitureRequired" name="width" id="width">
        </div>
        <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
        <div class="col-sm-10 mb-3">
            <input type="number" step="any" class="form-control furnitureRequired" name="length" id="length">
        </div>
    </div>
    </form>
</div>
<?php
require_once "template/footer.php"
?>