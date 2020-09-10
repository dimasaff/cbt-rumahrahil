<?php

class Tingkat_model extends CI_Model
{
    public function getTingkat($tingkat = null)
    {
        if ($tingkat === null) {
            return $this->db->get('tb_tingkat')->result_array();
        } else {
            return $this->db->get_where('tb_tingkat', ['id_tingkat' => $tingkat])->result_array();
        }
    }
}
