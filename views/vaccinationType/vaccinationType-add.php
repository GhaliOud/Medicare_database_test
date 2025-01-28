<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $names, $title, $types;

use models\Person;

include "header.php"
?>
    <div style="padding: 0 10% 0 10%;">
        <h2><?= $title ?></h2>
        <form name="frmAdd" action="" method="POST" id="frmAdd">
            <div class="mb-3">
                <label for="typeName" class="form-label">Name</label>
                <input class="form-control" id="typeName" name="typeName">
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn btn-primary" name="add">Add</button>
                <a href="/infectionType.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
<?php include "footer.php" ?>
