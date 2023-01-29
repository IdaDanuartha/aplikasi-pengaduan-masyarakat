<?php

class Tanggapan {
    private $table = 'tanggapan',
            $table2 = 'pengaduan',
            $db;

    public function __construct()
    {
        $this->db = new Model();
    }

    public function store($data)
    {
        $this->db->query("INSERT INTO {$this->table}  VALUES (null, :pengaduan_id, :user_id, :tanggapan, :created_at, :updated_at)");

        $this->db->bind("pengaduan_id", $data['pengaduan_id']);
        $this->db->bind("user_id", $data['user_id']);
        $this->db->bind("tanggapan", $data['tanggapan']);
        $this->db->bind("created_at", date('Y-m-d H:i:s'));
        $this->db->bind("updated_at", date('Y-m-d H:i:s'));
        $this->db->execute();

        if($data['status'] === 'setuju') {
            $this->db->query("UPDATE {$this->table2} SET status = 'proses' WHERE id = :id");
        } elseif ($data['status'] === 'tolak') {
            $this->db->query("UPDATE {$this->table2} SET status = 'tolak' WHERE id = :id");
        }

        $this->db->bind("id", $data['pengaduan_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateStatus($id, $status)
    {
        $this->db->query("UPDATE {$this->table2} SET status = :status WHERE id = :id");
        $this->db->bind("id", $id);
        $this->db->bind("status", $status);

        $this->db->execute();

        return $this->db->rowCount();
    }
}