<?php

include_once $application_folder . "/core/ApiController.php";

class ProductApi extends ApiController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
		$result['success'] = true;

        $products = $this->product_model->productsforapi();

        if($products != null)
        {
        	$result['products'] = $products;
        }else
        {
	  		$result['products'] = array();
        }

        echo json_encode($result);
    }
}