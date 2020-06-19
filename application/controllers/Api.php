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
        
        $this->load->model('usuario_model');
        $this->load->model('ciudadano_model');
        $this->load->model('pago_model');
    }

    /*****************************  SECCION USUARIOS *****************************/
    
    public function usuario_post()
    {
        $data_form = file_get_contents('php://input');
        $data = json_decode($data_form);

        $res = $this->usuario_model->postUsers($data);
        $this->response($res);
    }
    
    public function usuario_get()
    {
        $id = $this->uri->segment(3);

        if (is_null($id)) {
            $res = $this->usuario_model->getUsers();
        } else {
            $res = $this->usuario_model->getUser($id);
        }
        $this->response($res);
    }

    public function usuario_put()
    {
        $id = $this->uri->segment(3);

        $data_form = file_get_contents('php://input');
        $data = json_decode($data_form);

        $res = $this->usuario_model->updateUser($id, $data);
        $this->response($res);
    }

    public function usuario_delete()
    {
        $id = $this->uri->segment(3);
        $res = $this->usuario_model->deleteUser($id);
        $this->response($res);
    }

    /*****************************  SECCION CIUDADANO *****************************/

    public function ciudadano_post()
    {
        $data_form = file_get_contents('php://input');
        $data = json_decode($data_form);

        $res = $this->ciudadano_model->registerCiudadano($data);
        $this->response($res);
    }

    public function ciudadano_get()
    {
        $id = $this->uri->segment(3);

        if (is_null($id)) {
            $res = $this->ciudadano_model->getCiudadanos();
        } else {
            $res = $this->ciudadano_model->getCiudadano($id);
        }
        $this->response($res);
    }

    public function ciudadano_put()
    {
        $id = $this->uri->segment(3);

        $data_form = file_get_contents('php://input');
        $data =  json_decode($data_form);

        $res = $this->ciudadano_model->updateCiudadano($id, $data);
        $this->response($res);
    }

    public function ciudadano_delete()
    {
        $id = $this->uri->segment(3);

        $res = $this->ciudadano_model->deleteCiudadano($id);
        $this->response($res);
    }

    /*****************************  SECCION PAGOS *****************************/

    public function pago_post()
    {
        $data_form = file_get_contents('php://input');
        $data = json_decode($data_form);
    
        $res = $this->pago_model->registerPago($data);
        $this->response($res);
    }

    public function pago_get()
    {
        $id = $this->uri->segment(3);

        if (is_null($id)) {
            $res = $this->pago_model->getPagos();
        } else {
            $res = $this->pago_model->getPago($id);
        }
        $this->response($res);
    }

    public function pago_put()
    {
        $id = $this->uri->segment(3);
        $data_form = file_get_contents('php://input');
        $data = json_decode($data_form);

        $res = $this->pago_model->updatePago($id, $data);
        $this->response($res);
    }
    
    public function pago_delete()
    {
        $id = $this->uri->segment(3);

        $res = $this->pago_model->deletePago($id);
        $this->response($res);
    }
}
