<?php

class PostModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function newPost($data) {
        $this->db->query("INSERT INTO posts (user_id, title, author, description, full_text, created_at, updated_at) VALUES (:user_id, :title, :author, :description, :full_text, :created_at, :updated_at)");

        $this->db->bind(":user_id", $_SESSION['user_id']);
        $this->db->bind(":title", $data['title']);
        $this->db->bind(":author", $_SESSION['fullName']);
        $this->db->bind(":description", $data['description']);
        $this->db->bind(":full_text", $data['content']);
        $this->db->bind(":updated_at", $data['date']);
        $this->db->bind(":created_at", $data['date']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($data) {
        $this->db->query("UPDATE posts SET title=:title, description=:description, full_text=:full_text, updated_at=:updated_at WHERE id = {$data['id']} ");

        $this->db->bind(":title", $data['title']);
        $this->db->bind(":description", $data['description']);
        $this->db->bind(":full_text", $data['content']);
        $this->db->bind(":updated_at", $data['date']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deletePost($id) {
        $this->db->query("DELETE FROM posts WHERE id = '$id' ");

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPosts() {
        $this->db->query("SELECT * FROM posts");
        $result = $this->db->resultSet();

        return $result;
    }

    public function getPost($id) {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(":id", $id);

        if($row = $this->db->single()) {
            return $row;
        } else {
            return false;
        }
    }
}

?>