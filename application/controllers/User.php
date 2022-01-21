<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('UserModel');
    }

    public function index()
    {
        $this->load->view();
    }
}

