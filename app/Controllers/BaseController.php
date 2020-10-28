<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use App\Models\BeritaModel;
use App\Models\DashboardModel;
use App\Models\DeskripsiModel;
use App\Models\DetailDashboardModel;
use App\Models\DetailDeskripsiModel;
use App\Models\RatingModel;
use App\Models\UserModel;

require_once(APPPATH . '../vendor/autoload.php');

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		$options = array(
			'cluster' => 'mt1',
			'useTLS' => true
		);
		$this->pusher = new \Pusher\Pusher(
			'1fac292d0f7a131ee7c5',
			'1a9d5f0c059bd256a88d',
			'1073090',
			$options
		);
		$this->request = \Config\Services::request();
		$this->dash = new DashboardModel();
		$this->news = new BeritaModel();
		$this->detDash = new DetailDashboardModel();
		$this->des = new DeskripsiModel();
		$this->detDes = new DetailDeskripsiModel();
		$this->user = new UserModel();
		$this->rating = new RatingModel();
	}
}
