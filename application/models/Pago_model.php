<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pago_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function registerPago($data)
    {
        if ($this->db->insert('pago', $data)) {
            return 'Data was inserted sucessfully';
        } else {
            return 'Error has ocurred';
        }
    }

    public function getPagos()
    {
        $query = $this->db->get("pago");
        return $query->result_array();
    }

    public function getPago($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('pago');
        $res = $query->result_array();
        if ($res !== []) {
            return $res;
        } else {
            return 'User not found!';
        }
    }

    public function updatePago($id, $data)
    {
        $this->db->where('id', $id);
        $query_get = $this->db->get('pago');

        if ($query_get->num_rows() > 0) {
            $this->db->update('pago', $data, array('id' => $id));
            return "Data was updated successfully";
        } else {
            return "Error has ocurred, user not found!";
        }
    }

    public function deletePago($id)
    {
        $this->db->where('id', $id);
        $query_get = $this->db->get('pago');

        if ($query_get->num_rows() > 0) {
            $this->db->delete('pago', array('id' => $id));
            return 'Data was deleted successfully';
        } else {
            return 'Error has ocurred, pago not found!';
        }
    }
}
