<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$sql = $this->dash->findAll();
		foreach ($sql as $key => $value) {
			if ($value['nama_dashboard'] != null) $sql[$key]['nama_dashboard'] = unserialize(base64_decode($value['nama_dashboard']));
		}
		echo json_encode($sql);
	}

	public function berita()
	{
		$sql = $this->news->findAll();
		echo json_encode($sql);
	}

	public function detailD()
	{
		$sql = $this->detDash->getWhere(['id_dashboard' => $this->request->getPost('id_dashboard')])->getResultArray();
		foreach ($sql as $key => $value) {
			if ($value['nama_detailDashboard'] != null) $sql[$key]['nama_detailDashboard'] = unserialize(base64_decode($value['nama_detailDashboard']));
		}
		echo json_encode($sql);
	}

	public function deskripsi()
	{
		$sql = $this->detDash->getWhere(['id_detailDashboard' => $this->request->getPost('id_detailDashboard')])->getResultArray();
		foreach ($sql as $key => $value) {
			if ($value['nama_deskripsi'] != null) $sql[$key]['nama_deskripsi'] = unserialize(base64_decode($value['nama_deskripsi']));
		}
		echo json_encode($sql);
	}

	public function detailDes()
	{
		$sql = $this->detDes->where(array('id_dashboard' => $this->request->getPost('id_dashboard')))->get(1)->getResultArray();
		if (count($sql) > 0) {
			foreach ($sql as $key => $value) {
				if ($value['deskripsi_detailDeskripsi'] != null) $sql[$key]['deskripsi_detailDeskripsi'] = unserialize(base64_decode($value['deskripsi_detailDeskripsi']));
				if ($value['foto_detailDeskripsi'] != null) $sql[$key]['foto_detailDeskripsi'] = unserialize(base64_decode($value['foto_detailDeskripsi']));
			}
		}
		echo json_encode($sql);
	}

	public function register()
	{
		$username = $this->request->getPost('username');
		$sql = $this->user->getWhere(array('username' => $username))->getResultArray();
		$data = [
			'username' => $username,
			'email' => $this->request->getPost('email')
		];
		$sql = $this->user->insert($data);
		if ($sql) {
			$r['status'] = '0';
			$r['message'] = 'Insert Successfully';
			echo json_encode($r);
		} else {
			$r['status'] = '1';
			$r['message'] = 'Insert Unsuccessfully';
			echo json_encode($r);
		}
	}

	public function login()
	{
		$sql = $this->user->getWhere([
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password')
		])->getFieldCount();
		if ($sql > 1) {
			$r['status'] = '0';
			$r['message'] = 'Login Successfully';
			echo json_encode($r);
		} else {
			$r['status'] = '1';
			$r['message'] = 'Login Unsuccessfully';
			echo json_encode($r);
		}
	}

	public function pusher()
	{
		$data['message'] = 'hello world';
		$this->pusher->trigger('my-channel', 'my-event', $data);
	}

	public function read_detail_deskripsi()
	{
		$sql = $this->builder->table('tb_detail_deskripsi')
		->join('tb_deskripsi', 'tb_detail_deskripsi.id_dashboard = tb_deskripsi.id_deskripsi')
		->where(array("id_dashboard" => $this->request->getPost('id_dashboard')))
			->get(1)->getResultArray();
		foreach ($sql as $key => $value) {
			if ($value['deskripsi_detailDeskripsi'] != null) {
				$sql[$key]['deskripsi_detailDeskripsi'] = unserialize(base64_decode($value['deskripsi_detailDeskripsi']));
			}
			if ($value['foto_detailDeskripsi'] != null) {
				$sql[$key]['foto_detailDeskripsi'] = unserialize(base64_decode($value['foto_detailDeskripsi']));
			}
			if ($value['nama_deskripsi'] != null) {
				$sql[$key]['nama_deskripsi'] = unserialize(base64_decode($value['nama_deskripsi']));
			}
		}
		echo json_encode($sql);
	}

	public function read_rating()
	{
		$sql = $this->builder->table('tb_rating')
		->join('tb_user', 'tb_user.id_user = tb_rating.id_user')
		->join('tb_detail_deskripsi', 'tb_detail_deskripsi.id_dashboard = tb_rating.id_detailDeskripsi');
		// dd(count($sql->get()->getResultArray()));
		$mode = $this->request->getPost('mode');
		switch ($mode) {
			case 1:
				$data = $sql->where(array("id_dashboard" => $this->request->getPost('id_dashboard')))->orderBy('rating', 'desc')->get(1)->getResultArray();
				foreach ($data as $key => $value) {
					if ($value['deskripsi_detailDeskripsi'] != null) {
						$data[$key]['deskripsi_detailDeskripsi'] = unserialize(base64_decode($value['deskripsi_detailDeskripsi']));
					}
					if ($value['foto_detailDeskripsi'] != null) {
						$data[$key]['foto_detailDeskripsi'] = unserialize(base64_decode($value['foto_detailDeskripsi']));
					}
				}
				echo json_encode($data);
				break;
			case 2:
				$data = $sql->where(array("id_dashboard" => $this->request->getPost('id_dashboard')))->get()->getResultArray();
				foreach ($data as $key => $value) {
					if ($value['deskripsi_detailDeskripsi'] != null) {
						$data[$key]['deskripsi_detailDeskripsi'] = unserialize(base64_decode($value['deskripsi_detailDeskripsi']));
					}
					if ($value['foto_detailDeskripsi'] != null) {
						$data[$key]['foto_detailDeskripsi'] = unserialize(base64_decode($value['foto_detailDeskripsi']));
					}
				}
				echo json_encode($data);
				break;
			case 3:
				$data = $sql->orderBy('rating', 'desc')->get()->getResultArray();
				foreach ($data as $key => $value) {
					if ($value['deskripsi_detailDeskripsi'] != null) {
						$data[$key]['deskripsi_detailDeskripsi'] = unserialize(base64_decode($value['deskripsi_detailDeskripsi']));
					}
					if ($value['foto_detailDeskripsi'] != null) {
						$data[$key]['foto_detailDeskripsi'] = unserialize(base64_decode($value['foto_detailDeskripsi']));
					}
				}
				echo json_encode($data[0]);
				break;

			default:
				$data = $sql->get()->getResultArray();
				foreach ($data as $key => $value) {
					if ($value['deskripsi_detailDeskripsi'] != null) {
						$data[$key]['deskripsi_detailDeskripsi'] = unserialize(base64_decode($value['deskripsi_detailDeskripsi']));
					}
					if ($value['foto_detailDeskripsi'] != null) {
						$data[$key]['foto_detailDeskripsi'] = unserialize(base64_decode($value['foto_detailDeskripsi']));
					}
				}
				echo json_encode($data);
				break;
		}
		if ($mode == 'show') {
		}

		// -------------------------------------
		// Ambil 1 Data
		// -------------------------------------
		else if ($mode == 'single') {
			$id = $this->request->getPost('id');
			$data = $sql->getWhere(array('id_deskripsi' => $id))->getResultArray();
			foreach ($data as $key => $value) {
				if ($value['nama_deskripsi'] != null) {
					$data[$key]['nama_deskripsi'] = unserialize(base64_decode($value['nama_deskripsi']));
				}
			}
			echo json_encode($data);
		}
	}

	public function write_rating()
	{
		$sql = $this->rating->orderBy('id_rating', 'desc')->findAll(1);
		if (count($sql) == 1) {
			$id = intval(str_replace('R', '', $sql[0]["id_rating"]));
			if ($id < 9) {
				$id = 'R000' . ($id + 1);
			} elseif ($id < 99) {
				$id = 'R00' . ($id + 1);
			} elseif ($id < 999) {
				$id = 'R0' . ($id + 1);
			} else {
				$id = 'R' . ($id + 1);
			}
		} else {
			$id = 'R0001';
		}

		$user = $this->user->getWhere(array('email' => $this->request->getPost('email')))->getResultArray();

		$data = array(
			'id_rating' => $id,
			'id_user' => $user[0]['id_user'],
			'id_detailDeskripsi' => $this->request->getPost('id_dashboard'),
			'rating' => $this->request->getPost('rating'),
			'comment' => $this->request->getPost('comment'),
		);

		$result = $this->rating->insert($data);
		echo json_encode($result);
	}
}
