<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    /* this constructor is to check if user is login or not using session if not login then redirect to login page */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!($this->session->userdata('id'))) {
            redirect('login');
        }
        $this->load->model('UserModel');
    }

    public function index()
    {
        /* loading captcha helper */
        $this->load->helper('captcha');

        /* configeration of codeigniter captcha helper */
        $vals = array(
            // 'word'          => 'Random word',
            'img_path'      => './captcha_images/',
            'img_url'       => base_url() . 'captcha_images/',
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);
        $img = $cap['image'];
        $captchaWord = $cap['word'];
        $this->session->set_userdata('captchaWord',$captchaWord);

        /* calling view and passing captcha image in it */
        $this->load->view('user/User',['captchaImage' => $img]);
    }

    /* getting all data from database */
    public function viewAll()
    {
        $result = $this->UserModel->viewAll();
        if ($result['status'] == 200) {
            $html = '';
            foreach ($result['data'] as $value) {
                $html .= "<tr>" .
                    "<td>" . $value['id'] . "</td>" .
                    "<td>" . $value['name'] . "</td>" .
                    "<td>" . $value['country'] . "</td>" .
                    "<td>" . $value['state'] . "</td>" .
                    "<td>" . $value['city'] . "</td>" .
                    "<td>" . $value['gender'] . "</td>" .
                    "<td>" . $value['age'] . "</td>" .
                    "<td>" . $value['postal_code'] . "</td>" .
                    "</td>";
            }
            $result['data'] = $html;
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    /* loading all passed data in a html formate and returning it */
    function loadData($data)
    {
        $html = '';
        foreach ($data as $value) {
            $html .= "<tr>" .
                "<td>" . $value['id'] . "</td>" .
                "<td>" . $value['name'] . "</td>" .
                "<td>" . $value['country'] . "</td>" .
                "<td>" . $value['state'] . "</td>" .
                "<td>" . $value['city'] . "</td>" .
                "<td>" . $value['gender'] . "</td>" .
                "<td>" . $value['age'] . "</td>" .
                "<td>" . $value['postal_code'] . "</td>" .
                "</td>";
        }
        return $html;
    }

    /* new user adding */
    public function addNewUser()
    {
        $result = $this->UserModel->addNewUser();
        echo json_encode($result);
    }

    /* search */
    public function searchUserDetail()
    {
        $result = $this->UserModel->searchUserDetail();
        if ($result['status'] == 200 && $result['data'] != 'empty') {
            $html = '';
            foreach ($result['data'] as $value) {
                $html .= "<tr>" .
                    "<td>" . $value['id'] . "</td>" .
                    "<td>" . $value['name'] . "</td>" .
                    "<td>" . $value['country'] . "</td>" .
                    "<td>" . $value['state'] . "</td>" .
                    "<td>" . $value['city'] . "</td>" .
                    "<td>" . $value['gender'] . "</td>" .
                    "<td>" . $value['age'] . "</td>" .
                    "<td>" . $value['postal_code'] . "</td>" .
                    "</td>";
            }
            $result['data'] = $html;
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }
}
