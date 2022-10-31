<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_controller extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','umd');
	}

	public function index()
	{
		$this->config->load('list_item');
		//$data['list_item'] = $this->config->item('list_item');
		$data['list_item'] = config_item('list_item');
		$this->load->view('custome_model_demo',$data);
	}

	public function getrows(){
		$city = $this->input->post();
		$data = $this->umd->get_rows($city);
		 $qry = $this->db->last_query();
		 $result = [
		 	'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_rows_sort(){
		$id = $this->input->post();
		$data = $this->umd->get_Rows_Sort($id);
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_rows_inlike(){
		$id = $this->input->post();
		$data = $this->umd->get_Rows_Inlike($id);
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function join(){
		$data = $this->umd->Join();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function Get_Distinct_R(){
		$data = $this->umd->get_distinct_Row();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function single_row(){
		$data = $this->umd->single_Row();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_total_count(){
		$data = $this->umd->get_Total_Count();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_count(){
		$data = $this->umd->get_Count();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function insert_data(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$city = $this->input->post('city');
		$last_id= $this->umd->insertData($name, $email, $city);
		$qry = $this->db->last_query();
		$where = [ 'id' => $last_id ];
		$data = $this->umd->getRows('user_custom_demo', $where);
		$result = [
			'id'  => $last_id,
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function update_data(){
		$record = $this->input->post();
		$data = $this->umd->updateData($record);
		$qry = $this->db->last_query();
		$result =[
			'data' => $data,
			'qry'  => $qry,
			'id' => $record['id']
		];
		echo json_encode($result);
	}

	public function delete_data(){
		$data = $this->umd->deleteData();
		$qry = $this->db->last_query();
		$result =[
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_singel_value(){
		$data = $this->umd->get_Singel_Value();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function custom_query(){
		$data = $this->umd->custom_Query();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  =>$qry
		];
		echo json_encode($result);
	}

	public function get_result(){
		$data = $this->umd->get_Result();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function check_availability(){
		$data = $this->umd->availability();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function find_in_set(){
		$data = $this->umd->find_In_Set();
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function fetch_value(){
		$id = $this->input->post();
		$data = $this->umd->fetch_single_row($id);
		echo json_encode($data);
	}
}

