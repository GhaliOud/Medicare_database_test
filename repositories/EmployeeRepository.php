<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace repositories;

use models\Employee;

class EmployeeRepository
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBHelper();
    }

    function add(Employee $employee) {
        $query = "INSERT INTO Employees (Medicare,ResID) VALUES (?, ?)";
        $paramType = 'si';
        $paramValue = array(
            $employee->medicare,
            $employee->resId,
        );
        $employee->medicare = $this->db_handle->insert($query, $paramType, $paramValue);
        return $employee;
    }

    function update(Employee $employee) {
        $query = "UPDATE Employees SET ResID = ? WHERE Medicare = ?";
        $paramType = "is";
        $paramValue = array(
            $employee->resId,
            $employee->medicare,
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function delete($medicare) {
        $query = "DELETE FROM Employees WHERE Medicare = ?";
        $paramType = "s";
        $paramValue = array(
            $medicare
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function get($medicare) {
        $query = "SELECT Persons.Medicare, Persons.FirstName, Persons.LastName, Resides.ResID
                  FROM Employees
                  JOIN Persons ON Employees.SSN = Persons.SSN
                  LEFT JOIN Resides ON Resides.PSSN = Persons.SSN
                  WHERE Persons.Medicare = ?";
        $paramType = "s";
        $paramValue = array($medicare);
    
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
    
        if (!empty($result)) {
            $e = new Employee();
            $e->medicare = $result[0]['Medicare'];
            $e->firstName = $result[0]['FirstName'];
            $e->lastName = $result[0]['LastName'];
            $e->resId = $result[0]['ResID'];  // Get ResID from Resides table
            return $e;
        }
    
        return null;
    }

    function getAll() {
        $sql = "SELECT Persons.Medicare, Persons.FirstName, Persons.LastName, Resides.ResID
                FROM Persons
                LEFT JOIN Employees ON Persons.SSN = Employees.SSN
                LEFT JOIN Resides ON Resides.PSSN = Persons.SSN
                ORDER BY Persons.FirstName";
    
        $employees = [];
    
        $result = $this->db_handle->runBaseQuery($sql);
    
        if (!empty($result)) {
            foreach ($result as $value) {
                $e = new Employee();
                $e->medicare = $value["Medicare"];
                $e->firstName = $value["FirstName"];
                $e->lastName = $value["LastName"];
                $e->resId = $value["ResID"];  // Ensure you're getting ResID from Resides
                $employees[] = $e;
            }
        }
        return $employees;
    }


    public function getAllName() {
        $sql = "SELECT Persons.Medicare, Persons.FirstName, Persons.LastName
                FROM Persons
                LEFT JOIN Employees ON Persons.SSN = Employees.SSN
                WHERE Employees.SSN IS NULL
                ORDER BY Persons.FirstName";
    
        $employees = [];
    
        $result = $this->db_handle->runBaseQuery($sql);
    
        if (!empty($result)) {
            foreach ($result as $value) {
                $e = new Employee();
                $e->medicare = $value["Medicare"];
                $e->firstName = $value["FirstName"];
                $e->lastName = $value["LastName"];
                $employees[] = $e;
            }
        }
        return $employees;
    }
}
