<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $type, $title, $infection;
use models\Infection;
/** @var Infection $infection */

include "header.php"

?>
    <div style="padding: 0 10% 0 10%;">
        <h2><?= $title ?></h2>
        <form name="frmAdd" action="" method="POST" id="frmAdd">
        <div class="mb-3">
            <div class="mb-3">
                <label for="medicare" class="form-label">Medicare</label>
                <input class="form-control" id="medicare" name="medicare" value="<?= $infection->medicare ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input class="form-control" id="date" name="date" value="<?= $infection->date ?>">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" aria-label="Default select example" id="type" name="type">
                    <option selected>Open this select menu</option>
                    <?php
                    foreach ($types as $type) {
                        /** @var InfectionType $type */
                        echo '<option value="' . $type->typeId . '">' . $type->typeName . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn btn-primary" name="add">Save</button>
                <a href="/infection.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
<?php include "footer.php" ?>
