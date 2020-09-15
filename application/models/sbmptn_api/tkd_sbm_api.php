<?php

class tkd_sbm_api extends CI_Model
{
    public function getTKDsbm($tkd = null)
    {
        if ($tkd === null) {
            return $this->db->get('tb_tkd_sbmptn')->result_array();
        } else {
            return $this->db->get_where('tb_tkd_sbmptn', ['id_tkd_sbmptn' => $tkd])->result_array();
        }
    }

    
}
