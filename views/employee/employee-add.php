<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $names, $title;

use models\Person;

include "header.php"
?>
    <div style="padding: 0 10% 0 10%;">
        <h2><?= $title ?></h2>
        <form name="frmAdd" action="" method="POST" id="frmAdd">
            <div class="mb-3">
                <label for="medicare" class="form-label">Name</label>
                <select class="form-select" aria-label="Default select example" id="medicare" name="medicare">
                    <option selected>Open this select menu</option>
                    <?php
                    foreach ($names as $name) {
                        /** @var Person $name */
                        echo '<option value="' . $name->medicare . '">' . $name->firstName . ' ' . $name->lastName . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="resId" class="form-label">Resident ID</label>
                <input class="form-control" id="resId" name="resId">
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn btn-primary" name="add">Add</button>
                <a href="/employee.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
<?php include "footer.php" ?>
