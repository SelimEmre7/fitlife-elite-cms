<?php

require_once '../app/Core/Model.php';

class Post extends Model
{
    public function create(
        $title,
        $content,
        $categoryId,
        $userId
    )
    {
        $slug = strtolower(
            str_replace(
                ' ',
                '-',
                $title
            )
        );

        $sql = "INSERT INTO posts
                (
                    title,
                    slug,
                    content,
                    category_id,
                    user_id,
                    status
                )
                VALUES
                (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    'published'
                )";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $title,
            $slug,
            $content,
            $categoryId,
            $userId
        ]);
    }

    public function getAll()
    {
        $sql = "SELECT posts.*,
                       categories.name AS category_name
                FROM posts
                LEFT JOIN categories
                ON posts.category_id = categories.id
                ORDER BY posts.created_at DESC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaginated($offset, $limit)
    {
        $sql = "SELECT posts.*,
                       categories.name AS category_name
                FROM posts
                LEFT JOIN categories
                ON posts.category_id = categories.id
                ORDER BY posts.created_at DESC
                LIMIT ?, ?";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(
            1,
            (int)$offset,
            PDO::PARAM_INT
        );

        $stmt->bindValue(
            2,
            (int)$limit,
            PDO::PARAM_INT
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT posts.*,
                       categories.name AS category_name
                FROM posts
                LEFT JOIN categories
                ON posts.category_id = categories.id
                WHERE posts.id = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(
        $id,
        $title,
        $content
    )
    {
        $slug = strtolower(
            str_replace(
                ' ',
                '-',
                $title
            )
        );

        $sql = "UPDATE posts
                SET
                    title = ?,
                    slug = ?,
                    content = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $title,
            $slug,
            $content,
            $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM posts
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }

    public function search($keyword)
    {
        $sql = "SELECT posts.*,
                       categories.name AS category_name
                FROM posts
                LEFT JOIN categories
                ON posts.category_id = categories.id
                WHERE posts.title LIKE ?
                OR posts.content LIKE ?
                ORDER BY posts.created_at DESC";

        $stmt = $this->db->prepare($sql);

        $search = "%" . $keyword . "%";

        $stmt->execute([
            $search,
            $search
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll()
    {
        $sql = "SELECT COUNT(*) as total
                FROM posts";

        $stmt = $this->db->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getByCategory($categoryId)
    {
        $sql = "SELECT posts.*,
                       categories.name AS category_name
                FROM posts
                LEFT JOIN categories
                ON posts.category_id = categories.id
                WHERE posts.category_id = ?
                ORDER BY posts.created_at DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$categoryId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUser($userId)
    {
        $sql = "SELECT *
                FROM posts
                WHERE user_id = ?
                ORDER BY created_at DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function incrementViews($id)
    {
        $sql = "UPDATE posts
                SET views = views + 1
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }
}