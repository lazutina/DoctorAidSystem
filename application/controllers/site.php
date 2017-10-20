<?php

include_once $application_folder . "/core/WebController.php";

class Site extends WebController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->set_view('site/index');
    }

    public function login()
    {
    	$this->set_view('site/login', null, null);
    }

    public function logout()
    {
    	$this->session->unset_userdata('islogin');
    	$this->session->unset_userdata('user');
    	$this->set_view('site/login', null, null);
    }
    
    public function logincheck()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
		
	   if ($this->form_validation->run() === FALSE)
        {
            $this->set_view('site/login', null, null);
        }else {
            $user = $this->user_model->logincheck();
          	if($user)
          	{
          		$this->session->set_userdata("islogin", true);
          		$this->session->set_userdata("user", $user);
          		redirect('site/index');
          	}else
          	{
          		$data['error'] = "Login Information is invalid.";
            	$this->set_view('site/login', $data, null);
          	}
        }   
    }
}