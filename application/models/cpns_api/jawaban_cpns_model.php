<?php

class jawaban_cpns_model extends CI_Model
{
    public function getJawabancpns($jawaban = null)
    {
        if ($jawaban === null) {
            return $this->db->get('tb_jawaban_cpns')->result_array();
        } else {
            return $this->db->get_where('tb_jawaban_cpns', ['id_jawaban_cpns' => $jawaban])->result_array();
        }
    }

    public function deleteJawabancpns($jawaban)
    {
        $this->db->delete('tb_jawaban_cpns', ['id_jawaban_cpns' => $jawaban]);
        return $this->db->affected_rows();
    }
    public function createJawabancpns($data)
    {
        $this->db->insert('tb_jawaban_cpns', $data);
        return $this->db->affected_rows();
    }
    public  function updateJawabancpns($data, $jawaban)
    {
        $this->db->update('tb_jawaban_cpns', $data, ['id_jawaban_cpns' => $jawaban]);
        return $this->db->affected_rows();
    }
}
