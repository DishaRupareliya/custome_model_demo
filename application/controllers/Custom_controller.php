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
		$where = [ 'id' => '2'];
		$data = $this->cmd->getRowsWhereInLike('user_custom_demo',$where);
		$qry = $this->db->last_query();
		$result = [
			'data' => $data,
			'qry'  => $qry
		];
		echo json_encode($result);
	}

	public function join(){
		$where = [ 'id' => '2'];
		$join = [ 'table' => 'user'];
		$join_condition = 'user_custom_demo.name=user.name';
		$data = $this->cmd->getRowsWhereJoin('user_custom_demo', $where, '', $join_condition);
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
		$where = [ 'id' => '2'];
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
}

