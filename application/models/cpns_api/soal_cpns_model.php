<?php

class soal_cpns_model extends CI_Model
{
    public function getSoalcpns($soal = null)
    {
        if ($soal === null) {
            return $this->db->get('tb_soal_cpns')->result_array();
        } else {
            return $this->db->get_where('tb_soal_cpns', ['id_soal_cpns' => $soal])->result_array();
        }
    }

    public function deleteSoalcpns($soal)
    {
        $this->db->delete('tb_soal_cpns', ['id_soal_cpns' => $soal]);
        return $this->db->affected_rows();
    }
    public function createSoalcpns($data)
    {
        $this->db->insert('tb_soal_cpns', $data);
        return $this->db->affected_rows();
    }
    public  function updateSoalcpns($data, $soal)
    {
        $this->db->update('tb_soal_cpns', $data, ['id_soal_cpns' => $soal]);
        return $this->db->affected_rows();
    }
}
