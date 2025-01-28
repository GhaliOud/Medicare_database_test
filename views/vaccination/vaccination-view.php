<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $title, $vaccinations;

use models\Vaccination;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <a class="btn btn-primary float-end" href="/vaccination.php?action=vaccination-add">Add New Vccination</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($vaccinations)) {
                foreach($vaccinations as $vaccination) {
                    ?>
                    <tr>
                        <?php
                            /** @var Vaccination $vaccination; */
                            echo "<td>$vaccination->date</td>";
                            echo "<td>$vaccination->type</td>";
                        ?>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <div class="mt-4">
            <a href="/vaccination.php" class="btn btn-secondary">Back</a>
        </div>
    </div>
<?php include "footer.php"; ?>