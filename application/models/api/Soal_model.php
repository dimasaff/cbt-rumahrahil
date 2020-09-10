<?php

class Soal_model extends CI_Model
{
    public function getSoal($Soal = null)
    {
        if ($Soal === null) {
            return $this->db->get('tb_soal')->result_array();
        } else {
            return $this->db->get_where('tb_soal', ['id_soal' => $Soal])->result_array();
        }
    }

    public function deleteSoal($Soal)
    {
        $this->db->delete('tb_soal', ['id_soal' => $Soal]);
        return $this->db->affected_rows();
    }
    public function createSoal($data)
    {
        $this->db->insert('tb_soal', $data);
        return $this->db->affected_rows();
    }
    public  function updateSoal($data, $Soal)
    {
        $this->db->update('tb_soal', $data, ['id_soal' => $Soal]);
        return $this->db->affected_rows();
    }
}
