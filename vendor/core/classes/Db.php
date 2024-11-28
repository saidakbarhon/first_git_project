<?php

    namespace myClasses;

    use PDO;
    use PDOException;
    use PDOStatement;
    class Db {
        private $conn;
        private PDOStatement $stmt;

        public function __construct(array $db_config) {
            $dsn = "mysql:host={$db_config['host']};dbname={$db_config['db_name']};charset={$db_config['charset']}";
            try {
                $this->conn = new PDO($dsn, $db_config['user_name'], $db_config['password'], $db_config['option']);
            } catch (PDOException $e) {
                abort(500);
            }
        }

        public function query($sql, $params = []) 
        {
            try {
                $this->stmt = $this->conn->prepare($sql);
                $this->stmt->execute($params);
                return $this;
            } catch (PDOException $e) {
                // abort(500);
            }
        }

        public function findAll(){
            return $this->stmt->fetchAll();
        }
        public function find(){
            return $this->stmt->fetch();
        }
        public function findOrFail() {
            $res = $this->find();
            if(!$res){
                abort(404);
            }
            return $res;
        }

    }