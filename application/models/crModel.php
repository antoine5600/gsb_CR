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

}
