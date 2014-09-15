<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
       
        $this->load->model('admin/admin_model');
        
    }

    function index() {
        if ($this->session->userdata('adminId') != '') {
            redirect('admin/dashboard');
        }

        $this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txt_password', 'Password', 'trim|required|callback_check_admin');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/login');
        } else {
            $email = $this->input->post('txt_email');
            $password = $this->input->post('txt_password');

            $result = $this->admin_model->chk_admin($email, $password);
            if ($result->num_rows() > 0) {
                foreach ($result->result_array() as $row) {
                    $this->session->set_userdata('adminId', $row['adminId']);
                    $this->session->set_userdata('email', $row['email']);
                    //$this->session->set_userdata('admin_type', $row['role']);
                    $this->session->set_userdata('first_name', $row['first_name']);
                    $this->session->set_userdata('last_name', $row['last_name']);
                    $this->session->set_userdata('user_name', $row['user_name']);
                }
                //print_r($this->session->all_userdata());exit();
                redirect('admin/dashboard');
            } else {
                redirect('admin/login');
            }
        }
    }

    function check_admin() {
        $email = $this->input->post('txt_email');
        $password = $this->input->post('txt_password');

        $result = $this->admin_model->chk_admin($email, $password);
        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_admin', 'Error: Wrong Email OR Password');
            return FALSE;
        }
    }

    function logout() {
        $this->session->set_userdata('adminId', '');
        $this->session->set_userdata('email', '');
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    function forgot_password() {

        $this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email');


        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/forgot_password');
        } else {
            $email = $this->input->post('txt_email');
            $result = $this->admin_model->chk_email($email);
            if ($result->num_rows() > 0) {
                $record = $result->row_array();
                $admin_email = $record['email'];
                $admin_pasword = $record['password'];
                $this->forgot_password_mail($admin_email, $admin_pasword);
                $this->session->set_userdata('admin_msg', 'Your Password send successfully');
                $this->load->view('admin/forgot_password');
            } else {
                $this->session->set_userdata('admin_msg', 'Eamil address you provide is wrong!');
                $this->load->view('admin/forgot_password');
            }
        }
    }

    function forgot_password_mail($admin_email, $admin_pasword) {
        $this->load->model('admin/template_model');
        $this->load->library('phpmailer');

        $template = $this->template_model->get_template(41);
        $template_result = $template->row_array();

        $subject = $template_result['email_title'];
        $message = $template_result['email_detail'];

        $url = base_url() . "admin";

        $find = array("{user_email}", "{user_password}", "{login_url}");
        $replace = array($admin_email, $admin_pasword, $url);
        $new_mess = str_replace($find, $replace, $message);

        $this->phpmailer->AddAddress($admin_email);
        $this->phpmailer->IsMail();
        $this->phpmailer->From = $this->config->item('admin_email');
        $this->phpmailer->FromName = $this->config->item('admin_name');
        $this->phpmailer->IsHTML(true);
        $this->phpmailer->Subject = $subject;
        $this->phpmailer->Body = $new_mess;
        $this->phpmailer->Send();
    }

    function checkLogin() {
        if ($this->session->userdata('adminId') != '') {
            echo 'yes';
        } else {
            echo 'No';
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */