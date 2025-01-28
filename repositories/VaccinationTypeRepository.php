<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace repositories;

use models\VaccinationType;

class VaccinationTypeRepository
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBHelper();
    }

    function add(VaccinationType $vaccinationType) {
        $query = "INSERT INTO VaccineTypes (TypeID,TypeName) VALUES (?, ?)";
        $paramType = 'is';
        $paramValue = array(
            $vaccinationType->typeId,
            $vaccinationType->typeName,
        );
        $vaccinationType->typeId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $vaccinationType;
    }

    function update(VaccinationType $vaccinationType) {
        $query = "UPDATE VaccineTypes SET TypeName = ? WHERE TypeId = ?";
        $paramType = "si";
        $paramValue = array(
            $vaccinationType->typeName,
            $vaccinationType->typeId,
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function delete($typeId) {
        $query = "DELETE FROM VaccineTypes WHERE TypeID = ?";
        $paramType = "i";
        $paramValue = array(
            $typeId
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function get($typeId) {
        $query = "SELECT * FROM VaccineTypes WHERE TypeID = ?";
        $paramType = "i";
        $paramValue = array($typeId);

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);

        if (!empty($result)) {

            $i = new VaccinationType();
            $i->typeId = $result[0]['TypeID'];
            $i->typeName = $result[0]['TypeName'];
            return $i;

        }

        return null;
    }

    function getAll() {
        $sql = "SELECT * FROM VaccineTypes
                ORDER BY TypeID ASC";
    
        $vaccinationTypes = [];
    
        $result = $this->db_handle->runBaseQuery($sql);
    
        if (!empty($result)) {
            foreach ($result as $value) {
                $i = new VaccinationType();
                $i->typeId = $value["TypeID"];
                $i->typeName = $value["TypeName"];
                $vaccinationTypes[] = $i;
            }
        }
        return $vaccinationTypes;
    }

}
