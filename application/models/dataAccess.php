<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Mod�le qui impl�mente les fonctions d'acc�s aux donn�es 
*/
class DataAccess extends CI_Model {
// TODO : Transformer toutes les requ�tes en requ�tes param�tr�es

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
	 * Retourne les informations d'un visiteur
	 * 
	 * @param $login 
	 * @param $mdp
	 * @return l'id, le nom et le pr�nom sous la forme d'un tableau associatif 
	*/
	public function getInfosVisiteur($login, $mdp){
		$req = "select visiteur.id as id, visiteur.nom as nom, visiteur.prenom as prenom, visiteur.statut as statut
				from visiteur 
				where visiteur.login=? and visiteur.mdp=?";
		$rs = $this->db->query($req, array ($login, $mdp));
		$ligne = $rs->first_row('array'); 
		return $ligne;
	}
	
	public function getlistcompterendu($id){
		$req = "select RAP_BILAN, RAP_DATE, RAP_MOTIF
		from rapport_visite
		where VIS_Matricule = ?
		order by RAP_DATE desc";
		$rs = $this->db->query($req, array ($id));
		$ligne = $rs->result_array();
		return $ligne;
	}
	
	public function getAllPraticien(){
		$req = "select *
		from praticien";
		$rs = $this->db->query($req, array ());
		$ligne = $rs->result_array();
		return $ligne;
	}
	public function getAllMedicament(){
		$req = "select *
		from medicament";
		$rs = $this->db->query($req, array ());
		$ligne = $rs->result_array();
		return $ligne;
	}
	
	public function ajoutcr($motif, $bilan, $date, $idUser){
		$req = "INSERT INTO rapport_visite (VIS_MATRICULE, RAP_MOTIF, RAP_BILAN, RAP_DATE)
				 VALUES('$idUser', '$motif', '$bilan', '$date')";
		$rs = $this->db->query($req, array ());
		$ligne = 1;
		return $ligne;
	}

}
?>