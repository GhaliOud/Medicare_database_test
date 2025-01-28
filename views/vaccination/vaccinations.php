<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $result, $title;

use models\Vaccination;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <div class="float-end">
                <a class="btn btn-light ml-2" href="/vaccinationType.php">View Type List</a>
                <a class="btn btn-primary" href="/vaccination.php?action=vaccination-add">Add New vaccination</a>
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
                foreach($result as $vaccination) {
                    ?>
                    <tr>
                        <?php
                            /** @var Vaccination $vaccination; */
                            echo "<td>$vaccination->medicare</td>";
                            echo "<td>$vaccination->occurrences</td>";
                            echo "<td>$vaccination->firstName</td>";
                            echo "<td>$vaccination->lastName</td>";
                            echo "<td>";
                            echo '<a class="btn btn-light" href="/vaccination.php?action=vaccination-view&id=' . $vaccination->medicare . '">View</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-primary" href="/vaccination.php?action=vaccination-edit&id=' . $vaccination->medicare . '">Edit</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-danger" href="/vaccination.php?action=vaccination-delete&id=' . $vaccination->medicare . '">Delete</a>';
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
