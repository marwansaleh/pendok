<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_bidang
 *
 * @author marwansaleh
 */
class Migration_add_master_bidang extends MY_Migration {
    protected $_table_name = 'mtr_bidang';
    protected $_primary_key = 'id';
    protected $_index_keys = array('nama');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'nama' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'null' => FALSE
        ),
        'sandi' => array(
            'type' => 'INT',
            'constraint' => 3,
        )
    );
    
    public function up(){
        parent::up();
        //Need seeding ?
        $this->_seed(array(
            array(
                'id'            => 1,
                'nama'          => 'Direksi',
                'sandi'         => 10
            ),
            array(
                'id'            => 2,
                'nama'          => 'Marketing',
                'sandi'         => 20
            ),
            array(
                'id'            => 3,
                'nama'          => 'Tehnik',
                'sandi'         => 30
            ),
            array(
                'id'            => 4,
                'nama'          => 'Klaim',
                'sandi'         => 40
            ),
            array(
                'id'            => 5,
                'nama'          => 'Keuangan',
                'sandi'         => 50
            ),
            array(
                'id'            => 6,
                'nama'          => 'Umum',
                'sandi'         => 60
            ),
            array(
                'id'            => 7,
                'nama'          => 'Electronic Data Processing',
                'sandi'         => 70
            ),
            array(
                'id'            => 8,
                'nama'          => 'Satuan Pengawas Intern',
                'sandi'         => 80
            ),
            array(
                'id'            => 9,
                'nama'          => 'Kantor Cabang',
                'sandi'         => 90
            )
        ));
    }
}

/*
 * filename : 001_add_master_bidang.php
 * location : /application/migrations/001_add_master_bidang.php
 */
