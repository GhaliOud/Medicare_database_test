<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

global $result, $title;

use models\Employee;

include "header.php";
?>
    <div class="container">
        <div class="clearfix">
            <h2 class="float-start"><?= $title ?></h2>
            <a class="btn btn-primary float-end" href="/employee.php?action=employee-add">Add New Employee</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Medicare</th>
                <th>ResID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($result)) {
                foreach($result as $employee) {
                    ?>
                    <tr>
                        <?php
                            /** @var Employee $employee; */
                            echo "<td>$employee->medicare</td>";
                            echo "<td>$employee->resId</td>";
                            echo "<td>$employee->firstName</td>";
                            echo "<td>$employee->lastName</td>";
                            echo "<td>";
                            echo '<a class="btn btn-light" href="/employee.php?action=employee-view&id=' . $employee->medicare . '">View</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-primary" href="/employee.php?action=employee-edit&id=' . $employee->medicare . '">Edit</a>';
                            echo "&nbsp;";
                            echo '<a class="btn btn-danger" href="/employee.php?action=employee-delete&id=' . $employee->medicare . '">Delete</a>';
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
