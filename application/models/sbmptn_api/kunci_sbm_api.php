<?php

class kunci_sbm_api extends CI_Model
{
    public function getKuncisbm($kunci = null)
    {
        if ($kunci === null) {
            return $this->db->get('tb_kunci_sbmptn')->result_array();
        } else {
            return $this->db->get_where('tb_kunci_sbmptn', ['id_kunci_sbmptn' => $kunci])->result_array();
        }
    }

    public function deleteKuncisbm($kunci)
    {
        $this->db->delete('tb_kunci_sbmptn', ['id_kunci_sbmptn' => $kunci]);
        return $this->db->affected_rows();
    }
    public function createKuncisbm($data)
    {
        $this->db->insert('tb_kunci_sbmptn', $data);
        return $this->db->affected_rows();
    }
    public  function updateKuncisbm($data, $kunci)
    {
        $this->db->update('tb_kunci_sbmptn', $data, ['id_kunci_sbmptn' => $kunci]);
        return $this->db->affected_rows();
    }
}
