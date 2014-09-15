<?php if ( ! defined('BASEPATH')) exit ('No direct script  allow'); 

class Template_model extends CI_Model {
	
	
	function get_template($id)
	{
		$this->db->select('*');
		$this->db->from('email_template');
		$this->db->where('email_id',$id);
		return $this->db->get();
	}
	
	function insert_template($data)
	{
		$this->db->insert('email_template',$data);	
	}
	
	function update_template($id,$data)
	{
		$this->db->where('email_id',$id);
		$this->db->update('email_template',$data);	
	}
	
	function delete($id)
	{
		$this->db->where('email_id',$id);
		$this->db->delete('email_template');
	}
	
	function template_listing_num()
	{
		$this->db->select('*');
		$this->db->from('email_template');
		$query=$this->db->get();
		return $query->num_rows();
	}
	
	function template_listing($page,$recordperpage)
	{
		$this->db->select('*');
		$this->db->from('email_template');
		$this->db->limit($recordperpage , $page);
		$result=$this->db->get();
		return $result;	
		
	}
}
?>