<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // if (!($this->session->userdata('id'))) {
        //     redirect('login');
        // }
        $this->load->library('paypal_lib');
        $this->load->model('product');
    }

    public function index()
    {
        $this->load->view('products/index');
    }

    public function getAllProducts()
    {
        $result = $this->product->getrows();
        if ($result['status'] == 200) {
            $html = "";
            foreach ($result['data'] as $key => $value) {
                $html .= "<tr>" .
                    "<td>" . $value['id'] . "</td>" .
                    "<td>" . $value['name'] . "</td>" .
                    "<td>" . $value['price'] . "</td>" .
                    "<td>" . "<a href='" . base_url('paymentGateway/products/buy/?id=') . $value['id'] . "'>Buy now</a>" . "</td>" .
                    "</tr>";
            }
            $result['data'] = $html;
        }
        echo json_encode($result);
    }

    public function buy()
    {

        /* setting variable for paypal */
        $returnUrl = base_url('paymentGateway/paypal/success');      //payment success
        $cancelUrl = base_url('paymentGateway/paypal/cancel');      //payment cancel
        $notifyUrl = base_url('paymentGateway/paypal/ipn');      //ipn

        $product = $this->product->getrow($this->input->GET('id'));

        // Get current user ID from the session (optional) 
        $userID = !empty($this->session->userdata('id'))?$this->session->userdata('id'):24; 

        // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnUrl);
        $this->paypal_lib->add_field('cancel_return', $cancelUrl);
        $this->paypal_lib->add_field('notify_url', $notifyUrl);
        $this->paypal_lib->add_field('item_name', $product['name']);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $product['id']);
        $this->paypal_lib->add_field('amount',  $product['price']);

        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 
    }
}
