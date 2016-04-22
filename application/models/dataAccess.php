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
		$req = "select RAP_BILAN, RAP_DATE, RAP_MOTIF, RAP_NUM, PRA_NUM
		from rapport_visite
		where VIS_Matricule = ?
		order by RAP_DATE desc";
		$rs = $this->db->query($req, array ($id));
		$ligne = $rs->result_array();
		return $ligne;
	}
	
	public function getuncr($id,$rapnum){
		$req = "select RAP_BILAN, RAP_DATE, RAP_MOTIF, RAP_NUM, PRA_NUM
		from rapport_visite
		where VIS_Matricule = '".$id."' and RAP_NUM = ".$rapnum;
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
	
	public function getlesqtemedocs($rapnum, $id){
		$req = "select *
		from offrir
		where VIS_Matricule = '".$id."' and RAP_NUM = ".$rapnum;
		$rs = $this->db->query($req, array ($id));
		$ligne = $rs->result_array();
		
		return $ligne;
	}
	
	public function getlesmedocs($idmedoc){
		$req = "select MED_NOMCOMMERCIAL
		from medicament
		where MED_DEPOTLEGAL = '".$idmedoc."'";
		$rs = $this->db->query($req, array ());
		$ligne = $rs->result_array();
	
		return $ligne;
	}
	
	public function getunprac($rapnum, $id){
		$req = "select PRA_NUM
		from rapport_visite
		where RAP_NUM = ".$rapnum." and VIS_MATRICULE = '".$id."'";
		$rs = $this->db->query($req, array ());
		$ligne = $rs->first_row('array');
		
		$req2 = "select PRA_NOM
		from praticien
		where PRA_NUM = ".$ligne['PRA_NUM'];
		$rs2 = $this->db->query($req2, array ());
		$ligne2 = $rs2->first_row('array');
		return $ligne2;
	}
	
	public function ajoutcr($motif, $bilan, $date, $idUser, $praticien){
		$req = "INSERT INTO rapport_visite (VIS_MATRICULE, RAP_MOTIF, RAP_BILAN, RAP_DATE, PRA_NUM)
				 VALUES('$idUser', '$motif', '$bilan', '$date', '$praticien')";
		$rs = $this->db->query($req, array ());
		$ligne = 1;
		return $ligne;
	}
	
	public function ajoutmedicament($idUser, $echantillions,$medicament,$rap_num){
		$req = "INSERT INTO offrir (VIS_MATRICULE, MED_DEPOTLEGAL, OFF_QTE, RAP_NUM)
		VALUES('$idUser', '$medicament', '$echantillions','$rap_num')";
		$rs = $this->db->query($req, array ());
		$ligne = 1;
		return $ligne;
	}

}
?>