<?php

define('APPROOT', dirname(dirname(__FILE__)));
spl_autoload_register(function($className){
        include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

use controllers\InfectionController;
use models\Infection;

$title = "";
$action = "";
$controller = new InfectionController();

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
/**
 * @param Infection $infection
 * @return void
 */
function loadFromPost(Infection $infection)
{
    $infection->medicare = $_POST['medicare'];
    $infection->date = $_POST['date'];
    $infection->type = $_POST['type'];

}

switch ($action) {
    case "infection-add":
        if (isset($_POST['add'])) {
            $infection = new Infection();
            loadFromPost($infection);

            $infection = $controller->add($infection);
            if (empty($infection)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: infection.php");
            }
        }
        $title = "Add Infection";
        $names= $controller->getAllName();
        $types= $controller->getAllType();
        require_once "views/infection/infection-add.php";
        break;

    case "infection-edit":
        $infection = new Infection();
        $infection->medicare = $_GET["id"];

        if (isset($_POST['add'])) {
            loadFromPost($infection);

            $controller->edit($infection);

            header("Location: infection.php");
        }

        $infection = $controller->getById($infection->medicare);
        $title = "Edit Infection";
        $types= $controller->getAllType();
        require_once "views/infection/infection-edit.php";
        break;

    case "infection-view":
        $infections = $controller->getById($_GET["id"]);
        $title = $infections[0]->firstName . " " . $infections[0]->lastName;
        require_once "views/infection/infection-view.php";
        break;

    case "infection-delete":
        $controller->delete($_GET["id"]);

        header("Location: infection.php");
        break;

    default:
        $result = $controller->getAll();
        $title = "Infection List";
        require_once "views/infection/infections.php";
        break;
}
