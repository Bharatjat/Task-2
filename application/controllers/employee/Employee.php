<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    if (!($this->session->userdata('id'))) {
      redirect('login');
    }
    $this->load->model('EmployeeModel');
  }

  /* this is an index function to load the employ home page */
  public function index()
  {
    $this->load->view('employee/employee');
  }

  /* this function is to load all details that are available in the database */
  public function viewAll()
  {
    $result = $this->EmployeeModel->viewAll();
    echo json_encode($result);
  }


  /* filled detail controller  */
  public function fillDetail()
  {
    /* checking if any file is selected */
    if (!empty($_FILES)) {

      /* counting number of file and storing that number in a variable */
      $filecount = count($_FILES['userfile']['name']);

      /* looping in file to upload */
      for ($i = 0; $i < $filecount; $i++) {

        /* putting input file in another place */
        $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
        $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
        $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];

        /* configuration of file */
        $config['upload_path'] = './assets/images';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        

        /* loading and initiating upload library */
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        /* uploading file  and stooring file name in a variable */
        if ($this->upload->do_upload("file")) {
          $fileData = $this->upload->data();
          $uploadData[$i] = $fileData['file_name'];
        } else {
          return false;
        }
      }
    }

    /* taking all the input from user */
    $data = array(
      'role' => $this->input->POST('role'),
      'type' => $this->input->post('type'),
      'date_of_joining' => $this->input->post('dateOfJoining'),
      'job_location' => $this->input->post('jobLocation'),
      'active' => $this->input->post('active')
    );

    /* storing upladed file in $data in a string formate */
    if (!empty($uploadData)) {
      $data['files'] = implode(', ', $uploadData);
    }

    /* storing all selected in $data in a string formate */
    if (!empty($this->input->post('skill'))) {
      $data['skill'] = implode(', ', $this->input->post('skill'));
    }

    $result = $this->EmployeeModel->fillDetails($data);
    echo json_encode($result);
  }

  /* this function is to add  new employee  */
  public function addEmployee()
  {
    $result = $this->EmployeeModel->addEmployee();
    echo json_encode($result);
  }

  /* this function is to get selected employee detail  */
  public function selectedEmployeeDetails()
  {
    $result = $this->EmployeeModel->selectedEmployeeDetails();
    echo json_encode($result);
  }

  public function doUpload()
  {
    $config['upload_path'] = './assets/images';
    $config['encript_name'] = TRUE;

    $this->load->library('upload', $config);
  }
}
