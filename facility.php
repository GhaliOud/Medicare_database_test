<?php

define('APPROOT', dirname(dirname(__FILE__)));
spl_autoload_register(function($className){
        include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

use controllers\FacilityController;
use models\Facility;

$title = "";
$action = "";
$controller = new FacilityController();

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
/**
 * @param Facility $facility
 * @return void
 */
function loadFromPost(Facility $facility)
{
    $facility->name = $_POST['name'];
    $facility->address = $_POST['address'];
    $facility->city = $_POST['city'];
    $facility->province = $_POST['province'];
    $facility->postalCode = $_POST['postal-code'];
    $facility->phoneNumber = $_POST['phone'];
    $facility->webAddress = $_POST['web-address'];
    $facility->type = $_POST['type'];
    $facility->capacity = $_POST['capacity'];
    $facility->gmMedicare = $_POST['manager'];
}

switch ($action) {
    case "facility-add":
        if (isset($_POST['add'])) {
            $facility = new Facility();
            loadFromPost($facility);

            $facility = $controller->add($facility);
            if (empty($facility)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: facility.php");
            }
        }
        $title = "Add Facility";
        $managers = $controller->getAllManagers();
        require_once "views/facility/facility-add.php";
        break;

    case "facility-edit":
        $facility = new Facility();
        $facility->fid = $_GET["id"];

        if (isset($_POST['add'])) {
            loadFromPost($facility);

            $controller->edit($facility);

            header("Location: facility.php");
        }

        $facility = $controller->getById($facility->fid);
        $title = "Edit Facility";
        $managers = $controller->getAllManagers();
        require_once "views/facility/facility-edit.php";
        break;

    case "facility-view":
        $facility = $controller->getById($_GET["id"]);
        $title = $facility->name . " (ID: " . $facility->fid . ")";
        $manager = $controller->getManager($facility->gmMedicare);
        require_once "views/facility/facility-view.php";
        break;

    case "facility-delete":
        $controller->delete($_GET["id"]);

        header("Location: facility.php");
        break;

    default:
        $result = $controller->getAll();
        $title = "Facility List";
        require_once "views/facility/facilities.php";
        break;
}
