<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('crModel');
		$listecr = $this->crController->listecr();
		print_r('blablacontroller');
		die();
		$this->load->view('cr/consulter.php',$listecr);
	}
	
	public function listecr()
	{
		print_r('blabla');
		die();
		$this->load->model('user');
		$this->load->model('crModel');
		$id = $this->session->id;
		$listcr->crModel->listecompterendu($id);
		
		return $listcr;
	}	
		
}

