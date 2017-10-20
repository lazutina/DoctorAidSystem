<?php
class WebController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->encryption->initialize(array('driver' => 'mcrypt'));
        $this->form_validation->set_error_delimiters('<div class="alert alert-success" style="margin-top:10px">', '</div>');
    }

    public function set_view($page, $data = null, $layout = "default")
    {
    	if($layout == "default")
    	{
	        $this->load->view('template/header');
   	 		$this->load->view($page, $data);
   	 		$this->load->view('template/footer');
    	}else
        {
            $this->load->view($page, $data);
        }
	}
}