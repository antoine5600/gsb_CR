<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class crModel extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function connecter($idUser,$nom,$prenom)
	{	// TODO : s'assurer que les param�tres re�us sont coh�rents avec ceux m�moris�s en session

		$authUser = array(
				'idUser'  => $idUser,
				'nom' => $nom,
				'prenom' => $prenom,
		);

		$this->session->set_userdata($authUser);
	}
	
	public function listecompterendu($id)
	{
		$listcr = $this->dataAccess->getlistcompterendu($id);
		
		return $listcr;
	}

}
