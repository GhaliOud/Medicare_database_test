<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $result, $title;

use models\InfectionType;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <a class="btn btn-primary float-end" href="/infectionType.php?action=infectionType-add">Add New Type</a>
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
                foreach($result as $infectionType) {
                    ?>
                    <tr>
                        <?php
                            /** @var InfectionType $infectionType; */
                            echo "<td>$infectionType->typeId</td>";
                            echo "<td>$infectionType->typeName</td>";
                            echo "<td>";
                            echo '<a class="btn btn-light" href="/infectionType.php?action=infectionType-view&id=' . $infectionType->typeId . '">View</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-primary" href="/infectionType.php?action=infectionType-edit&id=' . $infectionType->typeId . '">Edit</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-danger" href="/infectionType.php?action=infectionType-delete&id=' . $infectionType->typeId . '">Delete</a>';
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
