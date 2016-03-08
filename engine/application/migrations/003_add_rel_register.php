<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_register
 *
 * @author marwansaleh
 */
class Migration_add_rel_register extends MY_Migration {
    protected $_table_name = 'rel_register';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('nama');
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'bulan' => array(
            'type' => 'INT',
            'constraint' => 2,
        ),
        'tahun' => array(
            'type' => 'INT',
            'constraint' => 2,
        ),
        'tipe_tujuan' => array(
            'type' => 'ENUM("internal","eksternal")',
            'default' => 'internal'
        ),
        'nama_penerima' => array(
            'type' => 'VARCHAR',
            'constraint' => 50,
            'null' => FALSE
        ),
        'sandi_perihal' => array(
            'type' => 'INT',
            'constraint' => 11,
        ),
        'perihal' => array(
            'type' => 'TEXT'
        ),
        'bidang_pengirim' => array(
            'type' => 'INT',
            'constraint' => 11
        ),
        'persetujuan_direksi' => array(
            'type' => 'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'sifat_surat' => array(
            'type' => 'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'nomor_surat' => array(
            'type' => 'VARCHAR',
            'constraint' => 25,
            'null' => FALSE
        ),
        'created' => array(
            'type' => 'INT',
            'unsigned' =>  TRUE,
            'constraint' => 11,
            'default' => 0
        ),
    );
    
}

/*
 * filename : 003_add_rel_register.php
 * location : /application/migrations/003_add_rel_register.php
 */
