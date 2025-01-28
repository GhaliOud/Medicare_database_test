<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $managers, $title, $facility;
use models\Employee;
use models\Facility;
/** @var Facility $facility */

include "header.php"

?>
    <div style="padding: 0 10% 0 10%;">
        <h2><?= $title ?></h2>
        <form name="frmAdd" action="" method="POST" id="frmAdd">
            <div class="mb-3">
                <label for="fid" class="form-label">FID</label>
                <input class="form-control" id="fid" name="fid" value="<?= $facility->fid ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input class="form-control" id="name" name="name" value="<?= $facility->name ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input class="form-control" id="address" name="address" value="<?= $facility->address ?>">
            </div>
            <div>
                <label for="city" class="form-label">City</label>
                <input class="form-control" id="city" name="city" value="<?= $facility->city ?>">
            </div>
            <div>
                <label for="province" class="form-label">Province</label>
                <input class="form-control" id="province" name="province" value="<?= $facility->province ?>">
            </div>
            <div class="mb-3">
                <label for="postal-code" class="form-label">Postal Code</label>
                <input class="form-control" id="postal-code" name="postal-code" value="<?= $facility->postalCode ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input class="form-control" id="phone" name="phone" value="<?= $facility->phoneNumber ?>">
            </div>
            <div class="mb-3">
                <label for="web-address" class="form-label">Web Address</label>
                <input class="form-control" id="web-address" name="web-address" value="<?= $facility->webAddress ?>">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" aria-label="Default select example" id="type" name="type">
                    <option <?= (empty($facility->type)) ? ' selected="selected"' : '' ?>>Open this select menu</option>
                    <option value="Hospital" <?= ($facility->type == "Hospital") ? ' selected="selected"' : '' ?>>Hospital</option>
                    <option value="CLSC" <?= ($facility->type == "CLSC") ? ' selected="selected"' : '' ?>>CLSC</option>
                    <option value="Pharmacy" <?= ($facility->type == "Pharmacy") ? ' selected="selected"' : '' ?>>Pharmacy</option>
                    <option value="Clinic" <?= ($facility->type == "Clinic") ? ' selected="selected"' : '';?>>Clinic</option>
                    <option value="Special installment" <?= ($facility->type == "Special installment") ? ' selected="selected"' : '' ?>>Special installment</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="capacity" class="form-label">Capacity</label>
                <input class="form-control" id="capacity" name="capacity" value="<?= $facility->capacity ?>">
            </div>

            <div class="mb-3">
                <label for="manager" class="form-label">Manager</label>
                <select class="form-select" aria-label="Default select example" id="manager" name="manager">
                    <option <?= (empty($facility->type)) ? ' selected="selected"' : '' ?>>Open this select menu</option>
                    <?php
                    foreach ($managers as $manager) {
                        /** @var Employee $manager */
                        echo '<option value="' . $manager->medicare . '"' . (($facility->gmMedicare == $manager->medicare) ? ' selected="selected"' : '') . '>' . $manager->firstName . ' ' . $manager->lastName . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn btn-primary" name="add">Save</button>
                <a href="/facility.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
<?php include "footer.php" ?>
