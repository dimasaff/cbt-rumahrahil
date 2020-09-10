<?php

class Subtema_model extends CI_Model
{
    public function getSubtema($subtema = null)
    {
        if ($subtema === null) {
            return $this->db->get('tb_subtema')->result_array();
        } else {
            return $this->db->get_where('tb_subtema', ['id_subtema' => $subtema])->result_array();
        }
    }

    public function deleteSubtema($subtema)
    {
        $this->db->delete('tb_subtema', ['id_subtema' => $subtema]);
        return $this->db->affected_rows();
    }
    public function createSubtema($data)
    {
        $this->db->insert('tb_subtema', $data);
        return $this->db->affected_rows();
    }
    public  function updateSubtema($data, $subtema)
    {
        $this->db->update('tb_subtema', $data, ['id_subtema' => $subtema]);
        return $this->db->affected_rows();
    }
}
