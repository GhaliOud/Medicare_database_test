<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace repositories;

use models\Vaccination;

class VaccinationRepository
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBHelper();
    }

    function add(Vaccination $vaccination) {
        $query = "INSERT INTO Vaccinations (Medicare,Date,TypeID) VALUES (?, ?, ?)";
        $paramType = 'ssi';
        $paramValue = array(
            $vaccination->medicare,
            $vaccination->date,
            $vaccination->type

        );
        $vaccination->medicare = $this->db_handle->insert($query, $paramType, $paramValue);
        return $vaccination;
    }

    function update(Vaccination $vaccination) {
        $query = "UPDATE vaccinations SET Date = ?, TypeID = ? WHERE Medicare = ?";
        $paramType = "sis";
        $paramValue = array(
            $vaccination->date,
            $vaccination->type,
            $vaccination->medicare,
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function delete($medicare) {
        $query = "DELETE FROM Vaccinations WHERE Medicare = ?";
        $paramType = "s";
        $paramValue = array(
            $medicare
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getAllByMedicare($medicare) {
        $query = "SELECT Vaccinations.SSN AS Medicare, Vaccinations.Date, Vaccinations.TypeID, VaccineTypes.TypeName, Persons.FirstName, Persons.LastName
         FROM Vaccinations
         JOIN Persons ON Vaccinations.SSN = Persons.SSN
         JOIN VaccineTypes ON Vaccinations.TypeID = VaccineTypes.TypeID
         WHERE Vaccinations.SSN = ?";
        $paramType = "s";
        $paramValue = array($medicare);
    
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
    
        $vaccinations = array();
        if (!empty($result)) {
            foreach ($result as $row) {
                $e = new Vaccination();
                $e->medicare = $row['Medicare'];
                $e->date = $row['Date'];
                $e->type = $row['TypeName'];
                $e->firstName = $row['FirstName'];
                $e->lastName = $row['LastName'];
                $vaccinations[] = $e;
            }
        }
    
        return $vaccinations;
    }

    function getAll() {
        $sql = "SELECT Vaccinations.SSN AS Medicare, COUNT(*) AS Occurrences, Persons.FirstName, Persons.LastName
        FROM Vaccinations
        JOIN Persons ON Vaccinations.SSN = Persons.SSN
        GROUP BY Vaccinations.SSN, Persons.FirstName, Persons.LastName
        ORDER BY Medicare ASC";
    
        $vaccinations = [];
    
        $result = $this->db_handle->runBaseQuery($sql);
    
        if (!empty($result)) {
            foreach ($result as $value) {
                $i = new Vaccination();
                $i->medicare = $value["Medicare"];
                $i->occurrences = $value["Occurrences"];
                $i->firstName = $value["FirstName"];
                $i->lastName = $value["LastName"];
                $vaccinations[] = $i;
            }
        }
        return $vaccinations;
    }

}
