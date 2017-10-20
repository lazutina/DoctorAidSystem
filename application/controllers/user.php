<?php

include_once $application_folder . "/core/WebController.php";

class User extends WebController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['users'] = $this->user_model->users();

        $this->set_view('user/index', $data);
    }

    public function create()
    {
        $data["id"] = 0;

    	$this->set_view('user/create', $data);
    }

    public function save()
    {
        $id = $this->input->get('id', '0');

        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirmation', 'password confirmation', 'required|matches[password]');
        
        if ($this->form_validation->run() === FALSE)
        {
            $data['id'] = $id;
            if($id == 0)
            {
                $this->set_view('user/create', $data);
            }
            else{
                $user = $this->user_model->get($id);
                $data['email'] = $user->email;  
                $this->set_view('user/edit', $data);
            }
        } else {
            $result = false;

            if($id == 0)
               $result = $this->user_model->save();
            else
               $result = $this->user_model->update($id);
            
            if($result)
                $this->session->set_flashdata('flash', 'User successfully saved.');
            else
                $this->session->set_flashdata('flash', 'User save failed.');

            redirect('user/index');
        }
    }

    public function edit()
    {
        $id =  $this->input->get('id');

        $user = $this->user_model->get($id);

        $data["id"] = $id;
        $data['email'] = $user->email;

        $this->set_view('user/edit', $data);
    }

    public function delete()
    {
        $id =  $this->input->get('id');

        if($this->user_model->delete($id))
        {
            $this->session->set_flashdata('flash', 'User successfully deleted.');
        }else
        {
            $this->session->set_flashdata('flash', 'User deletion failed.');
        }

        redirect('user/index');
    }

    public function admin()
    {
        $id =  $this->input->get('id');

        if($this->user_model->admin($id))
        {
            $this->session->set_flashdata('flash', 'User admin successfully updated.');
        }else
        {
            $this->session->set_flashdata('flash', 'User admin update failed.');
        }

        redirect('user/index');
    }
}