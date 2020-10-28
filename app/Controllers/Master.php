<?php

namespace App\Controllers;

require_once(APPPATH . '../vendor/autoload.php');

class Master extends BaseController
{
    protected $builder;

    public function __construct()
    {
        $this->builder = \Config\Database::connect();
    }

    public function index()
    {
        $sql = $this->dash->findAll();
        foreach ($sql as $key => $value) {
            if ($value['nama_dashboard'] != null) $sql[$key]['nama_dashboard'] = unserialize(base64_decode($value['nama_dashboard']));
        };

        $data = [
            'title' => 'Data',
            'isi'   => 'v_data',
            'dash' => $sql,
            'view'     => $this->show_view()
        ];

        return view('layout/v_wrapper', $data);
    }

    public function show_view($code = 0, $id = null, $idd = null)
    {
        switch ($code) {
            default:
                $v = view('content/data/v_dashboard');
                break;

            case 1:
                $sql = $this->builder->table('tb_dashboard');
                $x = $sql->where(array('id_dashboard' => $id))->get(1)->getResultArray();
                foreach ($x as $key => $value) {
                    if ($value['nama_dashboard'] != null) {
                        $x[$key]['nama_dashboard'] = unserialize(base64_decode($value['nama_dashboard']));
                    }
                };
                $dashb = "";
                foreach ($x[0]['nama_dashboard'] as $key => $value) {
                    if ($dashb != "") {
                        $dashb = $dashb . " / " . $value;
                    } else {
                        $dashb = $value;
                    }
                };
                $data = [
                    'dashboard' => $dashb,
                    'id_dashboard' => $id
                ];
                $v = view('content/data/v_detail_dashboard', $data);
                break;

            case 2:
                $sql = $this->builder->table('tb_detail_dashboard');
                $x = $sql->where(array('id_detailDashboard' => $id))->get(1)->getResultArray();
                foreach ($x as $key => $value) {
                    if ($value['nama_detailDashboard'] != null) {
                        $x[$key]['nama_detailDashboard'] = unserialize(base64_decode($value['nama_detailDashboard']));
                    }
                };
                $dashb = "";
                foreach ($x[0]['nama_detailDashboard'] as $key => $value) {
                    if ($dashb != "") {
                        $dashb = $dashb . " / " . $value;
                    } else {
                        $dashb = $value;
                    }
                };
                $data = [
                    'detail_dashboard' => $dashb,
                    'id_dashboard' => $idd,
                    'id_detailDashboard' => $id
                ];
                $v = view('content/data/v_deskripsi', $data);
                break;

            case 3:
                $sql = $this->builder->table('tb_detail_deskripsi')->getWhere(array('id_dashboard' => $id))->getResultArray();
                foreach ($sql as $key => $value) {
                    if ($value['deskripsi_detailDeskripsi'] != null) {
                        $sql[$key]['deskripsi_detailDeskripsi'] = unserialize(base64_decode($value['deskripsi_detailDeskripsi']));
                    }
                    if ($value['foto_detailDeskripsi'] != null) {
                        $sql[$key]['foto_detailDeskripsi'] = unserialize(base64_decode($value['foto_detailDeskripsi']));
                    }
                };
                $data = [
                    'detail_deskripsi' => "x",
                    'id_dashboard' => $idd,
                    'id_detailDashboard' => $id,
                    'count' => count($sql)
                ];
                $v = view('content/data/v_detail_deskripsi', $data);
                break;
        }
        return $v;
    }

