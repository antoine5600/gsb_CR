<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	/**
	 * Teste si un quelconque visiteur est connect�
	 *
	 * @return vrai ou faux
	 */
	public function estConnecte()
	{
		return $this->session->userdata('idUser');
	}

	/**
	 * Enregistre dans une variable session les infos d'un visiteur
	 *
	 * @param $id
	 * @param $nom
	 * @param $prenom
	 */
	public function connecter($idUser,$nom,$prenom)
	{	// TODO : s'assurer que les param�tres re�us sont coh�rents avec ceux m�moris�s en session

		$authUser = array(
				'idUser'  => $idUser,
				'nom' => $nom,
				'prenom' => $prenom,
		);

		$this->session->set_userdata($authUser);
	}

	/**
	 * D�truit la session active et redirige vers le contr�leur par d�faut
	 */


	/**
	 * V�rifie en base de donn�es si les informations de connexions sont correctes
	 *
	 * @return : renvoie l'id, le nom et le prenom de l'utilisateur dans un tableau s'il est reconnu, sinon un tableau vide.
	 */
	public function authentifier ($login, $mdp)
	{	// TODO : s'assurer que les param�tres re�us sont coh�rents avec ceux m�moris�s en session


		$authUser = $this->getInfosVisiteur($login, $mdp);

		return $authUser;
	}
	
	public function getInfosVisiteur($login, $mdp){
		$req = "select visiteur.VIS_MATRICULE as id, visiteur.VIS_NOM as nom, visiteur.Vis_PRENOM as prenom
		from visiteur
		where visiteur.VIS_NOM=? and visiteur.password=?";
		$rs = $this->db->query($req, array ($login, $mdp));
		$ligne = $rs->first_row('array');
		return $ligne;
	}
}
