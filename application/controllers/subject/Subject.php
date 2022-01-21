<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject extends CI_Controller
{
  /* this constructor is to check if user is login or not using session if not login then redirect to login page */
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    if (!($this->session->userdata('id'))) {
      redirect('login');
    }
    $this->load->model('SubjectModel');
  }

  /* this is the index page where user will be redirected after login this function is to load a view */
  public function index()
  {
    $this->load->view('subjectDetails/home');
  }

  /* this function is to hendal api search request */
  public function searchSubject()
  {
    $result =  $this->UserModel->search();
    echo json_encode($result);
  }

  /* this function is to hendal api view all record request */
  public function ViewAll()
  {
    $result =  $this->UserModel->View_all();
    echo json_encode($result);
  }

  /* this function is to hendal api delete row request */
  public function delete()
  {
    $result =  $this->UserModel->Delete();
    echo json_encode($result);
  }

  /* this function is to hendal api add a new subjsct request */
  public function addSubject()
  {
    $result =  $this->UserModel->addSubject();
    echo json_encode($result);
  }

  /* this function is to hendal api view selected row request */
  public function viewSelectedData()
  {
    $result =  $this->UserModel->viewSelectedData();
    echo json_encode($result);
  }

  /* this function is to update subject details */
  public function updateSelectedData()
  {
    $result =  $this->UserModel->updateSelectedData();
    echo json_encode($result);
  }
}