    public function read_dashboard($mode = 'single', $ui = FALSE, $pagination = FALSE)
    {
        $sql = $this->builder->table('tb_dashboard');
        // dd(count($sql->get()->getResultArray()));
        if ($mode == 'show') {
            // Pagination
            $data['limit'] = $this->request->getGet('limit');
            if ($data['limit'] == null) {
                $data['limit'] = 0;
            }
            $data['page'] = $this->request->getGet('page');
            if ($data['page'] == null) {
                $data['page'] = 1;
            }
            $data['offset'] = ($data['page'] - 1) * $data['limit'];

            // Pengurutan Data
            $order = $this->request->getGet('order');
            if ($order != null) {
                $sql->orderBy('id_dashboard', $order);
            }

            // Pencarian Judul
            $cari = $this->request->getGet('cari');
            if ($cari != null) {
                // Pengambilan Data
                $datax = $sql->get($data['limit'], $data['offset'])->getResultArray();
                foreach ($datax as $key => $value) {
                    if ($value['nama_dashboard'] != null) {
                        $datax[$key]['nama_dashboard'] = unserialize(base64_decode($value['nama_dashboard']));
                    }
                    if (
                        strpos($datax[$key]['nama_dashboard']['ind'], $cari) !== false ||
                        strpos($datax[$key]['nama_dashboard']['en'], $cari) !== false
                        ) {
                        $data['data_buku'][] = $datax[$key];
                    }
                };
            } else {
                // Pengambilan Data
                $data['data_buku'] = $sql->get($data['limit'], $data['offset'])->getResultArray();
                foreach ($data['data_buku'] as $key => $value) {
                    if ($value['nama_dashboard'] != null) {
                        $data['data_buku'][$key]['nama_dashboard'] = unserialize(base64_decode($value['nama_dashboard']));
                    }
                };
            }

            // Route ke Pagination atau data
            if ($pagination != FALSE) {
                if($data['limit'] != 0) $pagination_data['limit'] = $data['limit']; else $pagination_data['limit'] = 1;
                $pagination_data['offset'] = $data['offset'];
                $pagination_data['page'] = $data['page'];
                $pagination_data['total_data'] = $this->builder->table('tb_dashboard')->countAll();
                $pagination_data['total_page'] = floor($pagination_data['total_data'] / $pagination_data['limit']);
                if (($pagination_data['total_data'] % $pagination_data['limit']) > 0) {
                    $pagination_data['total_page']++;
                }
                echo json_encode($pagination_data);
            } else {
                return view(
                    'content/data/list/'.$ui,
                    $data
                );
            }
        }

        // -------------------------------------
        // Ambil 1 Data
        // -------------------------------------
        else if ($mode == 'single') {
            $id = $this->request->getGet('id');
            $data = $sql->getWhere(array('id_dashboard' => $id))->getResultArray();
            foreach ($data as $key => $value) {
                if ($value['nama_dashboard'] != null) {
                    $data[$key]['nama_dashboard'] = unserialize(base64_decode($value['nama_dashboard']));
                }
            }
            echo json_encode($data);
        }
    }

