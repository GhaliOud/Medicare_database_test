<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $name, $title, $infectionType;
use models\InfectionType;
/** @var InfectionType $infectionType */

include "header.php"

?>
    <div style="padding: 0 10% 0 10%;">
        <h2><?= $title ?></h2>
        <form name="frmAdd" action="" method="POST" id="frmAdd">
        <div class="mb-3">
            <div>
                <label for="typeId" class="form-label">Type ID</label>
                <input class="form-control" id="typeId" name="typeId" value="<?= $infectionType->typeId ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="typeName" class="form-label">Name</label>
                <input class="form-control" id="typeName" name="typeName" value="<?= $infectionType->typeName ?>">
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn btn-primary" name="add">Save</button>
                <a href="/infectionType.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
<?php include "footer.php" ?>
