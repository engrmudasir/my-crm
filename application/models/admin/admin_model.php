<?php if ( ! defined('BASEPATH')) exit ('No direct script  allow'); 



class Admin_model extends CI_Model {

	

	function chk_admin($email,$pass)

	{

		$this->db->select('*');

		$this->db->from('admin_users');

		$this->db->where('email', $email);

		$this->db->where('password', $pass);

		$result = $this->db->get();

		return $result;

	}



	function chk_email($email)

	{

		$this->db->select('*');

		$this->db->from('admin_users');

		$this->db->where('email', $email);

		$result = $this->db->get();

		return $result;

	}



	function chk_pwd($admin_id,$old_pass)

	{

		$this->db->select('*');

		$this->db->from('admin_users');

		$this->db->where('adminId', $admin_id);

		$this->db->where('password', $old_pass);

		$result = $this->db->get();

		return $result;

	}

	

	function update_password($admin_id,$data)

	{

		$this->db->where('adminId', $admin_id);

		$this->db->update('admin_users', $data);

	}

}

?>