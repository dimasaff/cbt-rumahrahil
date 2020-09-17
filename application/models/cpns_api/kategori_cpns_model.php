<?php

class kategori_cpns_model extends CI_Model
{
    public function getKategoricpns($kategori = null)
    {
        if ($kategori === null) {
            return $this->db->get('tb_kategori_cpns')->result_array();
        } else {
            return $this->db->get_where('tb_kategori_cpns', ['id_kategori_cpns' => $kategori])->result_array();
        }
    }

    
}
