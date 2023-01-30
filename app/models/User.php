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

    public function storeMasyarakat($data)
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

    public function storePetugas($data, $fileName)
    {
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO users (nama, username, password, level, profile_picture) VALUES (:nama, :username, :password, :level, :profile_picture)");

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $hash);
        $this->db->bind('level', 'petugas');
        $this->db->bind('profile_picture', $fileName);

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

    public function edit($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
        $this->db->bind("id", $id);

        return $this->db->single();
    }

    public function update($id, $data, $fileName)
    {
        $user = $this->findUserByUsername($data['username']);
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);

        dd($user['password']);
        $this->db->query("UPDATE {$this->table} SET
                            nama=:nama,
                            username=:username                                                        
                            WHERE id=:id");

        $this->db->bind("nama", $data['nama']);
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $hash ?? $user['password']);
        $this->db->bind("profile_picture", $fileName ?? $data['old_profile_picture']);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id=:id");
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}