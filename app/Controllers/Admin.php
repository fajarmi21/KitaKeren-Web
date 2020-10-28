<?php

namespace App\Controllers;

require_once(APPPATH . '../vendor/autoload.php');

class Admin extends BaseController
{
    protected $builder;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->builder = $db->table('tb_dashboard');
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'isi'   => 'v_home'
        ];

        return view('layout/v_wrapper', $data);
    }
}
