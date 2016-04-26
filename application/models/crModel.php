<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class crModel extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function listecompterendu($id)
	{
		$this->load->model('dataAccess');
		$listcr = $this->dataAccess->getlistcompterendu($id);
		
		return $listcr;
	}
	
	
	public function listeuncr($id,$rapnum)
	{
		$this->load->model('dataAccess');
		$uncr = $this->dataAccess->getuncr($id,$rapnum);
	
		return $uncr;
	}
	
	public function recupunprac($rapnum,$id)
	{
		$this->load->model('dataAccess');
		$unprac = $this->dataAccess->getunprac($rapnum,$id);
	
		return $unprac;
	}
	
	public function recupqtemedocs($rapnum,$id)
	{
		$this->load->model('dataAccess');
		$lesmedocs = $this->dataAccess->getlesqtemedocs($rapnum,$id);
	
		return $lesmedocs;
	}
	
	public function recuplesmedocs($idmedoc)
	{
		$this->load->model('dataAccess');
		$lesmedocs = $this->dataAccess->getlesmedocs($idmedoc);
	
		return $lesmedocs;
	}
	
	public function listpraticien()
	{
		$this->load->model('dataAccess');
		$listpraticien = $this->dataAccess->getAllPraticien();
	
		return $listpraticien;
	}
	public function listmedicament($id, $rapnum)
	{
		$this->load->model('dataAccess');
		$listmedicament = $this->dataAccess->getMedicamentList($id, $rapnum);
	
		return $listmedicament;
	}
	
	public function ajoutcr($motif, $bilan, $date, $idUser, $praticien){
		$this->load->model('dataAccess');
		$ligne = $this->dataAccess->ajoutcr($motif, $bilan, $date, $idUser, $praticien);
	}
	
	public function ajoutmedicament($idUser,$echantillions,$medicament,$rap_num){
		$this->load->model('dataAccess');
		$ligne = $this->dataAccess->ajoutmedicament($idUser,$echantillions,$medicament,$rap_num);
	}

}
