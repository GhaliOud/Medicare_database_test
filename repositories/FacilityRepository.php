<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace repositories;

use models\Facility;

class FacilityRepository
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBHelper();
    }

    function add(Facility $facility) {
        $query = "INSERT INTO Facilities (Name,Address,City,Province,PostalCode,PhoneNumber,WebAddress,Type,Capacity,GMMedicare) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = 'ssssssssis';
        $paramValue = array(
            $facility->name,
            $facility->address,
            $facility->city,
            $facility->province,
            $facility->postalCode,
            $facility->phoneNumber,
            $facility->webAddress,
            $facility->type,
            $facility->capacity,
            //$facility->gmMedicare
        );
        $facility->fid = $this->db_handle->insert($query, $paramType, $paramValue);
        return $facility;
    }

    function update(Facility $facility) {
        $query = "UPDATE Facilities SET Name = ?,Address = ?,City = ?,Province = ?,PostalCode = ?,PhoneNumber = ?,WebAddress = ?,Type = ?,Capacity = ?,GMMedicare = ? WHERE FID = ?";
        $paramType = "ssssssssisi";
        $paramValue = array(
            $facility->name,
            $facility->address,
            $facility->city,
            $facility->province,
            $facility->postalCode,
            $facility->phoneNumber,
            $facility->webAddress,
            $facility->type,
            $facility->capacity,
            //$facility->gmMedicare,
            $facility->fid
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function delete($fid) {
        $query = "DELETE FROM Facilities WHERE FID = ?";
        $paramType = "i";
        $paramValue = array(
            $fid
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function get($fid) {
        $query = "SELECT * FROM Facilities WHERE FID = ?";
        $paramType = "i";
        $paramValue = array(
            $fid
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);

        if (!empty($result)) {
            $f = new Facility();
            $f->fid = $result[0]['FID'];
            $f->name = $result[0]['Name'];
            $f->address = $result[0]['Address'];
            $f->city = $result[0]['City'];
            $f->province = $result[0]['Province'];
            $f->postalCode = $result[0]['PostalCode'];
            $f->phoneNumber = $result[0]['PhoneNumber'];
            $f->webAddress = $result[0]['WebAddress'];
            $f->type = $result[0]['Type'];
            $f->capacity = $result[0]['Capacity'];
            //$f->gmMedicare = $result[0]['GMMedicare'];
            return $f;
        }

        return null;
    }

    function getAll() {
        $sql = "SELECT * FROM Facilities ORDER BY FID";

        $facilities = [];

        $result = $this->db_handle->runBaseQuery($sql);

        if (!empty($result)) {
            foreach ($result as $value) {
                $f = new Facility();
                $f->fid = $value['FID'];
                $f->name = $value['Name'];
                $f->address = $value['Address'];
                $f->city = $value['City'];
                $f->province = $value['Province'];
                $f->postalCode = $value['PostalCode'];
                $f->phoneNumber = $value['PhoneNumber'];
                $f->webAddress = $value['WebAddress'];
                $f->type = $value['Type'];
                $f->capacity = $value['Capacity'];
                //$f->gmMedicare = $value['GMMedicare'];
                $facilities[] = $f;
            }
        }
        return $facilities;
    }
}
