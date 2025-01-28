<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $manager, $title, $residence;
use models\Residence;
/** @var Residence $residence */

include "header.php";
?>
<div style="padding: 0 10% 0 10%;">
    <h2 class="mt-4"><?= $title ?></h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Address:</strong> <?= $residence->address ?></p>
            <p><strong>City:</strong> <?= $residence->city ?></p>
            <p><strong>Province:</strong> <?= $residence->province ?></p>
            <p><strong>Postal Code:</strong> <?= $residence->postalCode ?></p>
            <div class="mt-4">
                <a href="/residence.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
