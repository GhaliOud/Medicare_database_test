<?php

namespace repositories;
require_once("cfg/settings.php");
class DBHelper
{
    private $conn;

    function __construct()
    {
        $this->conn = $this->connectDB();
    }

    function connectDB()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        return $conn;
    }

    function runBaseQuery($query)
    {
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultSet[] = $row;
            }
        }
        if (!empty($resultSet)) {
            return $resultSet;
        }
    }


    function runQuery($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultSet[] = $row;
            }
        }

        if (!empty($resultSet)) {
            return $resultSet;
        }
    }

    function bindQueryParams($sql, $param_type, $param_value_array)
    {
        $param_value_reference[] = &$param_type;
        for ($i = 0; $i < count($param_value_array); $i++) {
            $param_value_reference[] = &$param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }

    function insert($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        return $sql->insert_id;
    }

    function update($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }
}