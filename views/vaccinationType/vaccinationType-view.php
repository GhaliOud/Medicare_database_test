<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $title, $vaccinationType;
use models\VaccinationType;
/** @var VaccinationType $vaccinationType */

include "header.php";
?>
<div style="padding: 0 10% 0 10%;">
    <h2 class="mt-4"><?= $title ?></h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Type ID:</strong> <?= $vaccinationType->typeId ?></p>
            <div class="mt-4">
                <a href="/vaccinationType.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
