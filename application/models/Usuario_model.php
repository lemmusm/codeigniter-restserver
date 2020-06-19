<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // SHOW ALL
    public function getUsers()
    {
        $query = $this->db->get("usuario");
        return $query->result_array();
    }

    // SHOW BY ID
    public function getUser($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get("usuario");
        $res = $query->result_array();
        if ($res !== []) {
            return $res;
        } else {
            return 'User not found!';
        }
    }

    // REGISTER
    public function postUsers($data)
    {
        //Insert data to database
        if ($this->db->insert('usuario', $data)) {
            return 'Data was inserted successfully';
        } else {
            return "Error has occured";
        }
    }

    // UPDATE
    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        $query_get = $this->db->get("usuario");
        if ($query_get->num_rows() > 0) {
            $this->db->update('usuario', $data, array('id' => $id));
            return 'Data was updated successfully';
        } else {
            return "Error has occured, user not found!";
        }
    }

    // DELETE
    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $query_get = $this->db->get("usuario");
        if ($query_get->num_rows() > 0) {
            $this->db->delete('usuario', array('id' => $id));
            return 'Data was deleted successfully';
        } else {
            return "Error has occured, user not found!";
        }
    }
}
