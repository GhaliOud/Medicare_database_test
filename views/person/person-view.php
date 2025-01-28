<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $manager, $title, $person;
use models\Person;
/** @var Person $person */

include "header.php";
?>
<div style="padding: 0 10% 0 10%;">
    <h2 class="mt-4"><?= $title ?></h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Medicare:</strong> <?= $person->medicare ?></p>
            <p><strong>DOB:</strong> <?= $person->dob ?></p>
            <p><strong>SSN:</strong> <?= $person->ssn ?></p>
            <p><strong>Telephone:</strong> <?= $person->telephone ?></p>
            <p><strong>Citizenship:</strong> <?= $person->citizenship ?></p>
            <p><strong>Email:</strong> <?= $person->email?></p>
            <div class="mt-4">
                <a href="/person.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
