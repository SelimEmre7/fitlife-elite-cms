<?php

require_once '../app/Core/Model.php';

class User extends Model
{
    public function create($username, $email, $password)
    {
        $sql = "INSERT INTO users
                (username, email, password)
                VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $username,
            $email,
            $password
        ]);
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users
                WHERE email = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM users
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email)
    {
        $sql = "SELECT * FROM users
                WHERE email = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countAll()
    {
        $sql = "SELECT COUNT(*) as total
                FROM users";

        $stmt = $this->db->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getAll()
    {
        $sql = "SELECT *
                FROM users
                ORDER BY id DESC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePassword($id, $password)
    {
        $sql = "UPDATE users
                SET password = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $password,
            $id
        ]);
    }
}
