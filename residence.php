<?php

define('APPROOT', dirname(dirname(__FILE__)));
spl_autoload_register(function($className){
        include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

use controllers\ResidenceController;
use models\Residence;

$title = "";
$action = "";
$controller = new ResidenceController();

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
/**
 * @param Rsidence $residence
 * @return void
 */
function loadFromPost(Residence $residence)
{
    $residence->resId = $_POST['resId'];
    $residence->address = $_POST['address'];
    $residence->city = $_POST['city'];
    $residence->province = $_POST['province'];
    $residence->postalCode = $_POST['postalCode'];
    $residence->noOfBedrooms = $_POST['noOfBedrooms'];
    $residence->type = $_POST['type'];
}

switch ($action) {
    case "residence-add":
        if (isset($_POST['add'])) {
            $residence = new Residence();
            loadFromPost($residence);

            $residence = $controller->add($residence);
            if (empty($residence)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: residence.php");
            }
        }
        $title = "Add Residence";
        require_once "views/residence/residence-add.php";
        break;

    case "residence-edit":
        $residence = new Residence();
        $residence->resId = $_GET["id"];

        if (isset($_POST['add'])) {
            loadFromPost($residence);

            $controller->edit($residence);

            header("Location: residence.php");
        }

        $residence = $controller->getById($residence->resId);
        $title = "Edit Residence";
        require_once "views/residence/residence-edit.php";
        break;

    case "residence-view":
        $residence = $controller->getById($_GET["id"]);
        $title = "View Residence - " . $residence->resId;
        require_once "views/residence/residence-view.php";
        break;

    case "residence-delete":
        $controller->delete($_GET["id"]);

        header("Location: residence.php");
        break;

    default:
        $result = $controller->getAll();
        $title = "Residence List";
        require_once "views/residence/residences.php";
        break;
}
