<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace repositories;

use models\Residence;

class ResidenceRepository
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBHelper();
    }

    function add(Residence $residence) {
        $query = "INSERT INTO Residences (Address,City,Province,PostalCode,NoOfBedrooms,Type) VALUES (?, ?, ?, ?, ?, ?)";
        $paramType = 'ssssis';
        $paramValue = array(
            $residence->address,
            $residence->city,
            $residence->province,
            $residence->postalCode,
            $residence->noOfBedrooms,
            $residence->type,

        );
        $residence->resId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $residence;
    }

    function update(Residence $residence) {
        $query = "UPDATE Residences SET Address = ?,City = ?,Province = ?,PostalCode = ?,NoOfBedrooms = ?,Type = ? WHERE ResId = ?";
        $paramType = "ssssisi";
        $paramValue = array(
            $residence->address,
            $residence->city,
            $residence->province,
            $residence->postalCode,
            $residence->noOfBedrooms,
            $residence->type,
            $residence->resId
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function delete($resId) {
        $query = "DELETE FROM Residences WHERE ResId = ?";
        $paramType = "i";
        $paramValue = array(
            $resId
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function get($resId) {
        $query = "SELECT * FROM Residences WHERE ResID = ?";
        $paramType = "i";
        $paramValue = array(
            $resId
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);

        if (!empty($result)) {
            $r = new Residence();
            $r->resId = $result[0]['ResID'];
            $r->address = $result[0]['Address'];
            $r->city = $result[0]['City'];
            $r->province = $result[0]['Province'];
            $r->postalCode= $result[0]['PostalCode'];
            $r->noOfBedrooms = $result[0]['NoOfBedrooms'];
            $r->type = $result[0]['Type'];
            return $r;
        }

        return null;
    }

    function getAll() {
        $sql = "SELECT * FROM Residences ORDER BY ResID";

        $residences = [];

        $result = $this->db_handle->runBaseQuery($sql);

        if (!empty($result)) {
            foreach ($result as $value) {
                $r = new Residence();
                $r->resId = $value['ResID'];
                $r->address = $value['Address'];
                $r->city = $value['City'];
                $r->province = $value['Province'];
                $r->postalCode= $value['PostalCode'];
                $r->type = $value['Type'];
                $residences[] = $r;
            }
        }
        return $residences;
    }
}
