<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $managers, $title, $person;
use models\Person;
/** @var Person $person */

include "header.php"

?>
    <div style="padding: 0 10% 0 10%;">
        <h2><?= $title ?></h2>
        <form name="frmAdd" action="" method="POST" id="frmAdd">
            <div class="mb-3">
                <label for="medicare" class="form-label">Medicare</label>
                <input class="form-control" id="medicare" name="medicare" value="<?= $person->medicare ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input class="form-control" id="firstName" name="firstName" value="<?= $person->firstName ?>">
            </div>
            <div>
                <label for="lastName" class="form-label">Last Name</label>
                <input class="form-control" id="lastName" name="lastName" value="<?= $person->lastName ?>">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">DOB</label>
                <input class="form-control" id="dob" name="dob" value="<?= $person->dob ?>">
            </div>
            <div>
                <label for="ssn" class="form-label">SSN</label>
                <input class="form-control" id="ssn" name="ssn" value="<?= $person->ssn ?>">
            </div>
            <div>
                <label for="telephone" class="form-label">Telephone</label>
                <input class="form-control" id="telephone" name="telephone" value="<?= $person->telephone ?>">
            </div>
            <div class="mb-3">
                <label for="citizenship" class="form-label">Citizenship</label>
                <input class="form-control" id="citizenship" name="citizenship" value="<?= $person->citizenship ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" value="<?= $person->email ?>">
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn btn-primary" name="add">Save</button>
                <a href="/person.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
<?php include "footer.php" ?>
