<?php 
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $result, $title;

use models\Residence;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <a class="btn btn-primary float-end" href="/residence.php?action=residence-add">Add New Residence</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>ResID</th>
                <th>Address</th>
                <th>City</th>
                <th>Province</th>
                <th>Postal Code</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($result)) {
                foreach($result as $residence) {
                    ?>
                    <tr>
                        <?php
                            /** @var Residence $residence; */
                            echo "<td>$residence->resId</td>";
                            echo "<td>$residence->address</td>";
                            echo "<td>$residence->city</td>";
                            echo "<td>$residence->province</td>";
                            echo "<td>$residence->postalCode</td>";
                            echo "<td>$residence->type</td>";
                            echo "<td>";
                            echo '<a class="btn btn-light" href="/residence.php?action=residence-view&id=' . $residence->resId . '">View</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-primary" href="/residence.php?action=residence-edit&id=' . $residence->resId . '">Edit</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-danger" href="/residence.php?action=residence-delete&id=' . $residence->resId . '">Delete</a>';
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
