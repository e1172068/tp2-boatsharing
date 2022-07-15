<?php

    abstract class CRUD extends PDO {
        public function __construct() {
            parent::__construct("mysql:host=localhost;dbname=tp2-boatsharing;charset=utf8", "root", "");
        }

        public function select($orderBy = null, $orderType = null) {
            if ($orderBy == null) {
                $sql = "SELECT * FROM $this->table";
            } else {
                $sql = "SELECT * FROM $this->table ORDER BY $orderBy $orderType";
            }

            $query = $this->query($sql);
            return $query->fetchAll();
        }

        public function insert($data) {
            $data_keys = array_fill_keys($this->fillable, "");
            $data_map = array_intersect_key($data, $data_keys);
            $columnName = implode(", ", array_keys($data_map));
            $columnValue = ":".implode(", :", array_keys($data_map));

            $sql = "INSERT INTO $this->table ($columnName) VALUES ($columnValue)";

            $query = $this->prepare($sql);
            foreach($data_map as $key=>$value) {
                $query->bindValue(":$key", $value);
            }
            if (!$query->execute()) {
                return $query->errorInfo();
            } else {
                return $this->lastInsertId();
            }
        }

        public function selectById($id) {
            $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
            $query = $this->prepare($sql);
            $query->bindValue(":$this->primaryKey", $id);
            $query->execute();
            return $query->fetch();
        }

        public function update($data) {
            $id = $data[$this->primaryKey];
            $data_keys = array_fill_keys($this->fillable, '');
            $data = array_intersect_key($data, $data_keys);

            $updateStatement = null;
            foreach($data as $key=>$value){
                $updateStatement .=$key."=:".$key.", ";
            }
            $updateStatement = rtrim($updateStatement, ", ");
            $sql = "UPDATE $this->table SET $updateStatement WHERE $this->primaryKey = :$this->primaryKey";
    
            $data[$this->primaryKey] = $id;
    
            $query= $this->prepare($sql);
            foreach($data as $key=>$value){
                $query->bindValue(":$key", $value);
            }
            if(!$query->execute()){
                print_r($query->errorInfo());
            }else{
                return $id;
            }
        }

        public function delete($id) {
            $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
            $query = $this->prepare($sql);
            $query->bindValue(":$this->primaryKey", $id);

            if(!$query->execute()) {
                print_r($query->errorInfo());
            } else {
                return true;
            }
        }
    }
?>