<?php

include_once $application_folder . "/core/ApiController.php";

class UserApi extends ApiController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $users = $this->user_model->users();
        echo json_encode($users);
    }

    public function signin()
    {
        $user = $this->user_model->logincheck();

        $result = array();

        if($user != null)
        {
            $result['success'] = true;
            $result['user'] = $user;
        }else
        {
            $result['success'] = false;
            $result['msg'] = "User name and password are invalid.";
        }

        echo json_encode($result);
    }

    public function signup()
    {
        $result = array();

        if(strcmp($this->input->post('password'), $this->input->post('passwordconfirmation')) == 0) 
        {

            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
            $this->form_validation->set_rules('passwordconfirmation', 'password confirmation', 'required');
            
            if ($this->form_validation->run() === FALSE)
            {
                $result['success'] = false;
                $result['msg'] = "User Account Information is invalid";
            }else
            {
                $id = $this->user_model->save();
                if ($id > 0){
                    $result['success'] = true;
                    $result['user'] = $this->user_model->get($id);
                }else{
                    $result['success'] = false;
                    $result['msg'] = "User Account Information is not saved.";
                }
            }
           

        }else
        {
            $result['success'] = false;
            $result['msg'] = "Password does not match.";
        }

        echo json_encode($result);
    }
}