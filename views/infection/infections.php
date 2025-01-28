<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $result, $title;

use models\Infection;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <div class="float-end">
                <a class="btn btn-light ml-2" href="/infectionType.php">View Type List</a>
                <a class="btn btn-primary" href="/infection.php?action=infection-add">Add New Infection</a>
            </div>
        </div>


        <table class="table">
            <thead>
            <tr>
                <th>Medicare</th>
                <th>Occurrences</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($result)) {
                foreach($result as $infection) {
                    ?>
                    <tr>
                        <?php
                            /** @var Infection $infection; */
                            echo "<td>$infection->medicare</td>";
                            echo "<td>$infection->occurrences</td>";
                            echo "<td>$infection->firstName</td>";
                            echo "<td>$infection->lastName</td>";
                            echo "<td>";
                            echo '<a class="btn btn-light" href="/infection.php?action=infection-view&id=' . $infection->medicare . '">View</a>';
                            echo "&nbsp;";
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
    </div>
<?php include "footer.php"; ?>
