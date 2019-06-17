<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

	function __construct() {
        parent::__construct();
        $this->load->model('Model_permintaan');
        $this->load->library('session');
    }

	public function index()
	{
		if(($this->session->userdata('level') == '2') or ($this->session->userdata('level') == '3') or ($this->session->userdata('level') == '4') ){
		$this->db->select('*');
        $this->db->from('tbl_nota');
		$this->db->join('tbl_subbidang', 'tbl_subbidang.id_seksi=tbl_nota.id_seksi');
		$this->db->where('tobeuser',$this->session->userdata('username'));
        $data['nota'] = $this->db->get()->result();
		$data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
		$data['hasil'] = $this->Model_permintaan->ambilnotif();
		$data['profil'] = $this->Model_permintaan->get_profile();
		$this->load->view('admin/home', $data);
		}
		else{
			$this->db->select('*');
			$this->db->from('tbl_nota');
			$this->db->join('tbl_subbidang', 'tbl_subbidang.id_seksi=tbl_nota.id_seksi');
			$this->db->where('user',$this->session->userdata('username'));
			$data['nota'] = $this->db->get()->result();
			$data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
			$data['hasil'] = $this->Model_permintaan->ambilnotif();
			$data['profil'] = $this->Model_permintaan->get_profile();
			$this->load->view('admin/home', $data);
		}
	}

	/*function logout(){
		$this->session->unset_userdata("username"); 
		session_unset();
        $this->session->sess_destroy();
        redirect('','refresh');
    }*/
}
