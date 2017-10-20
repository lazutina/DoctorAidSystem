<?php

include_once $application_folder . "/core/WebController.php";
include_once $application_folder . "/libraries/excel/php-excel-reader/excel_reader2.php";
include_once $application_folder . "/libraries/excel/SpreadsheetReader.php";

ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');

class Product extends WebController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        $data['products'] = $this->product_model->products();
        
        $params = array();

        $limit_per_page = 10;

        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $total_records = $this->product_model->total();

        if ($total_records > 0) 
        {
            // get current page records
            $params["products"] = $this->product_model->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url().'product/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            // custom paging configuration
            $config['num_links'] = 10;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['full_tag_open'] = '<ul class="pagination">';        
            $config['full_tag_close'] = '</ul>';        
            $config['first_link'] = 'First';        
            $config['last_link'] = 'Last';        
            $config['first_tag_open'] = '<li>';        
            $config['first_tag_close'] = '</li>';        
            $config['prev_link'] = '&laquo';        
            $config['prev_tag_open'] = '<li class="prev">';        
            $config['prev_tag_close'] = '</li>';        
            $config['next_link'] = '&raquo';        
            $config['next_tag_open'] = '<li>';        
            $config['next_tag_close'] = '</li>';        
            $config['last_tag_open'] = '<li>';        
            $config['last_tag_close'] = '</li>';        
            $config['cur_tag_open'] = '<li class="active"><a href="#">';        
            $config['cur_tag_close'] = '</a></li>';        
            $config['num_tag_open'] = '<li>';        
            $config['num_tag_close'] = '</li>'; 

            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
        
        $this->set_view('product/index', $params);
    }

    public function create()
    {
        $this->set_view('product/create');
    }

    public function save()
    {

        $products = array();
        $result = array();

        $result['products'] = $products;
        
        if($_FILES['file']['name'] != "")
        {
            $uploadFilePath = 'assets/tmp/'.basename($_FILES['file']['name']);

            move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
            $Reader = new SpreadsheetReader($uploadFilePath);

            $totalSheet = count($Reader->sheets());

            $Reader->ChangeSheet(0);

            $index = 0;

            $data = array();
            
            foreach ($Reader as $Row)
            {
                if($index > 0)
                {
                    if($Row[0] == "" || $Row[0] == null)
                        break;
                    
                    $data['account_unit'] = $Row[0];
                    $data['account'] = $Row[1];
                    $data['sub_account'] = $Row[2];
                    $data['vendor'] = $Row[3];
                    $data['lawson_item_number'] = $Row[4];
                    $data['description'] = $Row[5];
                    $data['mfg_code'] = $Row[6];
                    $data['mfg_nbr'] = $Row[7];
                    $data['po_date'] = $Row[8];
                    $data['po_number'] = $Row[9];
                    $data['po_line'] = $Row[10];
                    $data['qty'] = $Row[11];
                    $data['uom'] = $Row[12];
                    $data['unit_cost'] = $Row[13];
                    $data['total_cost'] = $Row[14];

                    if($this->product_model->add($data))
                        array_push($products, $data);
                }
                $index++;
            }
            $result['products'] = $products;
        }
   
        $this->set_view('product/show', $result);
    }
}