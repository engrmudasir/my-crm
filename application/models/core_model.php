<?php if ( ! defined('BASEPATH')) exit ('No direct script  allow'); 

class Core_Model extends CI_Model {

	 function __construct(){
        parent::__construct();
    }
	function get_records_where($select,$table,$column,$value)	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($column,$value);
		return $this->db->get();
	}

	function get_records_where_array($select,$table,$array)	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($array);
		return $this->db->get();
	}
	
	function get_all_records($select,$table){
		$this->db->select($select);
		$this->db->from($table);
		return $this->db->get();
	}

	function insert_record_return_id($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	function insert_record($table,$data){
		return $this->db->insert($table,$data);
	}

	function update_record($column,$value,$table,$data){
		$this->db->where($column,$value);
		$this->db->update($table,$data);
		return true;
	}

	

	function delete_record($column,$value,$table){
		$this->db->where($column,$value);
		$this->db->delete($table);
	}
	function page_listing($page,$recordperpage,$tbl_name,$orderBy_columName,$ASC_DESC) {

		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->order_by($orderBy_columName,$ASC_DESC);
		$this->db->limit($recordperpage , $page);
		$result=$this->db->get();

		return $result;	

	}

	function page_listing_num($tbl_name) {


		$this->db->select('*');
		$this->db->from($tbl_name);
		$query=$this->db->get();
		return $query->num_rows();
	}
        function select_complete_data($table_name,$where)
        {
                $this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($where);
		
		$result=$this->db->get();
                if($result->num_rows > 0)
                {
                    $row    =   $result->row_array();
                    $fields = $this->db->list_fields($table_name);

                    foreach ($fields as $field)
                    {
                       $data[$field]    =   $row[$field];
                    }
                    return $data;
                }
                else
                {
                    return '';
                }
        }
		
}
?>