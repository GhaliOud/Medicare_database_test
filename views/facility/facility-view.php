<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $manager, $title, $facility;
use models\Facility;
/** @var Facility $facility */

include "header.php";
?>
<div style="padding: 0 10% 0 10%;">
    <h2 class="mt-4"><?= $title ?></h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Address:</strong> <?= $facility->address ?></p>
            <p><strong>City:</strong> <?= $facility->city ?></p>
            <p><strong>Province:</strong> <?= $facility->province ?></p>
            <p><strong>Postal Code:</strong> <?= $facility->postalCode ?></p>
            <p><strong>Phone:</strong> <?= $facility->phoneNumber ?></p>
            <p><strong>Web Address:</strong> <?= $facility->webAddress ?></p>
            <p><strong>Type:</strong> <?= $facility->type ?></p>
            <p><strong>Capacity:</strong> <?= $facility->capacity ?></p>
            <p><strong>Manager:</strong>
            <?php
                echo $manager->firstName . ' ' . $manager->lastName;
                ?>
            </p>
            <div class="mt-4">
                <a href="/facility.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
