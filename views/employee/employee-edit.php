<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $name, $title, $employee;
use models\Employee;
/** @var Employee $employee */

include "header.php"

?>
    <div style="padding: 0 10% 0 10%;">
        <h2><?= $title ?></h2>
        <form name="frmAdd" action="" method="POST" id="frmAdd">
        <div class="mb-3">
            <div>
                <label for="medicare" class="form-label">Medicare</label>
                <input class="form-control" id="medicare" name="medicare" value="<?= $employee->medicare ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input class="form-control" id="name" name="name" value="<?= $name->firstName ?> <?= $name->lastName ?>"  readonly>
            </div>
            <div class="mb-3">
                <label for="resId" class="form-label">Resident ID</label>
                <input class="form-control" id="resId" name="resId" value="<?= $employee->resId ?>">
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn btn-primary" name="add">Save</button>
                <a href="/employee.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
<?php include "footer.php" ?>
