<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

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

        $data['title'] = 'Profile';
		$data['custom_css']	=	'admin/include/custom_css/profile';
		$data['custom_js']	=	'admin/include/custom_js/profile';
        $data['contents'] = $this->load->view('admin/profile/profile', '', true);

        $this->load->view('admin/template', $data);
    }

    function update($profile_id) {

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
            $data['profile_image'] = $image_data['file_name'];
        }

        $data['address_1'] = $this->input->post('address_1');
        $data['address_2'] = $this->input->post('address_2');
        $data['phone'] = $this->input->post('phone');
        $data['cell'] = $this->input->post('cell');
        $data['skype'] = $this->input->post('skype');

        $this->db->where('adminId', $profile_id);
        $this->db->update('admin_users', $data);

        redirect('admin/profile');
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