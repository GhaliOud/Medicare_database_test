<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace repositories;

use models\InfectionType;

class infectionTypeRepository
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBHelper();
    }

    function add(InfectionType $infectionType) {
        $query = "INSERT INTO InfectionTypes (TypeID,TypeName) VALUES (?, ?)";
        $paramType = 'is';
        $paramValue = array(
            $infectionType->typeId,
            $infectionType->typeName,
        );
        $infectionType->typeId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $infectionType;
    }

    function update(InfectionType $infectionType) {
        $query = "UPDATE InfectionTypes SET TypeName = ? WHERE TypeId = ?";
        $paramType = "si";
        $paramValue = array(
            $infectionType->typeName,
            $infectionType->typeId,
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function delete($typeId) {
        $query = "DELETE FROM InfectionTypes WHERE TypeID = ?";
        $paramType = "i";
        $paramValue = array(
            $typeId
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function get($typeId) {
        $query = "SELECT * FROM InfectionTypes WHERE TypeID = ?";
        $paramType = "i";
        $paramValue = array($typeId);

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);

        if (!empty($result)) {

            $i = new InfectionType();
            $i->typeId = $result[0]['TypeID'];
            $i->typeName = $result[0]['TypeName'];
            return $i;

        }

        return null;
    }

    function getAll() {
        $sql = "SELECT * FROM InfectionTypes
                ORDER BY TypeID ASC";
    
        $infectionTypes = [];
    
        $result = $this->db_handle->runBaseQuery($sql);
    
        if (!empty($result)) {
            foreach ($result as $value) {
                $i = new InfectionType();
                $i->typeId = $value["TypeID"];
                $i->typeName = $value["TypeName"];
                $infectionTypes[] = $i;
            }
        }
        return $infectionTypes;
    }

}
