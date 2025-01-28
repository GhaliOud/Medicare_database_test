<?php

define('APPROOT', dirname(dirname(__FILE__)));
spl_autoload_register(function($className){
        include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

use controllers\InfectionTypeController;
use models\InfectionType;

$title = "";
$action = "";
$controller = new InfectionTypeController();

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
/**
 * @param InfectionType $infectionType
 * @return void
 */
function loadFromPost(InfectionType $infectionType)
{
    $infectionType->typeId = $_POST['typeId'];
    $infectionType->typeName = $_POST['typeName'];
}

switch ($action) {
    case "infectionType-add":
        if (isset($_POST['add'])) {
            $infectionType = new InfectionType();
            loadFromPost($infectionType);

            $infectionType = $controller->add($infectionType);
            if (empty($infectionType)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: infectionType.php");
            }
        }
        $title = "Add InfectionType";
        require_once "views/infectionType/infectionType-add.php";
        break;

    case "infectionType-edit":
        $infectionType = new InfectionType();
        $infectionType->typeId = $_GET["id"];

        if (isset($_POST['add'])) {
            loadFromPost($infectionType);

            $controller->edit($infectionType);

            header("Location: infectionType.php");
        }

        $infectionType = $controller->getById($infectionType->typeId);
        $title = "Edit InfectionType";
        require_once "views/infectionType/infectionType-edit.php";
        break;

    case "infectionType-view":
        $infectionType = $controller->getById($_GET["id"]);
        $title = $infectionType->typeName;
        require_once "views/infectionType/infectionType-view.php";
        break;

    case "infectionType-delete":
        $controller->delete($_GET["id"]);

        header("Location: infectionType.php");
        break;

    default:
        $result = $controller->getAll();
        $title = "InfectionType List";
        require_once "views/infectionType/infectionTypes.php";
        break;
}
