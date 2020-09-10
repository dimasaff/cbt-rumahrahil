<?php

class Tema_model extends CI_Model
{
    public function getTema($tema = null)
    {
        if ($tema === null) {
            return $this->db->get('tb_tema')->result_array();
        } else {
            return $this->db->get_where('tb_tema', ['id_tema' => $tema])->result_array();
        }
    }

    public function deleteTema($tema)
    {
        $this->db->delete('tb_tema', ['id_tema' => $tema]);
        return $this->db->affected_rows();
    }
    public function createTema($data)
    {
        $this->db->insert('tb_tema', $data);
        return $this->db->affected_rows();
    }
    public  function updateTema($data, $tema)
    {
        $this->db->update('tb_tema', $data, ['id_tema' => $tema]);
        return $this->db->affected_rows();
    }
}
