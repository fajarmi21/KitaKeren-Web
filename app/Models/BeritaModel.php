<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table      = 'tb_news';
    protected $primaryKey = 'id_news';
    protected $allowedFields = ['id_news', 'news', 'created_at', 'updated_at'];
}
