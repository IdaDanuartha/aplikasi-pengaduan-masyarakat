<?php

class Pengaduan {
    private $table = 'pengaduan',
            $table2 = 'users',
            $table3 = 'tanggapan',
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
                            ORDER BY created_at DESC                            
                        ");        

        return $this->db->all();
    }

    public function getCurrentWeek()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE week(created_at)=week(now())");
        return $this->db->all();
    }

    public function getByStatus($status)
    {
        $this->db->query("SELECT {$this->table}.*, {$this->table2}.nama, {$this->table3}.tanggapan
                            FROM {$this->table} 
                            INNER JOIN {$this->table2} 
                            ON {$this->table2}.id = {$this->table}.user_id
                            LEFT JOIN {$this->table3} 
                            ON {$this->table3}.pengaduan_id = {$this->table}.id 
                            WHERE {$this->table}.status = :status
                            ORDER BY created_at DESC
                        ");
        $this->db->bind("status", $status);
        
        return $this->db->all();
    }

    public function getByUser()
    {
        $this->db->query("SELECT {$this->table}.*, {$this->table3}.tanggapan FROM {$this->table} 
                            LEFT JOIN {$this->table3} 
                            ON {$this->table3}.pengaduan_id = {$this->table}.id
                            WHERE {$this->table}.user_id = :user_id
                            ORDER BY created_at DESC
                        ");
        $this->db->bind("user_id", $_SESSION['user_session']['id']);
        
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

    public function store($data, $fileName)
    {
        $this->db->query("INSERT INTO {$this->table}  VALUES (null, :user_id, :laporan, :gambar, :status, :created_at, :updated_at)");

        $this->db->bind("user_id", $_SESSION['user_session']['id']);
        $this->db->bind("laporan", $data['laporan']);
        $this->db->bind("gambar", $fileName);
        $this->db->bind("status", 'masuk');
        $this->db->bind("created_at", date('Y-m-d H:i:s'));
        $this->db->bind("updated_at", date('Y-m-d H:i:s'));
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function edit($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
        $this->db->bind("id", $id);

        return $this->db->single();
    }

    public function update($id, $data, $fileName)
    {
        $this->db->query("UPDATE {$this->table} SET
                            laporan=:laporan,
                            gambar=:gambar,
                            updated_at=:updated_at
                            WHERE id=:id");

        $this->db->bind("laporan", $data['laporan']);
        $this->db->bind("gambar", $fileName ?? $data['old_gambar']);
        $this->db->bind("updated_at", date('Y-m-d H:i:s'));
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id=:id");
        $this->db->bind("id", $id);
        $this->db->execute();

        $this->db->query("DELETE FROM {$this->table3} WHERE pengaduan_id=:pengaduan_id");
        $this->db->bind("pengaduan_id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}