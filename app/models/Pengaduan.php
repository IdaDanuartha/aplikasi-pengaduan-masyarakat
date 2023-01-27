<?php

class Pengaduan {
    private $table = 'pengaduan',
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

    public function getByStatus($status)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE status = :status");
        $this->db->bind("status", $status);
        
        return $this->db->all();
    }
}