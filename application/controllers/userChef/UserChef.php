<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class UserChef extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!($this->session->userdata('id'))) {
            redirect('login');
        }
        $this->load->model('UserChefModel');
    }

    public function index()
    {
        $this->load->view('userChef');
    }

    /* loading chef list if any chef is found according to user choose */
    public function loadChefForEvent()
    {
        $result = $this->UserChefModel->loadChefForEvent();
        if ($result['status'] == 200) {
            $html = "";
            foreach ($result['data'] as $value) {
                $html .= "<input type='radio' id='cuisines" . $value['id'] . "' data-rate='" . $value['rate_per_hour'] . "' name='chef' class='form-check-input eventChefList' value='" . $value['id'] . "'>
				<label class='form-check-label' for='cuisines" . $value['id'] . "'> " . $value['name'] . "</label><a href='" . base_url("assets/images/") . $value['portfolio'] . "' target=\"_blank\"> " . $value['portfolio'] . "</a><br>";
            }
            $result['data'] = $html;
        }
        echo json_encode($result);
    }

    /* creating event */
    public function saveChefEvent()
    {
        $result = $this->UserChefModel->saveChefEvent();

        echo json_encode($result);
    }

    public function getAllUserChefEvent()
    {
        $result = $this->UserChefModel->getAllUserChefEvent();
        print_r($result);
        exit;
        if ($result['status'] == 200) {
            $html = "";
            $f = 0;
            foreach ($result['data'] as $key => $value) {
                $html .= "<tr>" .
                    "<td>" . $f++ . "</td>" .
                    "<td>" . $value['address'] . "</td>" .
                    "<td>" . $value['event_date'] . "</td>" .
                    "<td>" . $value['name'] . "</td>" .
                    "<td>" . $value['duration'] . "</td>" .
                    "<td>" . $value['no_of_people'] . "</td>" .
                    "</tr>";
            }
            $result['data'] = $html;
        }
        echo json_encode($result);
    }
}
