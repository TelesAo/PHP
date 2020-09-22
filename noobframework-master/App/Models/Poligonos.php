<?php

namespace App\Models;
use Core\DataBase;

        public static function getAll(){
            $db= DataBase::getInstance();
            return $db ->getList('poligonos','*')
        }
        private function connect() {
            global $db;
            $this->connection = new PDO("{$db['driver']}:host={$db['host']};dbname={$db['dbname']};charset=utf8", $db['user'], $db['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

        public static function get($conditions=null, $columns=null ){
            $table = "poligonos";
            $columns = $columns==null "*" : $columns;
            $db = DataBase::getInstance();
            $poligonos = $db ->getList($table,$columns,$conditions);

            return $poligonos;
        }
        private function dispatch($sql, $data = null) {
            $statement = $this->connection->prepare($sql);
            $statement->execute($data);
    
            if(explode(" ", $sql)[0] == 'SELECT') {
                $teste = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $teste;
            }
        }
    
        public function getList($table, $fields, $condition = null, $filter = null, $order = null, $limit = null) {
            $query = "SELECT $fields FROM $table";
    
            if($condition != null) {
                foreach($condition as $column => $value) {
                    $conditions[] = "$column = $value";
                }
                $conditions = implode(' AND ', $conditions);    
            }
    
            if(!empty($condition)) {
                $query .= " WHERE $conditions";
            }
            if(!empty($filter)) {
                $query .= " LIKE '$filter'";
            }
            if(!empty($order)) {
                $query .= " ORDER BY $order";
            }
            if(!empty($limit)) {
                $query .= " LIMIT $limit";
            }
            return $this->dispatch($query);
        }




?>