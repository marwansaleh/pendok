<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Generator_nomor
 *
 * @author marwansaleh 1:31:58 PM
 */
class Generator_nomor extends REST_Api {
    
    function __construct($config = 'rest') {
        parent::__construct($config);
        
        $this->load->model(array('mtr_bidang_m','rel_register_m'));
        
        //$this->load->library('Generator');
    }
    
    public function index_post(){
        $bidang_pengirim = $this->post('bidang_pengirim');
        $tipe_tujuan = $this->post('tipe_tujuan');
        $nama_penerima = $this->post('nama_penerima');
        $sandi_perihal = $this->post('sandi_perihal');
        $perihal = $this->post('perihal');
        $sifat_surat = $this->post('sifat_surat');
        $persetujuan_direksi = $this->post('persetujuan_direksi');
        
        $options = array(
            'bidang_pengirim' => $bidang_pengirim,
            'tipe_tujuan' => $tipe_tujuan,
            'nama_penerima' => $nama_penerima,
            'perihal' => $perihal,
            'persetujuan_direksi' => $persetujuan_direksi,
            'sifat_surat' => $sifat_surat,
            'bulan'  => date('m'),
            'tahun' => date('y'),
            'sandi_perihal' => $sandi_perihal
        );
        $generator = new GeneratorNomor();
        $nomor_surat = $generator->generate($options);
        //save into new register
        $options['nomor_surat'] = $nomor_surat;
        $this->rel_register_m->save($options);
        
        $this->response($options);
    }
}

/**
 * Filename : generator.php
 * Location : application/controllers/service/Generator_nomor.php
 */
