<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace repositories;

use models\Person;

class PersonRepository
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBHelper();
    }

    function add(Person $person) {
        $query = "INSERT INTO Persons (Medicare,FirstName,LastName,DOB,SSN,Telephone,Citizenship,Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = 'ssssssss';
        $paramValue = array(
            $person->medicare,
            $person->firstName,
            $person->lastName,
            $person->dob,
            $person->ssn,
            $person->telephone,
            $person->citizenship,
            $person->email
        );
        $person->medicare = $this->db_handle->insert($query, $paramType, $paramValue);
        return $person;
    }

    function update(Person $person) {
        $query = "UPDATE Persons SET FirstName = ?,LastName = ?,DOB = ?,SSN = ?,Telephone = ?,Citizenship = ?,Email = ? WHERE Medicare = ?";
        $paramType = "ssssssss";
        $paramValue = array(
            $person->firstName,
            $person->lastName,
            $person->dob,
            $person->ssn,
            $person->telephone,
            $person->citizenship,
            $person->email,
            $person->medicare
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function delete($medicare) {
        $query = "DELETE FROM Persons WHERE medicare = ?";
        $paramType = "s";
        $paramValue = array(
            $medicare
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function get($medicare) {
        $query = "SELECT * FROM Persons WHERE medicare = ?";
        $paramType = "s";
        $paramValue = array(
            $medicare
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);

        if (!empty($result)) {
            $p = new Person();
            $p->medicare = $result[0]['Medicare'];
            $p->firstName = $result[0]['FirstName'];
            $p->lastName = $result[0]['LastName'];
            $p->dob = $result[0]['DOB'];
            $p->ssn = $result[0]['SSN'];
            $p->telephone = $result[0]['Telephone'];
            $p->citizenship = $result[0]['Citizenship'];
            $p->email = $result[0]['Email'];
            return $p;
        }

        return null;
    }

    function getAll() {
        $sql = "SELECT * FROM Persons ORDER BY medicare";

        $people = [];

        $result = $this->db_handle->runBaseQuery($sql);

        if (!empty($result)) {
            foreach ($result as $value) {
                $p = new Person();
                $p->medicare = $value['Medicare'];
                $p->firstName = $value['FirstName'];
                $p->lastName = $value['LastName'];
                $p->dob = $value['DOB'];
                $p->ssn = $value['SSN'];
                $p->telephone = $value['Telephone'];
                $p->citizenship = $value['Citizenship'];
                $p->email = $value['Email'];
                $people[] = $p;
            }
        }
        return $people;
    }
}
