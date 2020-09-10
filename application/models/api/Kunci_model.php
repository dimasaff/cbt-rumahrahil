<?php

class Kunci_model extends CI_Model
{
    public function getKunci($kunci = null)
    {
        if ($kunci === null) {
            return $this->db->get('tb_kunci_jawaban')->result_array();
        } else {
            return $this->db->get_where('tb_kunci_jawaban', ['id_kunci_jawaban' => $kunci])->result_array();
        }
    }
}
