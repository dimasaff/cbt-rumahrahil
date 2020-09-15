<?php

class soal_sbm_api extends CI_Model
{
    public function getSoalsbm($soal = null)
    {
        if ($soal === null) {
            return $this->db->get('tb_soal_sbmptn')->result_array();
        } else {
            return $this->db->get_where('tb_soal_sbmptn', ['id_soal_sbmptn' => $soal])->result_array();
        }
    }

    public function deleteSoalsbm($soal)
    {
        $this->db->delete('tb_soal_sbmptn', ['id_soal_sbmptn' => $soal]);
        return $this->db->affected_rows();
    }
    public function createSoalsbm($data)
    {
        $this->db->insert('tb_soal_sbmptn', $data);
        return $this->db->affected_rows();
    }
    public  function updateSoalsbm($data, $soal)
    {
        $this->db->update('tb_soal_sbmptn', $data, ['id_soal_sbmptn' => $soal]);
        return $this->db->affected_rows();
    }
}
