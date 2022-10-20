<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_controller extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('custom_model','cmd');
	}

	public function index()
	{
		$this->load->view('custome_model_demo');
	}

	public function getrows(){
		$data = $this->cmd->getRows('user_custom_demo');
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_rows_sort(){
		$where = [ 'id' => '2'];
		$data = $this->cmd->getRowsSorted('user_custom_demo',$where,'','name');
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_rows_inlike(){
		$where = [ 'id' => '6'];
		$data = $this->cmd->getRowsWhereInLike('user_custom_demo',$where);
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function join(){
		$join = ['user_feedback'];
		$condition = ['user_custom_demo.id = user_feedback.id'];
		$data = $this->cmd->getRowsWhereJoin('user_custom_demo',[], $join, $condition);
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function Get_Distinct_R(){
		$where = [ 'id' => '1'];
		$data = $this->cmd->getDistinctRows('user_custom_demo', $where, '', 'id');
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function single_row(){
		$where = [ 
			'city' => 'gondal'
		];
		$data = $this->cmd->getSingleRow('user_custom_demo', $where,'array()');
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_total_count(){
		$data = $this->cmd->getTotalCount('user_custom_demo');
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_count(){
		$data = $this->cmd->getCount('user_custom_demo');
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function insert_data(){
		$array = [
			'name' 	=> 'disha',
			'email' =>	'disha@gmail.com',
			'city' 	=> 'Rajkot'
		];
		$last_id= $this->cmd->insertRow('user_custom_demo',$array);
		$qry = $this->db->last_query();
		$where = [ 'id' => $last_id ];
		$data = $this->cmd->getRows('user_custom_demo', $where);
		$result = [
			'id'  => $last_id,
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function update_data(){
		$array = [
			'name' => 'abc',
			'email'=> 'abc@gmail.com',
			'city' => 'Rajkot'
		];
		$where = [ 'id' => '1'];
		$data = $this->cmd->updateRow('user_custom_demo', $array, $where);
		$qry = $this->db->last_query();
		$result =[
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function delete_data(){
		$where = [ 'id' => '28'];
		$data = $this->cmd->deleteRow('user_custom_demo', $where);
		$qry = $this->db->last_query();
		$result =[
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function get_singel_value(){
		$where = [ 
			'name' 	=> 'disha',
			'email' => 'disha@gmail.com'
		];
		$data = $this->cmd->getSingleValue('user_custom_demo', 'city', $where);
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function custom_query(){
		 $query = "select * from user_custom_demo";
		$data = $this->cmd->customQuery($query, TRUE);
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  =>$qry
		];
		echo json_encode($result);
	}

	public function get_result(){
		$query = $this->db->select('*')->from('user_custom_demo')->get();
		//$query = "selecte * from user_custom_demo";
		$data = $this->cmd->getResult($query);
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function check_availability(){
		$where = [ 
			'name' 	=> 'disha',
			'email' => 'disha@gmail.com'
		];
		$data = $this->cmd->checkAvailability('user_custom_demo', $where);
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function find_in_set(){
		$data = $this->cmd->findInSet('user_custom_demo', 'city', 'Gondal');
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}
}

