<?php

define('APPROOT', dirname(dirname(__FILE__)));
spl_autoload_register(function($className){
        include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

use controllers\VaccinationController;
use models\Vaccination;

$title = "";
$action = "";
$controller = new VaccinationController();

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
/**
 * @param Vaccination $vaccination
 * @return void
 */
function loadFromPost(Vaccination $vaccination)
{
    $vaccination->medicare = $_POST['medicare'];
    $vaccination->date = $_POST['date'];
    $vaccination->type = $_POST['type'];

}

switch ($action) {
    case "vaccination-add":
        if (isset($_POST['add'])) {
            $vaccination = new Vaccination();
            loadFromPost($vaccination);

            $vaccination = $controller->add($vaccination);
            if (empty($vaccination)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: vaccination.php");
            }
        }
        $title = "Add Vaccination";
        $names= $controller->getAllName();
        $types= $controller->getAllType();
        require_once "views/vaccination/vaccination-add.php";
        break;

    case "vaccination-edit":
        $vaccination = new Vaccination();
        $vaccination->medicare = $_GET["id"];

        if (isset($_POST['add'])) {
            loadFromPost($vaccination);

            $controller->edit($vaccination);

            header("Location: vaccination.php");
        }

        $vaccination = $controller->getById($vaccination->medicare);
        $title = "Edit Vaccination";
        $name= $controller->getName($vaccination[0]->medicare);
        require_once "views/vaccination/vaccination-edit.php";
        break;

    case "vaccination-view":
        $vaccinations = $controller->getById($_GET["id"]);
        $title = $vaccinations[0]->firstName . " " . $vaccinations[0]->lastName;
        require_once "views/vaccination/vaccination-view.php";
        break;

    case "vaccination-delete":
        $controller->delete($_GET["id"]);

        header("Location: vaccination.php");
        break;

    default:
        $result = $controller->getAll();
        $title = "Vaccination List";
        require_once "views/vaccination/vaccinations.php";
        break;
}
