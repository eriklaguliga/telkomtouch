<?php
   Class Model_permintaan extends Ci_Model {
       var $username1 = "";
       var $ambil = "";
    
       function __construct() {
        parent::__construct();
        $this->load->Model('Model_permintaan');
      }
      
       function add() {

        $config['upload_path']  ='./upload/';
        $config['allowed_types']  ='doc|docx|pdf|gif|jpg|png';
        $config['max_size'] =0;
        $this->load->library('upload',$config);

        if( ! $this->upload->do_upload('filename')){
          $error = array('error'=> $this->upload->display_errors());
          // $data['jumlah'] = $this->getjumlahnotif();
          // $data['hasil'] = $this->ambilnotif();
          // $data['profil'] = $this->get_profile();
          // $this->load->view('admin/permintaan/add',$data);
        }else{
          $upload_data = $this->upload->data();
           $data = array(
               'nomor' => $this->input->post('nomor'),
               'disposisi' => $this->input->post('disposisi'),
               'id_seksi' => $this->input->post('id_seksi'),
               'isi_nota' => $this->input->post('isi_nota'),
               'deskripsi' => $this->input->post('deskripsi'),
               'nama_usecase' => $this->input->post('use_case'),
               'stakeholder' => $this->input->post('stakeholder'),
               'file_' =>   $upload_data['file_name'],
               'id_bidang' =>$this->input->post('id_bidang'),
               'last_edit' => $this->session->userdata('username'),
               'tobeuser'=> $this->input->post('namauser'),
               'user' =>  $this->session->userdata('username')
               
                   //     'file' => $uploads
           );
           $this->db->insert('tbl_nota', $data);
           
           $id_nota = $this->input->post('id_nota');
           $ambil =  $this->Model_permintaan->addapruval($id_nota);
   
           $data1 = array(
               'id_nota' => $ambil,
               'level' => '1',
               'username' => 'user',
           );
           $data2 = array(
               'id_nota' => $ambil,
               'level' => '2',
               'username' =>  'dataowner',
           );
           $data3 = array(
               'id_nota' => $ambil,
               'level' => '3',
               'username' => 'dgcouncil',
           );
           $data4 = array(
               'id_nota' => $ambil,
               'level' => '4',
               'username' => 'admin',
                   //     'file' => $uploads
           );
              $data5 = array(
                  'id_nota' => $ambil,
                  'level' => '5',
                  'username' =>  'FINISH',
                      //     'file' => $uploads
              );
              $this->db->insert('apruval',$data1);
              $this->db->insert('apruval',$data2);
              $this->db->insert('apruval',$data3);
              $this->db->insert('apruval',$data4);
              $this->db->insert('apruval',$data5);
      
              $data6 = array(
                  'id_nota' => $ambil,
                  'username' => $this->session->userdata('username'),
              );
              $this->db->insert('tbl_transaksi',$data6);

            $hasil = $this->db->query("SELECT level FROM apruval WHERE id_nota = '$id_nota' and username = '$username' ")->row_array();
            $l = $hasil['level']+1;
            $hasil2 = $this->db->query("SELECT username FROM apruval WHERE id_nota = '$id_nota' and level = '$l' ")->row_array();
       
            $username1 = $hasil2['username'];       
            $data = array(
               'tobeuser' => $namauser1
            );
            return $hasil2['username'];
          }
   
       }

       

       function cekseksi($nama_subbidang){
         $hasil = $this->db->query("SELECT id_seksi FROM tbl_subbidang WHERE nama_subbidang like '%$nama_subbidang%' limit 1")->row_array();
         $seksi = $hasil['id_seksi'];
         
         return $seksi;
       }
        function addapruval($id_nota){
           
           $hasil = $this->db->query("SELECT id_nota FROM tbl_nota ORDER BY id_nota DESC LIMIT 1 ")->row_array();
           $n = $hasil['id_nota'];
   
           return $hasil['id_nota'];
        }
   
       function getapruval($id_nota, $username, $status){
           // $hasil3 = "Hello";

            switch ($status) {
                
                case "Return":
                $hasil = $this->db->query("SELECT level FROM apruval WHERE id_nota = '$id_nota' and username = '$username' ")->row_array();
                $l = $hasil['level']-1;
                $hasil2 = $this->db->query("SELECT username FROM apruval WHERE id_nota = '$id_nota' and level = '$l' ")->row_array();
       
                $username1 = $hasil2['username'];       
                $data = array(
                   'namauser' => $hasil2['username'],
                   'level' => $l
                );
                return $hasil2['username'];
                break;
                
                case "Approved":
                $hasil = $this->db->query("SELECT level FROM apruval WHERE id_nota = '$id_nota' and username = '$username' ")->row_array();
                $l = $hasil['level']+1;
                $hasil2 = $this->db->query("SELECT username FROM apruval WHERE id_nota = '$id_nota' and level = '$l' ")->row_array();
       
                $username1 = $hasil2['username'];       
                $data = array(
                   'namauser' => $hasil2['username'],
                   'level' => $l
                );
                return $hasil2['username'];
                break;

                case "Rejected":
       
                $hasil = $this->db->query("SELECT level FROM apruval WHERE id_nota = '$id_nota' and username = '$username' ")->row_array();
                $l = $hasil['level']=0;
                $hasil2 = $this->db->query("SELECT username FROM apruval WHERE id_nota = '$id_nota' and level = '$l' ")->row_array();
       
                $username1 = $hasil2['username'];       
                $data = array(
                   'namauser' => $hasil2['username'],
                   'level' => $l
                );
                return "FINISH";
                break;
                default:
                
                $hasil = $this->db->query("SELECT level FROM apruval WHERE id_nota = '$id_nota' and username = '$username' ")->row_array();
                $l = $hasil['level']=0;
                $hasil2 = $this->db->query("SELECT username FROM apruval WHERE id_nota = '$id_nota' and level = '$l' ")->row_array();
           
                   $username1 = $hasil2['username'];       
                   $data = array(
                       'namauser' => $hasil2['username'],
                       'level' => $l
                );
                return $hasil2['username'];
            }
           
        }
   
        function getprevioususer($id_nota, $username){
          $hasil = $this->db->query("SELECT level FROM apruval WHERE id_nota = '$id_nota' and username = '$username' ")->row_array();
          $l = $hasil['level']-1;
          $hasil2 = $this->db->query("SELECT username FROM apruval WHERE id_nota = '$id_nota' and level = '$l' ")->row_array();
          $namauser = $hasil2['username'];
          $hasil3 = $this->db->query("SELECT tgl FROM tbl_transaksi WHERE id_nota = '$id_nota' and username = '$namauser' ")->row_array();
          $t = $hasil3['tgl'];

          $selisih = $this->db->query("SELECT timediff(now(), '$t') as tgl")->row_array();
          $s = $selisih['tgl'];

          return $s;

        }

       function edit() {
           $id_nota = $this->input->post('id_nota');
           $username = $this->input->post('namauser');
           $namauser1 =  $this->Model_permintaan->getapruval($id_nota, $username, $this->input->post('status'));
   
   
           $data = array(
               'nomor' => $this->input->post('nomor'),
               'disposisi' => $this->input->post('status'),
              //  'id_seksi' => $this->input->post('id_seksi'),
               'isi_nota' => $this->input->post('isi_nota'),
               'status'=>1,
               'last_edit' => $this->input->post('namauser'),
               'tobeuser' => $namauser1
           );
           
           $this->db->where('id_nota', $id_nota);
           $this->db->update('tbl_nota', $data);
   
           $ambil =  $this->Model_permintaan->addapruval($id_nota);
           $s =  $this->Model_permintaan->getprevioususer($id_nota, $username);
           $data5 = array(
               'id_nota' => $ambil,
               'username' => $this->session->userdata('username'),
               'aksi' => $this->input->post('status'),
               'durasi' => $s,
               'catatan' => $this->input->post('isi_catatan'),
           );
           $this->db->insert('tbl_transaksi',$data5);
       }

       function editreturn() {
           $id_nota = $this->input->post('id_nota');
           $username = $this->input->post('namauser');
           $namauser1 =  $this->Model_permintaan->getapruval($id_nota, $username, $this->input->post('status'));
   
   
           $data = array(
               'nomor' => $this->input->post('nomor'),
               'disposisi' => $this->input->post('status'),
               'id_seksi' => $this->input->post('id_seksi'),
               'isi_nota' => $this->input->post('isi_nota'),
               'status'=>1,
               'last_edit' => $this->input->post('namauser'),
               'tobeuser' => $namauser1
           );
           
           $this->db->where('id_nota', $id_nota);
           $this->db->update('tbl_nota', $data);
   
           $ambil =  $this->Model_permintaan->addapruval($id_nota);
           $data5 = array(
               'id_nota' => $ambil,
               'username' => $this->session->userdata('username'),
               'aksi' => $this->input->post('status'),
               'catatan' => $this->input->post('isi_catatan'),
           );
           $this->db->insert('tbl_transaksi',$data5);
       }
   
       

       function ambilnotif(){
        $query_str = "SELECT * FROM `tbl_nota` where `tobeuser` = '".$this->session->userdata('username')."'";
        $hasil = $this->db->query($query_str)->result_array();
        return $hasil;
       }

       function getjumlahnotif(){
        $hasil =  $this->db->query("SELECT * FROM `tbl_nota` where `tobeuser` = '".$this->session->userdata('username')."'")->num_rows();
        return $hasil;
       }

       function get_namabid(){
        $hasil = $this->db->query("SELECT id_bidang FROM tbl_login WHERE username = '".$this->session->userdata('username')."' ")->row_array();
        $b = $hasil['id_bidang'];

        $hasil2 = $this->db->query("SELECT nama_bidang FROM tbl_bidang WHERE id_bidang = '$b' ")->row_array();
        $namabid = $hasil2['nama_bidang'];
        return $namabid;
       }

       function get_profile(){
        $profil = $this->db->query("SELECT * FROM `tbl_login` WHERE `username` = '".$this->session->userdata('username')."' ")->row_array();
        return $profil;
       }
       
       function get_seksi(){
        $seksi = $this->db->query("SELECT * FROM `tbl_subbidang` WHERE `id_bidang` = '".$this->session->userdata('id_bidang')."' ")->result_array();
        return $seksi;
       }

      function check_password(){
        if (isset($_POST['submit'])) {
          $username = $this->session->userdata('username');
          $password = md5($this->input->post('password'));
          $passwordbaru = md5($this->input->post('npassword'));
          $konfirmasipasswordbaru = md5($this->input->post('cpassword'));

          $cek = $this->db->query("SELECT username FROM tbl_login WHERE username = '$username' and password = '$password' ")->row_array();
          if ($cek > 0){
            if(strlen($passwordbaru) >= 5){
              if($passwordbaru == $konfirmasipasswordbaru){
                $passwordbaru  = $passwordbaru;
                $username = $this->session->userdata('username');

                $update = $this->db->query("UPDATE tbl_login SET password='$passwordbaru' WHERE username='$username'");
                if($update){
                  //kondisi jika proses query UPDATE berhasil
                  echo "Password berhasil di rubah";
                }else{
                  //kondisi jika proses query gagal
                  echo "Gagal merubah password";
                }       
              } else {
                echo "Konfirmasi password tidak cocok";
              }
            } else {
              echo "Minimal password baru adalah 5 karakter";
            }
          } else {
            echo "Password lama tidak cocok";
          }   
        }
      }

      function update_password($username = "") {
        $username = $this->input->post('username') != "" ? $this->input->post('username') : $username;

        $this->db->where('username',$username);
        $data['password']=$this->encrypt->sha1($this->input->post('npassword').$this->config->item('encryption_key'));
        return $this->db->update('tbl_login', $data);
      }

      function update_profile() {
        $username = $this->session->userdata('username');
        $nama_bidang = $this->get_nama_bidang_id($this->input->post('bidang'));
        $nama_seksi = $this->get_nama_seksi_id($this->input->post('seksi'));
    
           $data = array(
               'nama' => $this->input->post('nama'),
               'email' => $this->input->post('email'),
               'phone_number' => $this->input->post('phone_number'),
               'nama_bidang' => $nama_bidang,
               'nama_seksi' =>$nama_seksi,
               'id_bidang' => $this->input->post('bidang'),
               'id_seksi' => $this->input->post('seksi')
           );
           $this->db->where('username', $username);
           $this->db->update('tbl_login', $data);
      }

      function fetch_bidang(){
        $this->db->order_by('nama_bidang','ASC');
        $query = $this->db->get('tbl_bidang');
        return $query->result();
      }

      function fetch_seksi($bidang_id)
      {
       $this->db->where('id_bidang', $bidang_id);
       $this->db->order_by('nama_subbidang', 'ASC');
       $query = $this->db->get('tbl_subbidang');
       $output = '<option value="">Select Sub Bidang </option>';
       foreach($query->result() as $row)
       {
        $output .= '<option value="'.$row->id_seksi.'">'.$row->nama_subbidang.'</option>';
       }
       return $output;
      }

      function update_profile_un() {
        $username = $this->session->userdata('username');
        $nama_bidang = $this->get_nama_bidang_id($this->input->post('bidang'));
        $nama_subbidang = $this->get_nama_seksi_id($this->input->post('seksi'));
           $data = array(
               'nama' => $this->input->post('nama'),
               'email' => $this->input->post('email'),
               'phone_number' => $this->input->post('phone_number'),
               'nama_bidang' => $nama_bidang,
               'nama_subbidang' =>$nama_subbidang,
               'id_bidang' => $this->input->post('bidang'),
               'id_seksi' => $this->input->post('seksi')
           );
           $this->db->where('username', $username);
           $this->db->update('tbl_login', $data);
      }

      function get_namabidang(){
        $this->db->order_by('nama_bidang','ASC');
        $namabidang = $this->db->get("tbl_bidang");

        return $namabidang->result_array();
      }
      function get_id_bidang($nama_bidang){
        $query = $this->db->query("SELECT id_bidang FROM tbl_bidang WHERE nama_bidang = '$nama_bidang' LIMIT 1")->row_array();
        $hasil = $query['id_bidang'];
        return $hasil;
      }

      function get_id_seksi($nama_subbidang){
        $query = $this->db->query("SELECT id_seksi FROM tbl_subbidang WHERE nama_subbidang = '$nama_subbidang' LIMIT 1")->row_array();
        $hasil = $query['id_seksi'];
        return $hasil;
      }

      

      function get_nama_bidang_id($id_bidang){
        $query = $this->db->query("SELECT nama_bidang FROM tbl_bidang WHERE id_bidang = '$id_bidang' LIMIT 1")->row_array();
        $hasil = $query['nama_bidang'];
        return $hasil;
      }

      function get_nama_seksi_id($id_seksi){
        $query = $this->db->query("SELECT nama_subbidang FROM tbl_subbidang WHERE id_seksi = '$id_seksi' LIMIT 1")->row_array();
        $hasil = $query['nama_subbidang'];
        return $hasil;
      }

      
      public function last_record(){
            $last_row = $this->db->order_by('id_bidang',"DESC")
            ->limit(1)
            ->get('tbl_bidang')
            ->row();
            $bidang = $last_row->id_bidang;
            return $bidang;
      }

      public function last_record_seksi(){
            $last_row = $this->db->order_by('id_seksi',"DESC")
            ->limit(1)
            ->get('tbl_subbidang')
            ->row();
            $seksi = $last_row->id_seksi;
            return $seksi;
      }

      public function cek_bidang($bidang){
        $this->db->where("nama_bidang",$bidang);
        return $this->db->get("tbl_bidang");

      }

      public function cek_seksi($seksi){
        $this->db->where("nama_subbidang",$seksi);
        return $this->db->get("tbl_subbidang");

      }

   
   }
   
   ?>

