<?php

Class Historia extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_permintaan');
    }

    function index() {
        //$username = $this->session->userdata('username');
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->join('tbl_nota', 'tbl_transaksi.id_nota=tbl_nota.id_nota');
        //$this->db->where('tbl_transaksi.username',$username);
        $data['histori'] = $this->db->get()->result();
        $this->load->view('admin/histori/histori', $data);
    }

    function lihat_histori() {
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        if (isset($_POST['submit'])) {
            $this->Model_permintaan->lihat();
            redirect('admin/historia', $data);
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
            $this->db->where('tbl_nota.id_nota', $id);
            $data['histori'] = $this->db->get()->result();
            $this->load->view('admin/histori/histori_detail', $data);
        }
    }

}

?>
