<?php

class Role_model extends CI_Model
{
    public function getRole($role = null)
    {
        if ($role === null) {
            return $this->db->get('tb_role')->result_array();
        } else {
            return $this->db->get_where('tb_role', ['id_role' => $role])->result_array();
        }
    }
}
