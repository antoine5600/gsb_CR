<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model('user');
		$this->load->helper('form');
		if (!$this->user->estConnecte()) 
		{
			$data = array();
			$this->load->view('login/login.php',$data);
		}
		else
		{
			$this->load->view('welcome_message.php');
		}
	}
	
	public function connecter ()
	{
		print_r('ici');
		die();
		$this->load->model('user');
	
		$login = $this->input->post('login');
		$mdp = $this->input->post('mdp');
	
		$authUser = $this->user->authentifier($login, $mdp);
	
		if(empty($authUser))
		{
			$data = array('erreur'=>'Login ou mot de passe incorrect');
			$this->templates->load('login', $data);
		}
		else
		{
			$this->user->connecter($authUser['id'], $authUser['nom'], $authUser['prenom']);
			$this->load->view('welcome_message.php');
		}
	}
}
