<?php

class User_model extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
	    $this->table = 'tbl_user';
    }

    public function save()
    {
	    $data = array(
	        'email' => $this->input->post('email'),
	        'password' => $this->input->post('password'),
	        'updated_at' => date("Y-m-d H:i:s"),
	        'created_at' => date("Y-m-d H:i:s"),
	        'admin' => false
	    );

    	$this->db->insert($this->table, $data);

    	return $this->db->insert_id();
    }

    public function get($id)
    {
		$query = $this->db->get_where($this->table, array('id' => $id));

		return $query->result()[0];
    }

    public function users()
    {
    	$query = $this->db->get_where($this->table, array('status' => 1));

    	return $query->result();
    }

    public function admin($id)
    {
		$data = array(
	        'admin' => 1,
		);

		$this->db->where('id', $id);
		$this->db->update($this->table, $data);

		if ($this->db->trans_status() === FALSE)
			return false;
		else
			return true;
    }

    public function delete($id)
    {
		$data = array(
	        'status' => 0,
		);

		$this->db->where('id', $id);
		$this->db->update($this->table, $data);

		if ($this->db->trans_status() === FALSE)
			return false;
		else
			return true;
    }

    public function update($id)
    {
		$data = array(
		  	'email' => $this->input->post('email'),
	        'password' => $this->input->post('password'),
	        'updated_at' => date("Y-m-d H:i:s"),
		);

		$this->db->where('id', $id);
		$this->db->update($this->table, $data);

		if ($this->db->trans_status() === FALSE)
			return false;
		else
			return true;
	}

	public function logincheck()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$query = $this->db->get_where($this->table, array('email' => $email, 'password' => $password));

		$result = $query->result();

		if( count($result) > 0 )
			return $query->result()[0];
		else
			return null;
	}
}