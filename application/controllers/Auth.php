<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function login() {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->UserModel->check_user($email,$password);
            if (is_array($user)) {
                // Set session data
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('email', $user['email']);

                // Redirect to dashboard
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('auth/login');
            }
        }
        $this->load->view('auth/login');
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
