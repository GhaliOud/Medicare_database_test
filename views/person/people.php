<?php 
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $result, $title;

use models\Person;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <a class="btn btn-primary float-end" href="/person.php?action=person-add">Add New Person</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Medicare</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($result)) {
                foreach($result as $person) {
                    ?>
                    <tr>
                        <?php
                            /** @var person $person; */
                            echo "<td>$person->medicare</td>";
                            echo "<td>$person->firstName</td>";
                            echo "<td>$person->lastName</td>";
                            echo "<td>$person->dob</td>";
                            echo "<td>$person->telephone</td>";
                            echo "<td>$person->email</td>";
                            echo "<td>";
                            echo '<a class="btn btn-light" href="/person.php?action=person-view&id=' . $person->medicare . '">View</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-primary" href="/person.php?action=person-edit&id=' . $person->medicare . '">Edit</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-danger" href="/person.php?action=person-delete&id=' . $person->medicare . '">Delete</a>';
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
