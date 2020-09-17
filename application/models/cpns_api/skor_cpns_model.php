<?php

class skor_cpns_model extends CI_Model
{
    public function getSkorcpns($skor = null)
    {
        if ($skor === null) {
            return $this->db->get('tb_skor_cpns')->result_array();
        } else {
            return $this->db->get_where('tb_skor_cpns', ['id_skor_cpns' => $skor])->result_array();
        }
    }

    public function deleteSkorcpns($skor)
    {
        $this->db->delete('tb_skor_cpns', ['id_skor_cpns' => $skor]);
        return $this->db->affected_rows();
    }
    public function createSkorcpns($data)
    {
        $this->db->insert('tb_skor_cpns', $data);
        return $this->db->affected_rows();
    }
    public  function updateSkorcpns($data, $skor)
    {
        $this->db->update('tb_skor_cpns', $data, ['id_skor_cpns' => $kunci]);
        return $this->db->affected_rows();
    }
}
