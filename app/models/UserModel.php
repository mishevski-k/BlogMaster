<?php

    class UserModel {
        private $db;

        public function __construct() {
            $this->db = new Database; 
        }
        
        public function login($data) {
            $this->db->query('SELECT * FROM users WHERE email = :email');

            $this->db->bind(':email', $data['email']);

            if($row = $this->db->single()) {
                $hashedPassword = $row->password;

                if (password_verify($data['password'], $hashedPassword)) {
                    return $row;
                } else {
                    return false;
                }
            }

            
        }

        public function register($data) {
            $this->db->query('INSERT INTO users (name, surname, email, password, updated_at, created_at) VALUES (:name, :surname, :email, :password, :updated_at, :created_at)');

            $this->db->bind(":name", $data['name']);
            $this->db->bind(":surname", $data['surname']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":password", $data['password']);
            $this->db->bind(":updated_at", $data['date']);
            $this->db->bind(":created_at", $data['date']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $this->db->resultSet();

            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

?>