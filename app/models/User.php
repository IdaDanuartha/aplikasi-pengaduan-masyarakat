<?php

class User {
    private $table = 'users',
            $db;

    public function __construct()
    {
        $this->db = new Model();
    }

    public function all()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->all();
    }

    public function getPetugas()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE level='petugas'");
        return $this->db->all();
    }
}