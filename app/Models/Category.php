<?php

require_once '../app/Core/Model.php';

class Category extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM categories
                ORDER BY name ASC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name)
    {
        $slug = strtolower(
            str_replace(' ', '-', $name)
        );

        $sql = "INSERT INTO categories
                (name, slug)
                VALUES (?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $name,
            $slug
        ]);
    }

    public function countAll()
    {
        $sql = "SELECT COUNT(*) as total
                FROM categories";

        $stmt = $this->db->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
