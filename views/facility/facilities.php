<?php 
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $result, $title;

use models\Facility;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <a class="btn btn-primary float-end" href="/facility.php?action=facility-add">Add New Facility</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>FID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($result)) {
                foreach($result as $facility) {
                    ?>
                    <tr>
                        <?php
                            /** @var Facility $facility; */
                            echo "<td>$facility->fid</td>";
                            echo "<td>$facility->name</td>";
                            echo "<td>$facility->address</td>";
                            echo "<td>$facility->city</td>";
                            echo "<td>$facility->postalCode</td>";
                            echo "<td>";
                            echo '<a class="btn btn-light" href="/facility.php?action=facility-view&id=' . $facility->fid . '">View</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-primary" href="/facility.php?action=facility-edit&id=' . $facility->fid . '">Edit</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-danger" href="/facility.php?action=facility-delete&id=' . $facility->fid . '">Delete</a>';
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
