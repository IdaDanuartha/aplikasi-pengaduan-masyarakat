<?php

class User {
    private $table = 'users',
            $db;

    public function __construct()
    {
        $this->db = new Model();
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->all();
    }
}