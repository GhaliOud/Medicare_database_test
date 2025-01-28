<?php

define('APPROOT', dirname(dirname(__FILE__)));
spl_autoload_register(function($className){
        include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

use controllers\PersonController;
use models\Person;

$title = "";
$action = "";
$controller = new PersonController();

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
/**
 * @param person $person
 * @return void
 */
function loadFromPost(Person $person)
{
    $person->medicare = $_POST['medicare'];
    $person->firstName = $_POST['firstName'];
    $person->lastName = $_POST['lastName'];
    $person->dob = $_POST['dob'];
    $person->ssn = $_POST['ssn'];
    $person->telephone = $_POST['telephone'];
    $person->citizenship = $_POST['citizenship'];
    $person->email = $_POST['email'];
}

switch ($action) {
    case "person-add":
        if (isset($_POST['add'])) {
            $person = new Person();
            loadFromPost($person);

            $person = $controller->add($person);
            if (empty($person)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: person.php");
            }
        }
        $title = "Add person";
        require_once "views/person/person-add.php";
        break;

    case "person-edit":
        $person = new Person();
        $person->medicare = $_GET["id"];

        if (isset($_POST['add'])) {
            loadFromPost($person);

            $controller->edit($person);

            header("Location: person.php");
        }

        $person = $controller->getById($person->medicare);
        $title = "Edit Person";
        require_once "views/person/person-edit.php";
        break;

    case "person-view":
        $person = $controller->getById($_GET["id"]);
        $title = $person->firstName . " " . $person->lastName;
        require_once "views/person/person-view.php";
        break;

    case "person-delete":
        $controller->delete($_GET["id"]);

        header("Location: person.php");
        break;

    default:
        $result = $controller->getAll();
        $title = "Person List";
        require_once "views/person/people.php";
        break;
}
