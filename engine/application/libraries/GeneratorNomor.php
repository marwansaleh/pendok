<?php

/**
 * Description of GeneratorNomorSurat
 *
 * @author marwansaleh 12:56:14 PM
 */
class GeneratorNomor {
    protected $ci;
    private $_ID_DIR = 1;
    private $_SEPARATOR = '.';
    
    private $_format= array(
        'direksi' => '%03d',
        'bidang' => '%03d',
        'sandi_perihal' => '%03d',
        'tahun' => '%02d',
        'bulan' => '%02d',
        'nomor_urut' => '%04d',
        'tipe_tujuan_int' => '88',
        'rahasia' => '0',
        'sangat_rahasia' => '00'
    );
    
    function __construct() {
        $this->ci =& get_instance();
    }
    
    public function generate($options){
        //get sandi from pengirim
        $this->ci->load->model(array('mtr_bidang_m','mtr_perihal_m'));
        $pengirim = $this->ci->mtr_bidang_m->get($options['bidang_pengirim']);
        $perihal = $this->ci->mtr_perihal_m->get($options['sandi_perihal']);
        
        $result = array();
        
        if ($options['persetujuan_direksi']){
            $direksi = $this->ci->mtr_bidang_m->get($this->_ID_DIR);
            $result [] = sprintf($this->_format['direksi'], $direksi->sandi);
            $result [] = sprintf($this->_format['sandi_perihal'], $perihal->sandi);
        }else {
            $result [] = sprintf($this->_format['bidang'], $pengirim->sandi);
        }
        
        $result [] = sprintf($this->_format['tahun'], $options['tahun']);
        $result [] = sprintf($this->_format['bulan'], $options['bulan']); 
        $result [] = sprintf($this->_format['nomor_urut'], $this->_execute_number($options['bulan'], $options['tahun']));
        
        if ($options['tipe_tujuan'] == 'internal'){
            $result [] = $this->_format['tipe_tujuan_int'];
        }
        if ($options['sifat_surat']!=0){
            $result [] =  ($options['sifat_surat']==1?$this->_format['rahasia']:$this->_format['sangat_rahasia']);
        }
        
        return implode($this->_SEPARATOR, $result);
    }
    
    private function _execute_number($bulan, $tahun){
        //get last number for this month and year
        if (!isset($this->ci->rel_rekap_m)){
            $this->ci->load->model('rel_rekap_m');
        }
        $rekap = $this->ci->rel_rekap_m->get_by(array('bulan'=>$bulan, 'tahun'=>$tahun), TRUE);
        if ($rekap){
            $nomor_urut = $rekap->nomor_urut + 1;
            $this->ci->rel_rekap_m->save(array('nomor_urut'=>$nomor_urut), $rekap->id);
        }else{
            $nomor_urut = 1;
            $this->ci->rel_rekap_m->save(array('bulan'=>$bulan,'tahun'=>$tahun,'nomor_urut'=>$nomor_urut));
        }
        return $nomor_urut;
    }
}

/**
 * Filename : GeneratorNomorSurat.php
 * Location : /GeneratorNomorSurat.php
 */
