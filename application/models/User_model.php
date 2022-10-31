 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('my_model');
    }

    public function get_rows($city = ''){
        return $this->my_model->getRows('user_custom_demo', $city, [], null, '*');
    }

    public function get_Rows_Sort($id = ''){
        return $this->my_model->getRowsSorted('user_custom_demo',$id,'','name');
    }

    public function get_Rows_Inlike($id = ''){
        return $this->my_model->getRowsWhereInLike('user_custom_demo',$id);
    }

    public function Join(){
        $join = ['user_feedback'];
        $condition = ['user_custom_demo.id = user_feedback.id'];
        return $this->my_model->getRowsWhereJoin('user_custom_demo',[], $join, $condition, 'left');
    }

    public function get_distinct_Row(){
        // $where = [ 'id' => '4'];
        return $this->my_model->getDistinctRows('user_custom_demo', 'city',[], []);
    }

    public function single_Row(){
        $where = [ 
            'city' => 'gondal'
        ];
        return $this->my_model->getSingleRow('user_custom_demo', $where,'array');
    }

    public function get_Total_Count(){
        return $this->my_model->getTotalCount('user_custom_demo');
    }

    public function get_Count(){
        return $this->my_model->getCount('user_custom_demo');
    }

    public function insertData($name, $email, $city){
        $array = [
            'name'  => $name,
            'email' =>  $email,
            'city'  => $city
        ];
        return $this->my_model->insertRow('user_custom_demo',$array);
    }

    public function updateData($record){
        $array = [
            'name' => $record['data']['name'],
            'email' => $record['data']['email'],
            'city' => $record['data']['city']
        ];
        $where = [ 'id' => $record['id']];
        return $this->my_model->updateRow('user_custom_demo',$array, $where);
    }

    public function deleteData(){
        $where = [ 'id' => '28'];
        return $this->my_model->deleteRow('user_custom_demo', $where);
    }

    public function get_Singel_Value(){
        $where = [ 
            'name'  => 'disha',
            'email' => 'disha@gmail.com'
        ];
        return $this->my_model->getSingleValue('user_custom_demo', 'city', $where);
    }

    public function custom_Query(){
        $query = "select * from user_custom_demo";
        return $this->my_model->customQuery($query, TRUE);
    }

    public function get_Result(){
        $query = $this->db->select('*')->from('user_custom_demo')->get();
        //$query = "selecte * from user_custom_demo";
        return $this->my_model->getResult($query);
    }

    public function availability(){
        $where = [ 
            'name'  => 'disha',
            'email' => 'disha@gmail.com'
        ];
        return $this->my_model->checkAvailability('user_custom_demo', $where);
    }

    public function find_In_Set(){
        $where = [ 'id' => '20'];
        return $this->my_model->findInSet('user_custom_demo', 'city', 'Rajkot');
    }

    public function fetch_single_row($id = ''){
       return $this->my_model->getRowsWhereInLike('user_custom_demo', $id);
    }
}
