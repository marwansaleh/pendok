<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_master_perihal
 *
 * @author marwansaleh
 */
class Migration_add_master_perihal extends MY_Migration {
    protected $_table_name = 'mtr_perihal_bidang';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('nama');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'kategori' => array(
            'type' => 'ENUM("marketing","tehnik","klaim","keuangan","umum")',
            'default' => 'marketing'
        ),
        'perihal' => array(
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
                'kategori'      => 'marketing',
                'perihal'       => 'Marketing I',
                'sandi'         => 21
            ),
            array(
                'kategori'      => 'marketing',
                'perihal'       => 'Marketing II',
                'sandi'         => 22
            ),
            array(
                'kategori'      => 'marketing',
                'perihal'       => 'Marketing III',
                'sandi'         => 23
            ),
            array(
                'kategori'      => 'marketing',
                'perihal'       => 'Marketing IV',
                'sandi'         => 24
            ),
            array(
                'kategori'      => 'tehnik',
                'perihal'       => 'Tehnik Penawaran',
                'sandi'         => 31
            ),
            array(
                'kategori'      => 'tehnik',
                'perihal'       => 'Tehnik Penempatan',
                'sandi'         => 32
            ),
            array(
                'kategori'      => 'klaim',
                'perihal'       => 'Klaim Konsorsium',
                'sandi'         => 41
            ),
            array(
                'kategori'      => 'klaim',
                'perihal'       => 'Klaim Non Konsorsium',
                'sandi'         => 42
            ),
            array(
                'kategori'      => 'keuangan',
                'perihal'       => 'Keuangan Bank',
                'sandi'         => 51
            ),
            array(
                'kategori'      => 'keuangan',
                'perihal'       => 'Keuangan Asuradur',
                'sandi'         => 52
            ),
            array(
                'kategori'      => 'keuangan',
                'perihal'       => 'Keuangan Pajak',
                'sandi'         => 53
            ),
            array(
                'kategori'      => 'keuangan',
                'perihal'       => 'Keuangan Akuntansi',
                'sandi'         => 54
            ),
            array(
                'kategori'      => 'umum',
                'perihal'       => 'Umum Logistik',
                'sandi'         => 61
            ),
            array(
                'kategori'      => 'umum',
                'perihal'       => 'Umum Hukum',
                'sandi'         => 62
            ),
            array(
                'kategori'      => 'umum',
                'perihal'       => 'Umum SDM',
                'sandi'         => 63
            ),
        ));
    }
}

/*
 * filename : 002_add_master_perihal.php
 * location : /application/migrations/002_add_master_perihal.php
 */
