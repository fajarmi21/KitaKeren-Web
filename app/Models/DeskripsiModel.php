<?php 
namespace App\Models;

use CodeIgniter\Model;

class DeskripsiModel extends Model{
    protected $table      = 'tb_deskripsi';
    protected $primaryKey = 'id_deskripsi';
    protected $allowedFields = ['id_deskripsi', 'id_detailDashboard', 'nama_deskripsi', 'icon_deskripsi'];
}