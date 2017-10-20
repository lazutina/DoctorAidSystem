<?php

class Product_model extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
	    $this->table = 'tbl_product';
    }

	public function products()
    {
    	$query = $this->db->get_where($this->table);

    	return $query->result();
    }

    public function productsforapi()
    {
        $this->db->limit(10, 0);
        $query = $this->db->get_where($this->table);

        return $query->result();
    }

    public function add($data)
    {
    	$this->db->insert($this->table, $data);

    	return $this->db->insert_id();
    }

    public function total() 
    {
        return $this->db->count_all($this->table);
    }


    public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
}