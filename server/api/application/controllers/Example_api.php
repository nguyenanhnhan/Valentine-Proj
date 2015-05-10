<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Example_api extends REST_Controller {

	function user_get()
	{
		if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $user = $this->user_model->get( $this->get('id') );
         
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
	}

	function users_get()
	{
        $data = array('a' => 1, 'b' => 2, 'c' => 3 );
        $this->response($data, 200);
	}

    function test_get()
    {
        // $data = array(array('test' => $this->get('testid'), 'date' => $this->get('date'), 'firstname' => 'Nhan', 'lastname' => "Nguyen"),array('test'=>$id) );
        $data = array('date' => $this->get('date'), 'id' => $this->get('id'));
        $this->response($data,200);
    }

    function test_post()
    {
        $user = $this->post('name');
        $email = $this->post('email');

        $data = array('name' => $user, 'email' => $email);
        $this->response($data,200);
    }

    function companies_get()
    {   
        $this->load->database();
        # code...
        $this->load->model('Tbl_dim_companies_model', 'companies_model');

        $data = $this->companies_model->get_all();
        $this->response($data);
    }
}

/* End of file Example_api.php */
/* Location: ./application/controllers/Example_api.php */