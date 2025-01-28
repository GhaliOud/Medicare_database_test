<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace repositories;

use models\Infection;

class InfectionRepository
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBHelper();
    }

    function add(Infection $infection) {
        $query = "INSERT INTO Infections (Medicare,Date,TypeID) VALUES (?, ?, ?)";
        $paramType = 'ssi';
        $paramValue = array(
            $infection->medicare,
            $infection->date,
            $infection->type

        );
        $infection->medicare = $this->db_handle->insert($query, $paramType, $paramValue);
        return $infection;
    }

    function update(Infection $infection) {
        $query = "UPDATE Infections SET Date = ?, TypeID = ? WHERE Medicare = ?";
        $paramType = "sis";
        $paramValue = array(
            $infection->date,
            $infection->type,
            $infection->medicare,
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function delete($medicare) {
        $query = "DELETE FROM Infections WHERE Medicare = ?";
        $paramType = "s";
        $paramValue = array(
            $medicare
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getAllByMedicare($medicare) {
        $query = "SELECT Infections.SSN AS Medicare, Infections.Date, Infections.TypeID, 
                 InfectionTypes.TypeName, Persons.FirstName, Persons.LastName
          FROM Infections
          JOIN Persons ON Infections.SSN = Persons.SSN
          JOIN InfectionTypes ON Infections.TypeID = InfectionTypes.TypeID
          WHERE Infections.SSN = ?";
        $paramType = "s";
        $paramValue = array($medicare);
    
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
    
        $infections = array();
        if (!empty($result)) {
            foreach ($result as $row) {
                $e = new Infection();
                $e->medicare = $row['Medicare'];
                $e->date = $row['Date'];
                $e->type = $row['TypeName'];
                $e->firstName = $row['FirstName'];
                $e->lastName = $row['LastName'];
                $infections[] = $e;
            }
        }
    
        return $infections;
    }

    function getAll() {
        $sql = "SELECT Infections.SSN AS Medicare, COUNT(*) AS Occurrences, 
                Persons.FirstName, Persons.LastName
        FROM Infections
        JOIN Persons ON Infections.SSN = Persons.SSN
        GROUP BY Infections.SSN, Persons.FirstName, Persons.LastName
        ORDER BY Medicare ASC";
    
        $infections = [];
    
        $result = $this->db_handle->runBaseQuery($sql);
    
        if (!empty($result)) {
            foreach ($result as $value) {
                $i = new Infection();
                $i->medicare = $value["Medicare"];
                $i->occurrences = $value["Occurrences"];
                $i->firstName = $value["FirstName"];
                $i->lastName = $value["LastName"];
                $infections[] = $i;
            }
        }
        return $infections;
    }

}
