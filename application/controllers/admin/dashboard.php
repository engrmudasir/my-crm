<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {

        parent::__construct();
        
       if (!$this->session->userdata('adminId')) {
            redirect('admin/login');
        }
    }

	
	public function index()
	{
           
        
        $data['title']  =   'Dashboard';
        $data['contents']   = $this->load->view('admin/dashboard','',true);

        $this->load->view('admin/template',$data);
	}
}
