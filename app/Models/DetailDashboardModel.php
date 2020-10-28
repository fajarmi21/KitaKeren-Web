<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailDashboardModel extends Model
{
    protected $table      = 'tb_detail_dashboard';
    protected $primaryKey = 'id_detailDashboard';
    protected $allowedFields = ['id_detailDashboard', 'id_dashboard', 'nama_detailDashboard', 'sub_detailDashboard', 'icon_detailDashboard'];
}
