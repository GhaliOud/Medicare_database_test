<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $result, $title;

use models\VaccinationType;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <a class="btn btn-primary float-end" href="/vaccinationType.php?action=vaccinationType-add">Add New Type</a>
        </div>


        <table class="table">
            <thead>
            <tr>
                <th>Type ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($result)) {
                foreach($result as $vaccinationType) {
                    ?>
                    <tr>
                        <?php
                            /** @var VaccinationType $vaccinationType; */
                            echo "<td>$vaccinationType->typeId</td>";
                            echo "<td>$vaccinationType->typeName</td>";
                            echo "<td>";
                            echo '<a class="btn btn-light" href="/vaccinationType.php?action=vaccinationType-view&id=' . $vaccinationType->typeId . '">View</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-primary" href="/vaccinationType.php?action=vaccinationType-edit&id=' . $vaccinationType->typeId . '">Edit</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-danger" href="/vaccinationType.php?action=vaccinationType-delete&id=' . $vaccinationType->typeId . '">Delete</a>';
                            echo "</td>";
                        ?>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
<?php include "footer.php"; ?>
