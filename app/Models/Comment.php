<?php

require_once '../app/Core/Model.php';

class Comment extends Model
{
    public function create($postId, $userId, $content)
    {
        $sql = "INSERT INTO comments
                (post_id, user_id, content)
                VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $postId,
            $userId,
            $content
        ]);
    }

    public function getByPost($postId)
    {
        $sql = "SELECT comments.*,
                       users.username
                FROM comments
                JOIN users
                ON comments.user_id = users.id
                WHERE post_id = ?
                ORDER BY comments.created_at DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$postId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll()
    {
        $sql = "SELECT COUNT(*) as total FROM comments";

        $stmt = $this->db->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}