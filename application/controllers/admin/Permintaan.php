<?php

Class Permintaan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_permintaan');
        $this->load->helper(array('download'));
    }

    public function downloadtemplate(){
        $this->load->helper('download');
        $FilePath = './upload/Proposed Usecase_Template.pdf';
        if(file_exists($FilePath)){
          
            force_download($FilePath,null);
            
            }
    }

    public function download(){
        $this->load->helper('download');
        if(!empty($_GET['nomor'])){
            $nomor = basename($_GET['nomor']);
            $test = $this->db->query("SELECT file_ FROM tbl_nota WHERE nomor = '$nomor' ")->row_array();
            $filename= $test['file_'];
            // echo $filename;
            $FilePath = './upload/'.$filename;
            if(!empty($filename) && file_exists($FilePath)){
          
            force_download($FilePath,null);
            
            }

        }
        
            
    }
    
    public function download_admin(){
        $this->load->helper('download');
        if(!empty($_GET['nomor'])){
            $nomor = basename($_GET['nomor']);
            $test = $this->db->query("SELECT file_ FROM tbl_nota WHERE nomor = '$nomor' ")->row_array();
            $filename= $test['file_'];
            echo $filename;
            $FilePath = './upload/'.$filename;
            if(!empty($filename) && file_exists($FilePath)){
          
            force_download($FilePath,null);
            
            }

        }
        
            
    }



    function index() {
        $this->db->select('*');
        $this->db->from('tbl_nota');
        $this->db->join('tbl_subbidang', 'tbl_subbidang.id_seksi=tbl_nota.id_seksi');
        $data['nota'] = $this->db->get()->result();
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        $this->load->view('admin/home', $data);
    }

    
   function upload_file(){
       $config['uplo    ad_path'] = './uploads/';
       $config['allowed_types'] = 'doc|docx';
       $this->load->library('upload',$config);
       $upload_data = $this->upload->data();
       
   }
    function add() {
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->add();
            redirect('admin/home');
        } else {
            $this->load->view('admin/permintaan/add', $data);
        }
    }

    function add_() {
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->add();
            redirect('admin/permintaan', $data);
        } else {
            $this->load->view('admin/permintaan/add', $data);
        }
    }

    function edit() {
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->edit();
            redirect('admin/home', $data);
            
        } else {
            $id = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->from('tbl_nota');
            $this->db->where('id_nota', $id);
            $this->db->join('tbl_subbidang', 'tbl_subbidang.id_seksi=tbl_nota.id_seksi');
            $data['nota'] = $this->db->get()->row_array();
            $this->load->view('admin/permintaan/edit_user', $data);
        }
    }
    function editmail() {
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->edit();
            redirect('admin/permintaan', $data);
        } else {
            $id = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->from('tbl_nota');
            $this->db->where('id_nota', $id) ;
            $this->db->join('tbl_subbidang', 'tbl_subbidang.id_seksi=tbl_nota.id_seksi');
            $data['nota'] = $this->db->get()->row_array();
            
            $this->load->view('admin/permintaan/edit_user', $data);
        }
    }
    function editreturn() {
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->editreturn();
            redirect('admin/permintaan', $data);
        } else {
            $id = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->from('tbl_nota');
            $this->db->where('id_nota', $id);
            $this->db->join('tbl_subbidang', 'tbl_subbidang.id_seksi=tbl_nota.id_seksi');
            $data['nota'] = $this->db->get()->row_array();
            $this->load->view('admin/permintaan/edit_user_return', $data);
        }
    }

    

    function lihat(){
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->lihat();
            redirect('admin/permintaan', $data);
        } else {
            $id = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->from('tbl_nota');
            $this->db->join('tbl_subbidang', 'tbl_subbidang.id_seksi=tbl_nota.id_seksi');
            $this->db->where('tbl_nota.id_nota', $id);
            $data['nota'] = $this->db->get()->row_array();

            

            $this->db->select('*');
            $this->db->from('tbl_transaksi');
            $this->db->join('tbl_nota', 'tbl_transaksi.id_nota=tbl_nota.id_nota');
            $this->db->where('tbl_transaksi.id_nota', $id);
            $data['histori'] = $this->db->get()->result();
            $this->load->view('admin/permintaan/lihat_user', $data);
        }
    }

    // function lihat_bidang{
        
    // }

    function profile(){
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        // $data['bidang'] = $this->Model_permintaan->get_bidang();
        $data['subbidang'] = $this->Model_permintaan->get_seksi();
        $data['bidang'] = $this->Model_permintaan->fetch_bidang();
        $this->load->view('admin/profil/profil_user', $data);
    }

    function fetch_seksi(){
        if($this->input->post('bidang_id')){
            echo $this->Model_permintaan->fetch_seksi($this->input->post('bidang_id'));
        }
    }

    function profile_up(){
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->update_profile();
            echo "Data berhasil disimpan";
            $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
            $data['hasil'] = $this->Model_permintaan->ambilnotif();
            $data['profil'] = $this->Model_permintaan->get_profile();
            $data['bidang'] = $this->Model_permintaan->fetch_bidang();
            redirect('admin/permintaan/profile', $data);
        } else {
            echo "Penyimpanan data gagal dilakukan";
            $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
            $data['hasil'] = $this->Model_permintaan->ambilnotif();
            $data['profil'] = $this->Model_permintaan->get_profile();
            $data['bidang'] = $this->Model_permintaan->fetch_bidang();
            $this->load->view('admin/profil/profil_user', $data);
        }
    }

    function profile_un(){
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['namabidang'] = $this->Model_permintaan->get_namabidang();
        $data['profil'] = $this->Model_permintaan->get_profile();
        $this->load->view('admin/profil/profil_user_un', $data);
    }

    function profile_up_un(){
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->update_profile_un();
            echo "Data berhasil disimpan";
            $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
            $data['hasil'] = $this->Model_permintaan->ambilnotif();
            $data['profil'] = $this->Model_permintaan->get_profile();
            redirect('admin/home', $data);
        } else {
            echo "Penyimpanan data gagal dilakukan";
            $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
            $data['hasil'] = $this->Model_permintaan->ambilnotif();
            $data['profil'] = $this->Model_permintaan->get_profile();
            $this->load->view('admin/home', $data);
        }
    }

    function ubah_pass(){
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->check_password();
            echo "Data berhasil disimpan";
            $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
            $data['hasil'] = $this->Model_permintaan->ambilnotif();
            $data['namabid'] = $this->Model_permintaan->get_namabid();
            $data['profil'] = $this->Model_permintaan->get_profile();
            redirect('admin/permintaan/profile', $data);
        } else {
            echo "Penyimpanan data gagal dilakukan";
            $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
            $data['hasil'] = $this->Model_permintaan->ambilnotif();
            $data['namabid'] = $this->Model_permintaan->get_namabid();
            $data['profil'] = $this->Model_permintaan->get_profile();
            $this->load->view('admin/profil/profil_user', $data);
        }
    }

    
    
}

?>