<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Chef extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if (!($this->session->userdata('id'))) {
			redirect('login');
		}
		$this->load->model('ChefModel');
	}

	/* view page loading */
	public function index()
	{
		$this->load->view('choose');
	}

	/* purpose(get some data of all chef data from database) return details of chef */
	public function getAllChefData()
	{
		$result = $this->ChefModel->getAllChefData();
		if ($result['status'] == 200) {
			$html = "";
			// echo "<pre>";
			// print_r($result);
			// exit;
			foreach ($result['data'] as $key => $value) {
				$html .= "<tr>" .
					"<td>" . $value['id'] . "</td>" .
					"<td><button class='btn btn-outline-info view' data='" . $value['id'] . "'>" . $value['name'] . "</button></td>" .
					"<td>" . $value['address'] . "</td>" .
					"<td>" . $value['total_experience'] . "</td>" .
					"<td>" . $value['cuisines_name'] . "</td>" .
					"<td> <a href='" . base_url("assets/images/") . $value['portfolio'] . "' target=\"_blank\"> " . $value['portfolio'] . "</a> </td> " .
					"</td>";
			}
			$result['data'] = $html;
			echo json_encode($result);
		} else {
			echo json_encode($result);
		}
	}

	public function viewData()
	{
		$result = $this->ChefModel->viewData();
		echo json_encode($result);
	}

	/* purpose(get all level of chef) return chef level in html formate*/
	public function getLevel()
	{
		$result = $this->ChefModel->getLevel();
		if ($result['status'] == 200) {
			$html = "";
			foreach ($result['data'] as $value) {
				$html .= "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
			}
			$result['data'] = $html;
		}
		echo json_encode($result);
	}

	/* purpose(get all cuisines of chef) return it in html formate */
	public function getCuisines()
	{
		$result = $this->ChefModel->getCuisines();
		if ($result['status'] == 200) {
			$html = "";
			foreach ($result['data'] as $value) {
				$html .= "<input type='checkbox' id='cuisines" . $value['id'] . "' name='cuisines[]' class='checkbox' value='" . $value['id'] . "'>
				<label for='cuisines" . $value['id'] . "'> " . $value['name'] . "</label><br>";
			}
			$result['data'] = $html;
		}
		echo json_encode($result);
	}

	public function maxNoPeopleServe()
	{
		$result = $this->ChefModel->maxNoPeopleServe();
		echo json_encode($result);
	}

	/* purpose(get all qualification of chef) return it in html formate */
	public function getqualifications()
	{
		$result = $this->ChefModel->getqualifications();
		if ($result['status'] == 200) {
			$html = "";
			foreach ($result['data'] as $value) {
				$html .= "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
			}
			$result['data'] = $html;
		}
		echo json_encode($result);
	}

	/* saving chef */
	public function saveChef()
	{
		$uploadedName = array();
		/* checking if any profile pic is selected */
		if (!empty($_FILES['profilePic'])) {

			$config['upload_path'] = "./assets/images";
			$config['allowed_types'] = 'gif|jpg|png|pdf';
			$this->load->library('upload', $config);

			/* uploading file  and stooring file name in a variable */
			if ($this->upload->do_upload("profilePic")) {
				$fileData = $this->upload->data();
				$uploadedName['profile_pic'] = $fileData['file_name'];
			} else {
				echo json_encode(array(
					'data' => $this->upload->display_errors(),
					'status' => 400
				));
				exit;
			}
		}

		/* checking is any portfolio is selected */
		if (!empty($_FILES['portfolio'])) {

			$config['upload_path'] = "./assets/images";
			$config['allowed_types'] = 'gif|jpg|png|pdf';
			$this->load->library('upload', $config);

			/* uploading file  and stooring file name in a variable */
			if ($this->upload->do_upload("portfolio")) {
				$fileData = $this->upload->data();
				$uploadedName['portfolio'] = $fileData['file_name'];
			} else {
				echo json_encode(array(
					'data' => $this->upload->display_errors(),
					'status' => 400
				));
				exit;
			}
		}

		$result = $this->ChefModel->saveChef($uploadedName);
		echo json_encode($result);
	}

	// edit
	public function editChef()
	{
	}
}
