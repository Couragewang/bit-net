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
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('site/index.html');
	}

	public function sign($method=''){
		if( $method == 'sign_in' ){
			$this->load->view('site/sign_in.html');
		}elseif ( $method == 'sign_up' ){
			$this->load->view('site/sign_up.html');
			$this->load->view('site/user_insert_tail.html');
		}elseif( $method == 'admin_input' ){
			$this->load->view('site/admin_input.html');
			$this->load->view('site/user_insert_tail.html');
		}else{
		}
	}
}
