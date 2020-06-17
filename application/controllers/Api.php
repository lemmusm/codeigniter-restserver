<?php
use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

class Api extends RestController
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        
        $this->load->model('Usuario_model');
    }

    
    // SHOW ALL AND BY ID
    public function usuarios_get()
    {
        $id = $this->uri->segment(3);

        if (is_null($id)) {
            $res = $this->Usuario_model->getUsers();
        } else {
            $res = $this->Usuario_model->getUser($id);
        }
        $this->response($res);
    }

    // REGISTER
    public function usuarios_post()
    {
        $data_form = file_get_contents('php://input');
        $data = json_decode($data_form);

        $res = $this->Usuario_model->postUsers($data);
        $this->response($res);
    }

    // UPDATE
    public function usuarios_put()
    {
        $id = $this->uri->segment(3);
        $data_form = file_get_contents('php://input');
        $data = json_decode($data_form);

        $res = $this->Usuario_model->updateUser($id, $data);
        $this->response($res);
    }

    // DELETE
    public function usuarios_delete()
    {
        $id = $this->uri->segment(3);
        $res = $this->Usuario_model->deleteUser($id);
        $this->response($res);
    }
}
