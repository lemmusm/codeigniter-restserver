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
        if ($query = $this->db->insert('usuario', $data)) {
            return 'Data is inserted successfully';
        } else {
            return "Error has occured";
        }
    }

    // UPDATE
    public function updateUser($id, $data)
    {
        $query = $this->db->update('usuario', $data, array('id' => $id));

        if ($query) {
            return 'Data was updated successfully';
        } else {
            return "Error has occured";
        }
    }

    // DELETE
    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('usuario');
        //Insert data to database
        if ($query) {
            return 'Data was deleted successfully';
        } else {
            return "Error has occured";
        }
    }
}
