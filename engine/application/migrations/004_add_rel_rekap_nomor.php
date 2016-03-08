<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_rel_rekap_nomor
 *
 * @author marwansaleh
 */
class Migration_add_rel_rekap_nomor extends MY_Migration {
    protected $_table_name = 'rel_rekap_nomor';
    protected $_primary_key = 'id';
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'tahun' => array(
            'type' => 'INT',
            'constraint' => 2,
        ),
        'nomor_urut' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0
        )
    );
    
}

/*
 * filename : 004_add_rel_rekap_nomor.php
 * location : /application/migrations/004_add_rel_rekap_nomor.php
 */
