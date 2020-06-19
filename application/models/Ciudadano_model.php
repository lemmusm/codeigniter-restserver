<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ciudadano_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function registerCiudadano($data)
    {
        if ($this->db->insert('ciudadano', $data)) {
            return 'Ciudadano was register successfully';
        } else {
            return "Error has occured";
        }
    }
    public function getCiudadanos()
    {
        $query = $this->db->get('ciudadano');
        return $query->result_array();
    }
    public function getCiudadano($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('ciudadano');
        $res = $query->result_array();
        if ($res !== []) {
            return $res;
        } else {
            return 'Ciudadano not found!';
        }
    }

    public function updateCiudadano($id, $data)
    {
        $this->db->where('id', $id);

        $query_get = $this->db->get('ciudadano');

        if ($query_get->num_rows() > 0) {
            $this->db->update('ciudadano', $data, array('id' => $id));
            return 'Data was updated successfully';
        } else {
            return "Error has occured, ciudadano not found!";
        }
    }

    public function deleteCiudadano($id)
    {
        $this->db->where('id', $id);
        $query_get = $this->db->get('ciudadano');

        if ($query_get->num_rows() > 0) {
            $this->db->delete('ciudadano', array('id' => $id));
            return 'Data was deleted successfully';
        } else {
            return 'Error has occured, user not found!';
        }
    }
}