    public function write_dashboard($mode)
    {
        if ($mode == 'insert') {
            if ($this->request->isAJAX()) {
                $sql = $this->dash->orderBy('id_dashboard', 'desc')->findAll(1);
                $nama = array(
                    'ind' => $this->request->getPost('ind'),
                    'en' => $this->request->getPost('en')
                );
                $id = intval(str_replace('D', '', $sql[0]["id_dashboard"]));
                if ($id < 9) {
                    $id = 'D000'.($id + 1);
                } elseif ($id < 99) {
                    $id = 'D00' . ($id + 1);
                } elseif ($id < 999) {
                    $id = 'D0' . ($id + 1);
                } else {
                    $id = 'D' . ($id + 1);
                }

                $file = $this->request->getFile('imgInp');
                $newName = $this->request->getPost('en') . '.' . $file->getExtension();
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move(FCPATH . 'assets/icon/dash/', $newName);
                }
                $data = array(
                    'id_dashboard' => $id,
                    'nama_dashboard' => base64_encode(serialize($nama)),
                    'icon_dashboard' => 'assets/icon/dash/' . $newName
                );

                $result = $this->dash->insert($data);
                echo json_encode($result);
            }
        } else if ($mode == 'update') {
            if ($this->request->isAJAX()) {
                $id = $this->request->getPost('id_dashboard');
                $nama = array(
                    'ind' => $this->request->getPost('ind'),
                    'en' => $this->request->getPost('en')
                );
                if ($_FILES['img']['name'] != "") {
                    $sql = $this->dash->getWhere(array('id_dashboard' => $id))->getResultArray();
                    unlink(FCPATH . $sql[0]['icon_dashboard']);
                    
                    $file = $this->request->getFile('img');
                    $newName = $this->request->getPost('en') . '.' . $file->getExtension();
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move(FCPATH . 'assets/icon/', $newName);
                    }
                    $data = array(
                            'nama_dashboard' => base64_encode(serialize($nama)),
                            'icon_dashboard' => 'assets/icon/dash/' . $newName
                        );
                } else {
                    $data = array(
                        'nama_dashboard' => base64_encode(serialize($nama))
                    );
                }
                $da['message'] = 'update dashboard';
                $this->pusher->trigger('my-channel', 'my-crud-dashboard', $da);
                $result = $this->dash->update($id, $data);
                echo json_encode($result);
            }
        } else if ($mode == 'delete') {
            if ($this->request->isAJAX()) {
                $id = $this->request->getPost('id');
                $sql = $this->dash->getWhere(array('id_dashboard' => $id))->getResultArray();
                unlink(FCPATH . $sql[0]['icon_dashboard']);

                $result = $this->dash->delete($id);
                echo json_encode($result);
            }
        }
    }

    public function read_detail_dashboard($mode = 'single', $ui = FALSE, $pagination = FALSE)
    {
        $sql = $this->builder->table('tb_detail_dashboard');
        // dd(count($sql->get()->getResultArray()));
        if ($mode == 'show') {
            // Pagination
            $data['limit'] = $this->request->getGet('limit');
            if ($data['limit'] == null) {
                $data['limit'] = 0;
            }
            $data['page'] = $this->request->getGet('page');
            if ($data['page'] == null) {
                $data['page'] = 1;
            }
            $data['offset'] = ($data['page'] - 1) * $data['limit'];

            // Pengurutan Data
            $order = $this->request->getGet('order');
            if ($order != null) {
                $sql->orderBy('id_detailDashboard', $order);
            }

            // Pencarian Judul
            $cari = $this->request->getGet('cari');
            if ($cari != null) {
                // Pengambilan Data
                $id = $this->request->getGet('id');
                $datax = $sql->where(array('id_dashboard' => $id))->get($data['limit'], $data['offset'])->getResultArray();
                foreach ($datax as $key => $value) {
                    if ($value['nama_detailDashboard'] != null) {
                        $datax[$key]['nama_detailDashboard'] = unserialize(base64_decode($value['nama_detailDashboard']));
                    }
                    if (
                        strpos($datax[$key]['nama_detailDashboard']['ind'], $cari) !== false ||
                        strpos($datax[$key]['nama_detailDashboard']['en'], $cari) !== false
                    ) {
                        $data['data_buku'][] = $datax[$key];
                    }
                };
            } else {
                // Pengambilan Data
                $id = $this->request->getGet('id');
                $data['data_buku'] = $sql->where(array('id_dashboard' => $id))->get($data['limit'], $data['offset'])->getResultArray();
                foreach ($data['data_buku'] as $key => $value) {
                    if ($value['nama_detailDashboard'] != null) {
                        $data['data_buku'][$key]['nama_detailDashboard'] = unserialize(base64_decode($value['nama_detailDashboard']));
                    }
                };
            }

            // Route ke Pagination atau data
            if ($pagination != FALSE) {
                if ($data['limit'] != 0) $pagination_data['limit'] = $data['limit'];
                else $pagination_data['limit'] = 1;
                $pagination_data['offset'] = $data['offset'];
                $pagination_data['page'] = $data['page'];
                $pagination_data['total_data'] = $this->builder->table('tb_detail_dashboard')->countAll();
                $pagination_data['total_page'] = floor($pagination_data['total_data'] / $pagination_data['limit']);
                if (($pagination_data['total_data'] % $pagination_data['limit']) > 0) {
                    $pagination_data['total_page']++;
                }
                echo json_encode($pagination_data);
            } else {
                return view(
                    'content/data/list/' . $ui,
                    $data
                );
            }
        }

        // -------------------------------------
        // Ambil 1 Data
        // -------------------------------------
        else if ($mode == 'single') {
            $id = $this->request->getGet('id');
            $data = $sql->getWhere(array('id_detailDashboard' => $id))->getResultArray();
            foreach ($data as $key => $value) {
                if ($value['nama_detailDashboard'] != null) {
                    $data[$key]['nama_detailDashboard'] = unserialize(base64_decode($value['nama_detailDashboard']));
                }
            }
            echo json_encode($data);
        }
    }

    public function write_detail_dashboard($mode)
    {
        if ($mode == 'insert') {
            if ($this->request->isAJAX()) {
                $sql = $this->detDash->orderBy('id_detailDashboard', 'desc')->findAll(1);
                $nama = array(
                    'ind' => $this->request->getPost('ind'),
                    'en' => $this->request->getPost('en')
                );
                $id = intval(str_replace('D', '', $sql[0]["id_detailDashboard"]));
                if ($id < 9) {
                    $id = 'DD000' . ($id + 1);
                } elseif ($id < 99) {
                    $id = 'DD00' . ($id + 1);
                } elseif ($id < 999) {
                    $id = 'DD0' . ($id + 1);
                } else {
                    $id = 'DD' . ($id + 1);
                }

                $file = $this->request->getFile('imgInp');
                $newName = $this->request->getPost('en') . '.' . $file->getExtension();
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move(FCPATH . 'assets/icon/ddash/', $newName);
                }
                $data = array(
                    'id_detailDashboard' => $id,
                    'id_dashboard' => $this->request->getPost('id_dashboard'),
                    'nama_detailDashboard' => base64_encode(serialize($nama)),
                    'icon_detailDashboard' => 'assets/icon/ddash/' . $newName
                );

                $result = $this->detDash->insert($data);
                echo json_encode($result);
            }
        } else if ($mode == 'update') {
            if ($this->request->isAJAX()) {
                $id = $this->request->getPost('id_detailDashboard');
                $nama = array(
                    'ind' => $this->request->getPost('ind'),
                    'en' => $this->request->getPost('en')
                );
                if ($_FILES['img']['name'] != "") {
                    $sql = $this->detDash->getWhere(array('id_detailDashboard' => $id))->getResultArray();
                    unlink(FCPATH . $sql[0]['icon_detailDashboard']); 

                    $file = $this->request->getFile('img');
                    $newName = $this->request->getPost('en') . '.' . $file->getExtension();
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move(FCPATH . 'assets/icon/', $newName);
                    }
                    $data = array(
                        'nama_detailDashboard' => base64_encode(serialize($nama)),
                        'icon_detailDashboard' => 'assets/icon/ddash/' . $newName
                    );
                } else {
                    $data = array(
                        'nama_detailDashboard' => base64_encode(serialize($nama))
                    );
                }
                $result = $this->detDash->update($id, $data);
                echo json_encode($result);
            }
        } else if ($mode == 'delete') {
            if ($this->request->isAJAX()) {
                $id = $this->request->getPost('id');
                $sql = $this->detDash->getWhere(array('id_detailDashboard' => $id))->getResultArray();
                unlink(FCPATH . $sql[0]['icon_detailDashboard']);

                $result = $this->detDash->delete($id);
                echo json_encode($result);
            }
        }
    }

    public function read_deskripsi($mode = 'single', $ui = FALSE, $pagination = FALSE)
    {
        $sql = $this->builder->table('tb_deskripsi');
        // dd(count($sql->get()->getResultArray()));
        if ($mode == 'show') {
            // Pagination
            $data['limit'] = $this->request->getGet('limit');
            if ($data['limit'] == null) {
                $data['limit'] = 0;
            }
            $data['page'] = $this->request->getGet('page');
            if ($data['page'] == null) {
                $data['page'] = 1;
            }
            $data['offset'] = ($data['page'] - 1) * $data['limit'];

            // Pengurutan Data
            $order = $this->request->getGet('order');
            if ($order != null) {
                $sql->orderBy('id_deskripsi', $order);
            }

            // Pencarian Judul
            $cari = $this->request->getGet('cari');
            if ($cari != null) {
                // Pengambilan Data
                $id = $this->request->getGet('id');
                $datax = $sql->where(array('id_detailDashboard' => $id))->get($data['limit'], $data['offset'])->getResultArray();
                foreach ($datax as $key => $value) {
                    if ($value['nama_deskripsi'] != null) {
                        $datax[$key]['nama_deskripsi'] = unserialize(base64_decode($value['nama_deskripsi']));
                    }
                    if (
                        strpos($datax[$key]['nama_deskripsi']['ind'], $cari) !== false ||
                        strpos($datax[$key]['nama_deskripsi']['en'], $cari) !== false
                    ) {
                        $data['data_buku'][] = $datax[$key];
                    }
                };
            } else {
                // Pengambilan Data
                $id = $this->request->getGet('id');
                $data['data_buku'] = $sql->where(array('id_detailDashboard' => $id))->get($data['limit'], $data['offset'])->getResultArray();
                foreach ($data['data_buku'] as $key => $value) {
                    if ($value['nama_deskripsi'] != null) {
                        $data['data_buku'][$key]['nama_deskripsi'] = unserialize(base64_decode($value['nama_deskripsi']));
                    }
                };
            }

            // Route ke Pagination atau data
            if ($pagination != FALSE) {
                if ($data['limit'] != 0) $pagination_data['limit'] = $data['limit'];
                else $pagination_data['limit'] = 1;
                $pagination_data['offset'] = $data['offset'];
                $pagination_data['page'] = $data['page'];
                $pagination_data['total_data'] = $this->builder->table('tb_deskripsi')->countAll();
                $pagination_data['total_page'] = floor($pagination_data['total_data'] / $pagination_data['limit']);
                if (($pagination_data['total_data'] % $pagination_data['limit']) > 0) {
                    $pagination_data['total_page']++;
                }
                echo json_encode($pagination_data);
            } else {
                return view(
                    'content/data/list/' . $ui,
                    $data
                );
            }
        }

        // -------------------------------------
        // Ambil 1 Data
        // -------------------------------------
        else if ($mode == 'single') {
            $id = $this->request->getGet('id');
            $data = $sql->getWhere(array('id_deskripsi' => $id))->getResultArray();
            foreach ($data as $key => $value) {
                if ($value['nama_deskripsi'] != null) {
                    $data[$key]['nama_deskripsi'] = unserialize(base64_decode($value['nama_deskripsi']));
                }
            }
            echo json_encode($data);
        }
    }

    public function write_deskripsi($mode)
    {
        if ($mode == 'insert') {
            if ($this->request->isAJAX()) {
                $sql = $this->des->orderBy('id_deskripsi', 'desc')->findAll(1);
                $nama = array(
                    'ind' => $this->request->getPost('ind'),
                    'en' => $this->request->getPost('en')
                );
                if (count($sql) > 0) {
                    $id = intval(str_replace('Ds', '', $sql[0]["id_deskripsi"]));
                    if ($id < 9) {
                        $id = 'Ds000' . ($id + 1);
                    } elseif ($id < 99) {
                        $id = 'Ds00' . ($id + 1);
                    } elseif ($id < 999) {
                        $id = 'Ds0' . ($id + 1);
                    } else {
                        $id = 'Ds' . ($id + 1);
                    }
                } else {
                    $id = 'Ds0001';
                }

                $file = $this->request->getFile('imgInp');
                $newName = $this->request->getPost('en') . '1.' . $file->getExtension();
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move(FCPATH . 'public/assets/icon/des/', $newName);
                }
                $data = array(
                    'id_deskripsi' => $id,
                    'id_detailDashboard' => $this->request->getPost('id_detailDashboard'),
                    'nama_deskripsi' => base64_encode(serialize($nama)),
                    'icon_deskripsi' => 'public/assets/icon/des/' . $newName
                );

                $da['message'] = 'insert deskripsi';
                $this->pusher->trigger('my-channel', 'my-crud-deskripsi', $da);
                $result = $this->des->insert($data);
                echo json_encode($result);
            }
        } else if ($mode == 'update') {
            if ($this->request->isAJAX()) {
                $id = $this->request->getPost('id_deskripsi');
                $nama = array(
                    'ind' => $this->request->getPost('ind'),
                    'en' => $this->request->getPost('en')
                );

                $sql = $this->des->getWhere(array('id_deskripsi' => $id))->getResultArray();
                $update = $sql[0]['updated_deskripsi'] + 1;
                if ($_FILES['img']['name'] != "") {
                    unlink(FCPATH . $sql[0]['icon_deskripsi']);

                    $file = $this->request->getFile('img');
                    $newName = $this->request->getPost('en') . $update . '.' . $file->getExtension();
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move(FCPATH . 'public/assets/icon/des/', $newName);
                    }
                    $data = array(
                        'nama_deskripsi' => base64_encode(serialize($nama)),
                        'updated_deskripsi' => $update,
                        'icon_deskripsi' => 'public/assets/icon/des/' . $newName
                    );
                } else {
                    $data = array(
                        'nama_deskripsi' => base64_encode(serialize($nama)),
                        'updated_deskripsi' => $update
                    );
                }

                $da['message'] = 'update deskripsi';
                $this->pusher->trigger('my-channel', 'my-crud-deskripsi', $da);
                $result = $this->des->update($id, $data);
                echo json_encode($result);
            }
        } else if ($mode == 'delete') {
            if ($this->request->isAJAX()) {
                $id = $this->request->getPost('id');
                $sql = $this->des->getWhere(array('id_deskripsi' => $id))->getResultArray();
                unlink(FCPATH . $sql[0]['icon_deskripsi']);

                $da['message'] = 'delete deskripsi';
                $this->pusher->trigger('my-channel', 'my-crud-deskripsi', $da);
                $result = $this->des->delete($id);
                echo json_encode($result);
            }
        }
    }

    public function read_detail_deskripsi()
    {
        $sql = $this->builder->table('tb_detail_deskripsi')->join('tb_deskripsi', 'tb_detail_deskripsi.id_dashboard = tb_deskripsi.id_deskripsi')->getWhere(array('id_dashboard' => $this->request->getGet('id')))->getResultArray();
        foreach ($sql as $key => $value) {
            if ($value['deskripsi_detailDeskripsi'] != null) {
                $sql[$key]['deskripsi_detailDeskripsi'] = unserialize(base64_decode($value['deskripsi_detailDeskripsi']));
            }
            if ($value['nama_deskripsi'] != null) {
                $sql[$key]['nama_deskripsi'] = unserialize(base64_decode($value['nama_deskripsi']));
            }
        }
        echo json_encode($sql[0]);
    }

    public function read_rating($ui = FALSE, $pagination = FALSE)
    {
        $sql = $this->builder->table('tb_rating')->join('tb_user', 'tb_user.id_user = tb_rating.id_user');
        // Pagination
        $data['limit'] = $this->request->getGet('limit');
        if ($data['limit'] == null) {
            $data['limit'] = 0;
        }
        $data['page'] = $this->request->getGet('page');
        if ($data['page'] == null) {
            $data['page'] = 1;
        }
        $data['offset'] = ($data['page'] - 1) * $data['limit'];

        // Pengurutan Data
        $order = $this->request->getGet('order');
        if ($order != null) {
            $sql->orderBy('id_detailDeskripsi', $order);
        }

        // Pencarian Judul
        $cari = $this->request->getGet('cari');
        if ($cari != null) {
            // Pengambilan Data
            $id = $this->request->getGet('id');
            $datax = $sql->where(array('id_detailDeskripsi' => $id, 'email' => $cari))->orWhere(array('comment' => $cari))->orWhere(array('rating' => $cari))->get($data['limit'], $data['offset'])->getResultArray();
            foreach ($datax as $key => $value) {
            //     if ($value['nama_deskripsi'] != null) {
            //         $datax[$key]['nama_deskripsi'] = unserialize(base64_decode($value['nama_deskripsi']));
            //     }
            //     if (
            //         strpos($datax[$key]['nama_deskripsi']['ind'], $cari) !== false ||
            //         strpos($datax[$key]['nama_deskripsi']['en'], $cari) !== false
            //     ) {
                    $data['data_buku'][] = $datax[$key];
            //     }
            };
        } else {
            // Pengambilan Data
            $id = $this->request->getGet('id');
            $data['data_buku'] = $sql->where(array('id_detailDeskripsi' => $id))->get($data['limit'], $data['offset'])->getResultArray();
            // foreach ($data['data_buku'] as $key => $value) {
            //     if ($value['nama_deskripsi'] != null) {
            //         $data['data_buku'][$key]['nama_deskripsi'] = unserialize(base64_decode($value['nama_deskripsi']));
            //     }
            // };
        }

        // Route ke Pagination atau data
        if ($pagination != FALSE) {
            if ($data['limit'] != 0) $pagination_data['limit'] = $data['limit'];
            else $pagination_data['limit'] = 1;
            $pagination_data['offset'] = $data['offset'];
            $pagination_data['page'] = $data['page'];
            $pagination_data['total_data'] = $this->builder->table('tb_rating')->join('tb_user', 'tb_user.id_user = tb_rating.id_user')->where(array('id_detailDeskripsi' => $this->request->getGet('id')))->countAll();
            $pagination_data['total_page'] = floor($pagination_data['total_data'] / $pagination_data['limit']);
            if (($pagination_data['total_data'] % $pagination_data['limit']) > 0) {
                $pagination_data['total_page']++;
            }
            echo json_encode($pagination_data);
        } else {
            return view(
                'content/data/list/' . $ui,
                $data
            );
        }
    }
}