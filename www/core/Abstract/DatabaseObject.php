<?php

abstract class DatabaseObject implements IDatabaseObject
{
    private $table;
    private $fields;
    private $conn;

    protected function __construct($table)
    {
        $this->table = $table;
        $this->conn = DBConnection::GetInstance();
    }

    protected function Fetch($query) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        }
    }

    protected function Insert($row) {
        try {
            $stmt = $this->conn->prepare($row);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function GetAll()
    {
        return $this->Fetch("SELECT * FROM " . $this->table);
    }

    public function Where($args)
    {
        $where_clause_arr = [];

        foreach ($args as $key => $value) {
            $where_clause_arr[] = "$key = '$value'";
        }
        
        return $this->Fetch("SELECT * FROM $this->table WHERE " . implode(" AND ", $where_clause_arr));
    }

    public function Add($row) {
        $keys = implode(', ', array_keys($row));
        $values = [];

        foreach($row as $field) {
            $values[] = "'$field'";
        }

        $values = implode(', ', $values);

        return $this->Insert("INSERT INTO $this->table ($keys) VALUES ($values)");
    }
}
