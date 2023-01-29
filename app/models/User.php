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
        $this->db->query("call getPetugas");
        return $this->db->all();
    }

    public function storeUser($data)
    {
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->db->query("call storeUser(:nama, :username, :password, :level)");

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $hash);
        $this->db->bind('level', 'masyarakat');

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function findUserByUsername($username)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username");
        $this->db->bind('username', $username);
        $row = $this->db->single();

        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function login($data)
    {
        $row = $this->findUserByUsername($data['username']);
        if($row == false) return false;

        $hashedPass = $row['password'];

        if(password_verify($data['password'], $hashedPass)) {
            $_SESSION['user_session'] = $row;
            $_SESSION['login'] = true;
            return $row;
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        unset($_SESSION['login']);

        return true;
    }
}