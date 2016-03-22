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
	
	public function listpraticien()
	{
		$this->load->model('dataAccess');
		$listpraticien = $this->dataAccess->getAllPraticien();
	
		return $listpraticien;
	}
	public function listmedicament()
	{
		$this->load->model('dataAccess');
		$listmedicament = $this->dataAccess->getAllMedicament();
	
		return $listmedicament;
	}
	
	public function ajoutcr($motif, $bilan, $date, $idUser){
		$this->load->model('dataAccess');
		$ligne = $this->dataAccess->ajoutcr($motif, $bilan, $date, $idUser);
	}

}
