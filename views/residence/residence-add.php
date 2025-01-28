<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $title;

include "header.php"
?>
    <div style="padding: 0 10% 0 10%;">
        <h2><?= $title ?></h2>
        <form name="frmAdd" action="" method="POST" id="frmAdd">
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input class="form-control" id="city" name="city">
            </div>
            <div>
                <label for="province" class="form-label">Province</label>
                <input class="form-control" id="province" name="province">
            </div>
            <div>
                <label for="postalCode" class="form-label">Postal Code</label>
                <input class="form-control" id="postalCode" name="postalCode">
            </div>
            <div class="mb-3">
                <label for="noOfBedrooms" class="form-label">No Of Bedrooms</label>
                <input class="form-control" id="noOfBedrooms" name="noOfBedrooms">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" aria-label="Default select example" id="type" name="type">
                    <option <?= (empty($residence->type)) ? ' selected="selected"' : '' ?>>Open this select menu</option>
                    <option selected>Open this select menu</option>
                    <option value="apartment">Apartment</option>
                    <option value="condominium">Condominium</option>
                    <option value="semidetached house">Semi-detached</option>
                    <option value="house">Detached house</option>
                </select>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn btn-primary" name="add">Add</button>
                <a href="/residence.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
<?php include "footer.php" ?>
