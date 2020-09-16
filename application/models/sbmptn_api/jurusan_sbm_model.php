<?php

class jurusan_sbm_model extends CI_Model
{
    public function getJurusansbm($jurusan = null)
    {
        if ($jurusan === null) {
            return $this->db->get('tb_jurusan_sbmptn')->result_array();
        } else {
            return $this->db->get_where('tb_jurusan_sbmptn', ['id_jurusan_sbmptn' => $jurusan])->result_array();
        }
    }

    
}
