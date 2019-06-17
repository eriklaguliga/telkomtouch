<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http:         //example.com/index.php/welcome
     * 	- or -
     * 		http:         //example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https:     //codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_permintaan');
        $this->load->library('session');
    }

    
    var $username       = '';
    function index($type="") {
        if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $data = $this->db->get_where('tbl_login', array('username' => $username, 'password' => $password))->row_array();
                if ($data > 0){
                    $this->session->set_userdata($data);
                    redirect('admin/home');
                } else {
                    $adServer = "10.62.128.210";
                    
                    $ldap_port = 389;
                    $ldap = ldap_connect($adServer,$ldap_port);
                        
                    $ldaprdn =  $this->input->post('username');
                    $password = $this->input->post('password');

                    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
                    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
                        
                    $bind = @ldap_bind($ldap, $ldaprdn, $password);
                    if($bind){
                            $filter = "(uid=".$this->input->post('username').")";
                            $result = ldap_search($ldap,"",$filter) or exit("Unable to search"); 
                            $entries = ldap_get_entries($ldap,$result);

                            // $tbl_subbidang = array();
                            // $tbl_subbidang['nama_subbidang'] = $entries[0][$entries[0][25]][0]; //sub bidang
                            // $this->db->select('id_seksi');
                            // $this->db->from('tbl_subbidang');
                            // $this->db->where('nama_subbidang', $tbl_subbidang['nama_subbidang']);  //sub_bidang
                            // $query=$this->db->get();
                            // $hasil = $query->row();

                            // if ($query->num_rows() == 0){
                            //     $this->db->insert('tbl_subbidang', $tbl_subbidang);
                            // }
                            $tbl_login = array();
                            $tbl_login['nama'] =$entries[0][$entries[0][0]][0];
                            $tbl_login['username'] =$entries[0][$entries[0][4]][0];
                            $tbl_login['email'] =$entries[0][$entries[0][1]][0];
                            $tbl_login['level']="1";
                            $tbl_login['job_title'] =$entries[0][$entries[0][23]][0];
                            // $tbl_login['nama_subbidang'] =$entries[0][$entries[0][25]][0];
                            // $tbl_login['id_seksi'] = $this->Model_permintaan->last_record_seksi();
                            $data1 = $this->db->query("SELECT * FROM tbl_login WHERE username = ".$entries[0][$entries[0][4]][0])->row_array();
                            if ($data1 > 0){
                                $this->session->set_userdata($data1);
                                redirect('admin/home');
                            }else{
                                $this->db->insert( 'tbl_login', $tbl_login );
                                $data2 = $this->db->query("SELECT * FROM tbl_login WHERE username = ".$entries[0][$entries[0][4]][0])->row_array();
                                if ($data2 > 0){
                                    $this->session->set_userdata($data2);
                                    redirect('admin/home');
                                }
                            }
                    } else {
                        $this->load->view('login');
                    }
                }
        } else {
            $this->load->view('login'); 
        }
    }
    function logout(){
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("password"); 
        session_unset();
        $this->session->sess_destroy();
        redirect('Auth','refresh');
    }

}