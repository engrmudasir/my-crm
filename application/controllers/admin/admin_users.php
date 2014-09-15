<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_users extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if (!$this->session->userdata('adminId')) {
            redirect('admin/login');
        }
        $this->load->model('core_model');
        $this->original_path = realpath(PATH_DIR . '/images/admin_users');
        $this->resized_path = realpath(PATH_DIR . '/images/admin_users/resized');
        $this->thumbs_path = realpath(PATH_DIR . '/images/admin_users/thumbs');
    }

    function index() {

        $data['title'] = 'Admin Users';
		$data['custom_css']	=	'admin/include/custom_css/dynamic_tables';
		$data['custom_js']	=	'admin/include/custom_js/dynamic_tables';
		$data['custom_javascript']	=	'<script src="'.base_url().'js/dynamic_table/dynamic_table_init_users.js"></script>';
        $data['contents'] = $this->load->view('admin/admin_users/users-list', '', true);
		
		

        $this->load->view('admin/template', $data);
    }
	function addUser() {
if($this->input->post('firstname'))
{
	if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '')
	{
		$_FILES['userfile']['name']	=	rand().time().'_'.$_FILES['userfile']['name'];
	$data['profile_image'] = $this->upload_image();
}
	$data['first_name']	=	$this->input->post('firstname');
	$data['last_name']	=	$this->input->post('lastname');
	$data['user_name']	=	$this->input->post('username');
	$data['password']	=	$this->input->post('password');
	$data['email']	=	$this->input->post('email');
	$data['cell']	=	$this->input->post('cell');
	$data['address_1']	=	$this->input->post('address_one');
	$data['address_2']	=	$this->input->post('address_two');
	$data['phone']	=	$this->input->post('phone');
	$data['skype']	=	$this->input->post('skype');
	if($this->input->post('status')=='on')
	{
		$data['status']	=	1;
	}
	else
	{
		$data['status']	=	0;
	}
	
	$this->db->insert('admin_users',$data);
	
	$this->messages->add('New Admin/Emplyee Added','success');
	
	redirect('admin/admin_users');
}
else
{$data['title'] = 'Add User';
		$data['custom_css']	=	'admin/include/custom_css/advanced_forms';
		$data['custom_js']	=	'admin/include/custom_js/advanced_forms';
        $data['contents'] = $this->load->view('admin/admin_users/add-user', '', true);

        $this->load->view('admin/template', $data);
}
    }
	
	function editUser($adminId) {
if($this->input->post('firstname'))
{
	if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '')
	{
		$_FILES['userfile']['name']	=	rand().time().'_'.$_FILES['userfile']['name'];
		$data['profile_image'] = $this->update($adminId);
	}
	$data['first_name']	=	$this->input->post('firstname');
	$data['last_name']	=	$this->input->post('lastname');
	$data['user_name']	=	$this->input->post('username');
	$data['password']	=	$this->input->post('password');
	$data['email']	=	$this->input->post('email');
	$data['cell']	=	$this->input->post('cell');
	$data['address_1']	=	$this->input->post('address_one');
	$data['address_2']	=	$this->input->post('address_two');
	$data['phone']	=	$this->input->post('phone');
	$data['skype']	=	$this->input->post('skype');
	if($this->input->post('status')=='on')
	{
		$data['status']	=	1;
	}
	else
	{
		$data['status']	=	0;
	}
	$this->db->where('adminId',$adminId);
	$this->db->update('admin_users',$data);
	
		$this->messages->add('Admin/Emplyee Updated','success');

	redirect('admin/admin_users');
}
else
{		$data['title'] = 'Update Admin User';
		$res['user_data']=	$this->db->select('*')->from('admin_users')->where('adminId',$adminId)->get();
		$data['custom_css']	=	'admin/include/custom_css/advanced_forms';
		$data['custom_js']	=	'admin/include/custom_js/advanced_forms';
        $data['contents'] = $this->load->view('admin/admin_users/edit-user', $res, true);

        $this->load->view('admin/template', $data);
}
    }

    function upload_image() {

        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') {
           
        

        //===========Here comes the Image upload=====
        $this->load->library('image_lib');
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
            'max_size' => 3048, //3MB max
            'upload_path' => $this->original_path
        );

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $image_data = $this->upload->data(); //upload the image
            $this->image_resize($image_data['file_path'], $this->original_path, 167, 158);
            $this->image_resize($image_data['full_path'], $this->resized_path, 50, 50);
            $this->image_resize($image_data['full_path'], $this->thumbs_path, 42, 40);
            return $image_data['file_name'];
		}
        }
    }
	function update($adminId) {

        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') {
            $userfile_old = $this->input->post('userfile_old');
            if ($userfile_old != '') {
                unlink(PATH_DIR . '/images/admin_users/' . $userfile_old);
                unlink(PATH_DIR . '/images/admin_users/resized/' . $userfile_old);
                unlink(PATH_DIR . '/images/admin_users/thumbs/' . $userfile_old);
            }
        }

        //===========Here comes the Image upload=====
        $this->load->library('image_lib');
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
            'max_size' => 3048, //3MB max
            'upload_path' => $this->original_path
        );

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $image_data = $this->upload->data(); //upload the image
            $this->image_resize($image_data['file_path'], $this->original_path, 167, 158);
            $this->image_resize($image_data['full_path'], $this->resized_path, 50, 50);
            $this->image_resize($image_data['full_path'], $this->thumbs_path, 42, 40);
            return $image_data['file_name'];
        }

        
    }
	function delete($adminId) {
			$qry	=	$this->db->select('*')->from('admin_users')->where('adminId',$adminId)->get();
			if($qry->num_rows > 0)
			{
				
            $userfile_old = $qry->row()->profile_image;
            if ($userfile_old != '') {
                unlink(PATH_DIR . '/images/admin_users/' . $userfile_old);
                unlink(PATH_DIR . '/images/admin_users/resized/' . $userfile_old);
                unlink(PATH_DIR . '/images/admin_users/thumbs/' . $userfile_old);
            }
			$this->db->where('adminId',$adminId);
			$this->db->delete('admin_users');
			}
					$this->messages->add('Admin/Emplyee Deleted','error');

        redirect('admin/admin_users');

       


        
    }

    function image_resize($source_image, $new_image_path, $width, $height) {
        $config = array(
            'source_image' => $source_image,
            'new_image' => $new_image_path,
            'maintain_ratio' => true,
            'width' => $width,
            'height' => $height
        );
        //here is the second thumbnail, notice the call for the initialize() function again
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */