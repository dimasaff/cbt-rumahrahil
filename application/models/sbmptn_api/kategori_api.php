<?php

class kategori_api extends CI_Model
{
    public function getKategori($kategori = null)
    {
        if ($kategori === null) {
            return $this->db->get('tb_kategori_sbmptn')->result_array();
        } else {
            return $this->db->get_where('tb_kategori_sbmptn', ['id_kategori_sbmptn' => $kategori])->result_array();
        }
    }

    
}
