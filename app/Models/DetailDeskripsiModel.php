<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailDeskripsiModel extends Model
{
    protected $table      = 'tb_detail_deskripsi';
    protected $primaryKey = 'id_dashboard';
    protected $allowedFields = ['id_dashboard', 'alamat_detailDeskripsi', 'nomor_detailDeskripsi', 'harga_detailDeskripsi', 'buka_detailDeskripsi', 'pemandu_detailDeskripsi', 'deskripsi_detailDeskripsi', 'foto_detailDeskripsi'];
}
