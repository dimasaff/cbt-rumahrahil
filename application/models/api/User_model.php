<?php

class User_model extends CI_Model
{
    public function getUser($user = null)
    {
        if ($user === null) {
            return $this->db->get('tb_user')->result_array();
        } else {
            return $this->db->get_where('tb_user', ['id_user' => $user])->result_array();
        }
    }

    public function deleteUser($user)
    {
        $this->db->delete('tb_user', ['id_user' => $user]);
        return $this->db->affected_rows();
    }
    public function createUser($data)
    {
        $this->db->insert('tb_user', $data);
        return $this->db->affected_rows();
    }
    public  function updateUser($data, $user)
    {
        $this->db->update('tb_user', $data, ['id_user' => $user]);
        return $this->db->affected_rows();
    }
}
