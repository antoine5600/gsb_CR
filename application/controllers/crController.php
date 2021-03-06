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
		if (!$this->session->userdata('idUser')) 
		{
			$data = array();
			$this->load->view('login/login.php',$data);
		}
		else
		{
			$this->load->model('crModel');
			$data ['listecr'] = $this->listecr();
			$this->load->view('cr/consulter.php',$data);
		}
	}
	
	public function details($rapnum)
	{
		if (!$this->session->userdata('idUser'))
		{
			$data = array();
			$this->load->view('login/login.php',$data);
		}
		else
		{
			$this->load->model('crModel');
			$this->load->model('user');
			
			$id = $this->session->userdata('idUser');
			$data ['listecr'] = $this->listeuncr($rapnum);
			$uncr = $data ['listecr'];
			$data ['unprac'] = $this->crModel->recupunprac($rapnum,$id);
			$data ['qtemedocs'] = $this->crModel->recupqtemedocs($rapnum,$id);
			$tab = $data ['qtemedocs'];
			
			$i = 0;
			foreach ($tab as $ligne)
			{
				$tabfinal[$i] = $this->crModel->recuplesmedocs($ligne['MED_DEPOTLEGAL']);
				$i += 1;
			}
			if(isset($tabfinal))
			{
				$data ['lesmedocs'] = $tabfinal;
			}
			
			$this->load->view('cr/detail.php',$data);
		}
	}
	
	public function listeuncr($rapnum)
	{
		if (!$this->session->userdata('idUser'))
		{
			$data = array();
			$this->load->view('login/login.php',$data);
		}
		else
		{
			$this->load->model('user');
			$this->load->model('crModel');
			$id = $this->session->userdata('idUser');
			$uncr = $this->crModel->listeuncr($id,$rapnum);
		}
	
		return $uncr;
	}
	
	public function listecr()
	{
		if (!$this->session->userdata('idUser'))
		{
			$data = array();
			$this->load->view('login/login.php',$data);
		}
		else
		{
			$this->load->model('user');
			$this->load->model('crModel');
			$id = $this->session->userdata('idUser');
			$listcr = $this->crModel->listecompterendu($id);
		}
		
		return $listcr;
	}	
	
	public function formajoutcr()
	{
		if (!$this->session->userdata('idUser'))
		{
			$data = array();
			$this->load->view('login/login.php',$data);
		}
		else
		{
			$this->load->model('user');
			$this->load->model('crModel');
			$id = $this->session->userdata('idUser');
			$listpraticien = $this->crModel->listpraticien();
			$data ['listpraticien'] = $listpraticien;
			$this->load->view('cr/ajoutcr.php',$data);
		}
	}
	
	public function ajoutcr()
	{
		if (!$this->session->userdata('idUser'))
		{
			$data = array();
			$this->load->view('login/login.php',$data);
		}
		else
		{
			$this->load->model('user');
			$this->load->model('crModel');
		
			$motif = $this->input->post('motif');
			$bilan = $this->input->post('bilan');
			$date = $this->input->post('date');
			$praticien = $this->input->post('praticien');
		
			$idUser = $this->session->idUser;
	
				$this->crModel->ajoutcr($motif, $bilan, $date, $idUser,$praticien);
				$this->index();
		}
	}
	
	public function formajoutmedicament($rap_num)
	{
		if (!$this->session->userdata('idUser'))
		{
			$data = array();
			$this->load->view('login/login.php',$data);
		}
		else
		{
			$this->load->model('user');
			$this->load->model('crModel');
			$id = $this->session->userdata('idUser');
			$listmedicament = $this->crModel->listmedicament($id, $rap_num);
			$data ['listmedicament'] = $listmedicament;
			$data ['rap_num'] = $rap_num;
			$this->load->view('cr/ajoutmedicament.php',$data);
		}
	}
	
	public function ajoutmedicament()
	{
		if (!$this->session->userdata('idUser'))
		{
			$data = array();
			$this->load->view('login/login.php',$data);
		}
		else
		{
			$this->load->model('user');
			$this->load->model('crModel');
	
			$echantillions = $this->input->post('echantillion');
			$medicament = $this->input->post('medicament');
			$rap_num = $this->input->post('rap_num');
	
			$idUser = $this->session->idUser;
	
			$this->crModel->ajoutmedicament($idUser,$echantillions,$medicament,$rap_num);
			$this->index();
		}
	}
		
}

