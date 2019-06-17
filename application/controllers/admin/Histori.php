<?php

Class Histori extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_permintaan');
    }

    function index() {
        $data['jumlah'] = $this->Model_permintaan->getjumlahnotif();
        $data['hasil'] = $this->Model_permintaan->ambilnotif();
        $data['profil'] = $this->Model_permintaan->get_profile();
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->join('tbl_nota', 'tbl_transaksi.id_nota=tbl_nota.id_nota');
        $this->db->where('tbl_transaksi.username="admin"');
        $data['histori'] = $this->db->get()->result();
        $this->load->view('admin/histori/histori', $data);
    }

}
?>
