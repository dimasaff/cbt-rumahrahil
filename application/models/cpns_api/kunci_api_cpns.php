<?php

class kunci_api_cpns extends CI_Model
{
    public function getKuncicpns($kunci = null)
    {
        if ($kunci === null) {
            return $this->db->get('tb_kunci_cpns')->result_array();
        } else {
            return $this->db->get_where('tb_kunci_cpns', ['id_kunci_cpns' => $kunci])->result_array();
        }
    }

    public function deleteKuncicpns($kunci)
    {
        $this->db->delete('tb_kunci_cpns', ['id_kunci_cpns' => $kunci]);
        return $this->db->affected_rows();
    }
    public function createKuncicpns($data)
    {
        $this->db->insert('tb_kunci_cpns', $data);
        return $this->db->affected_rows();
    }
    public  function updateKuncicpns($data, $kunci)
    {
        $this->db->update('tb_kunci_cpns', $data, ['id_kunci_cpns' => $kunci]);
        return $this->db->affected_rows();
    }
}
