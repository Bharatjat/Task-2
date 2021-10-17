<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function verified()
    {
        $this->load->library('session');
        if (!($this->session->userdata('id'))) {
            redirect('Home/login');
        }
        $this->load->view('home');
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        redirect('Home');
    }
}
