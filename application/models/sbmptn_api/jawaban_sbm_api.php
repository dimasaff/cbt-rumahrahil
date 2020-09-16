<?php

class jawaban_sbm_api extends CI_Model
{
    public function getJawaban($jawaban = null)
    {
        if ($jawaban === null) {
            return $this->db->get('tb_jawaban_sbmptn')->result_array();
        } else {
            return $this->db->get_where('tb_jawaban_sbmptn', ['id_jawaban_sbmptn' => $jawaban])->result_array();
        }
    }

    public function deleteJawaban($jawaban)
    {
        $this->db->delete('tb_jawaban_sbmptn', ['id_jawaban_sbmptn' => $jawaban]);
        return $this->db->affected_rows();
    }
    public function createJawaban($data)
    {
        $this->db->insert('tb_jawaban_sbmptn', $data);
        return $this->db->affected_rows();
    }
    public  function updateJawaban($data, $jawaban)
    {
        $this->db->update('tb_jawaban_sbmptn', $data, ['id_jawaban_sbmptn' => $jawaban]);
        return $this->db->affected_rows();
    }
}
