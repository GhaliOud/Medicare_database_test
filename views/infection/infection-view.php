<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $title, $infections;

use models\Infection;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <a class="btn btn-primary float-end" href="/infection.php?action=infection-add">Add New Infection</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($infections)) {
                foreach($infections as $infection) {
                    ?>
                    <tr>
                        <?php
                            /** @var Infection $infection; */
                            echo "<td>$infection->date</td>";
                            echo "<td>$infection->type</td>";
                            echo "<td>";
                            echo '<a class="btn btn-primary" href="/infection.php?action=infection-edit&id=' . $infection->medicare . '">Edit</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-danger" href="/infection.php?action=infection-delete&id=' . $infection->medicare . '">Delete</a>';
                            echo "</td>";
                        ?>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <div class="mt-4">
            <a href="/infection.php" class="btn btn-secondary">Back</a>
        </div>
    </div>
<?php include "footer.php"; ?>