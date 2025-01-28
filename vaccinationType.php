<?php

define('APPROOT', dirname(dirname(__FILE__)));
spl_autoload_register(function($className){
        include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

use controllers\VaccinationTypeController;
use models\VaccinationType;

$title = "";
$action = "";
$controller = new VaccinationTypeController();

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
/**
 * @param VaccinationType $VaccinationType
 * @return void
 */
function loadFromPost(VaccinationType $vaccinationType)
{
    $vaccinationType->typeId = $_POST['typeId'];
    $vaccinationType->typeName = $_POST['typeName'];
}

switch ($action) {
    case "vaccinationType-add":
        if (isset($_POST['add'])) {
            $vaccinationType = new VaccinationType();
            loadFromPost($vaccinationType);

            $vaccinationType = $controller->add($vaccinationType);
            if (empty($vaccinationType)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: vaccinationType.php");
            }
        }
        $title = "Add VaccinationType";
        require_once "views/vaccinationType/vaccinationType-add.php";
        break;

    case "vaccinationType-edit":
        $vaccinationType = new VaccinationType();
        $vaccinationType->typeId = $_GET["id"];

        if (isset($_POST['add'])) {
            loadFromPost($vaccinationType);

            $controller->edit($vaccinationType);

            header("Location: vaccinationType.php");
        }

        $vaccinationType = $controller->getById($vaccinationType->typeId);
        $title = "Edit VaccinationType";
        require_once "views/vaccinationType/vaccinationType-edit.php";
        break;

    case "vaccinationType-view":
        $vaccinationType = $controller->getById($_GET["id"]);
        $title = $vaccinationType->typeName;
        require_once "views/vaccinationType/vaccinationType-view.php";
        break;

    case "vaccinationType-delete":
        $controller->delete($_GET["id"]);

        header("Location: VaccinationType.php");
        break;

    default:
        $result = $controller->getAll();
        $title = "VaccinationType List";
        require_once "views/vaccinationType/vaccinationTypes.php";
        break;
}
