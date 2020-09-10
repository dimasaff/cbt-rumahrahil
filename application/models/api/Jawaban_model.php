<?php

class Jawaban_model extends CI_Model
{
    public function getJawaban($Jawaban = null)
    {
        if ($Jawaban === null) {
            return $this->db->get('tb_jawaban')->result_array();
        } else {
            return $this->db->get_where('tb_jawaban', ['id_jawaban' => $Jawaban])->result_array();
        }
    }

    public function deleteJawaban($Jawaban)
    {
        $this->db->delete('tb_jawaban', ['id_jawaban' => $Jawaban]);
        return $this->db->affected_rows();
    }
    public function createJawaban($data)
    {
        $this->db->insert('tb_jawaban', $data);
        return $this->db->affected_rows();
    }
    public  function updateJawaban($data, $Jawaban)
    {
        $this->db->update('tb_jawaban', $data, ['id_jawaban' => $Jawaban]);
        return $this->db->affected_rows();
    }
}
