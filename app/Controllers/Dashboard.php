<?php 
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function __construct()
    {
        helper(['common_helper', 'aws_helper']);
    }

    public function index()
    {
        $sql = $this->dash->findAll();
        foreach ($sql as $key => $value) {
            if ($value['nama_dashboard'] != null) $sql[$key]['nama_dashboard'] = unserialize(base64_decode($value['nama_dashboard']));
        }
        echo json_encode($sql);
    }
}