<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id_blogs';
    protected $allowedFields = ['title', 'content', 'status_blogs', 'create_at', 'update_at', 'deleted_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $useSoftDeletes = true;

    protected $beforeUpdate = ['updateTimestamp'];

    protected function updateTimestamp(array $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}