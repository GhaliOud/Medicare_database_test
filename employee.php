<?php

define('APPROOT', dirname(dirname(__FILE__)));
spl_autoload_register(function($className){
        include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

use controllers\EmployeeController;
use models\Employee;

$title = "";
$action = "";
$controller = new EmployeeController();

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
/**
 * @param Employee $employee
 * @return void
 */
function loadFromPost(Employee $employee)
{
    $employee->medicare = $_POST['medicare'];
    $employee->resId = $_POST['resId'];

}

switch ($action) {
    case "employee-add":
        if (isset($_POST['add'])) {
            $employee = new Employee();
            loadFromPost($employee);

            $employee = $controller->add($employee);
            if (empty($employee)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: employee.php");
            }
        }
        $title = "Add Employee";
        $names= $controller->getAllUnemployed();
        require_once "views/employee/employee-add.php";
        break;

    case "employee-edit":
        $employee = new Employee();
        $employee->medicare = $_GET["id"];

        if (isset($_POST['add'])) {
            loadFromPost($employee);

            $controller->edit($employee);

            header("Location: employee.php");
        }

        $employee = $controller->getById($employee->medicare);
        $title = "Edit Employee";
        $name= $controller->getName($employee->medicare);
        require_once "views/employee/employee-edit.php";
        break;

    case "employee-view":
        $employee = $controller->getById($_GET["id"]);
        $title = $employee->firstName . " " . $employee->lastName;
        require_once "views/employee/employee-view.php";
        break;

    case "employee-delete":
        $controller->delete($_GET["id"]);

        header("Location: employee.php");
        break;

    default:
        $result = $controller->getAll();
        $title = "Employee List";
        require_once "views/employee/employees.php";
        break;
}
