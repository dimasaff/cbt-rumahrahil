<?php

class paket_sbm_model extends CI_Model
{
    public function getPaketsbm($paket = null)
    {
        if ($paket === null) {
            return $this->db->get('tb_paket_sbmptn')->result_array();
        } else {
            return $this->db->get_where('tb_paket_sbmptn', ['id_paket_sbmptn' => $paket])->result_array();
        }
    }

    public function deletePaketsbm($paket)
    {
        $this->db->delete('tb_paket_sbmptn', ['id_paket_sbmptn' => $paket]);
        return $this->db->affected_rows();
    }
    public function createPaketsbm($data)
    {
        $this->db->insert('tb_paket_sbmptn', $data);
        return $this->db->affected_rows();
    }
    public  function updatePaketsbm($data, $paket)
    {
        $this->db->update('tb_paket_sbmptn', $data, ['id_paket_sbmptn' => $paket]);
        return $this->db->affected_rows();
    }
}
