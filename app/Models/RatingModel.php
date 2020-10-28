<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
    protected $table      = 'tb_rating';
    protected $primaryKey = 'id_rating';
    protected $allowedFields = ['id_rating', 'id_user', 'id_detailDeskripsi', 'rating', 'comment', 'foto_rating', 'created_rating', 'updated_rating', 'deleted_rating'];
}