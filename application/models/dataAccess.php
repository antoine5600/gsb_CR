<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modèle qui implémente les fonctions d'accès aux données 
*/
class DataAccess extends CI_Model {
// TODO : Transformer toutes les requêtes en requêtes paramétrées

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
	 * @return l'id, le nom et le prénom sous la forme d'un tableau associatif 
	*/
	public function getInfosVisiteur($login, $mdp){
		$req = "select visiteur.id as id, visiteur.nom as nom, visiteur.prenom as prenom, visiteur.statut as statut
				from visiteur 
				where visiteur.login=? and visiteur.mdp=?";
		$rs = $this->db->query($req, array ($login, $mdp));
		$ligne = $rs->first_row('array'); 
		return $ligne;
	}

}
?>