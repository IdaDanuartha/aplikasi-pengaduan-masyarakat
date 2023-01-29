<?php

class Pengaduan {
    private $table = 'pengaduan',
            $table2 = 'users',
            $db;

    public function __construct()
    {
        $this->db = new Model();
    }

    public function all()
    {
        $this->db->query("SELECT {$this->table}.*, {$this->table2}.nama 
                            FROM {$this->table} 
                            INNER JOIN {$this->table2} 
                            ON {$this->table2}.id = {$this->table}.user_id
                        ");        

        return $this->db->all();
    }

    public function getByStatus($status)
    {
        $this->db->query("SELECT {$this->table}.*, {$this->table2}.nama 
                            FROM {$this->table} 
                            INNER JOIN {$this->table2} 
                            ON {$this->table2}.id = {$this->table}.user_id 
                            WHERE {$this->table}.status = :status
                        ");
        $this->db->bind("status", $status);
        
        return $this->db->all();
    }

    public function pengaduanDetail($id)
    {
        $this->db->query("SELECT {$this->table}.*, {$this->table2}.nama 
                            FROM {$this->table} 
                            INNER JOIN {$this->table2} 
                            ON {$this->table2}.id = {$this->table}.user_id 
                            WHERE {$this->table}.id = :id
                        ");
        $this->db->bind("id", $id);
        
        return $this->db->single();
    }
}