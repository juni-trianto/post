<?php

class Operator_model extends CI_Model
{
    public function login($username, $password)
    {
        $chek =   $this->db->get_where('operator', ['username' => $username, 'password' => md5($password)]);
        if ($chek->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function tampil_data()
    {
        return $this->db->get('operator');
    }

    public function get_one($id)
    {
        $param = ['operator_id' => $id];
        return $this->db->get_where('operator', $param);
    }
}
