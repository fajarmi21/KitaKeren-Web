<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table      = 'tb_dashboard';
    protected $primaryKey = 'id_dashboard';
    protected $allowedFields = ['id_dashboard', 'nama_dashboard', 'icon_dashboard'];
}
