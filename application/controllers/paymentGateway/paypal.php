<?php
defined('BASEPATH') or exit('No direct script access allowed');

class paypal extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // if (!($this->session->userdata('id'))) {
        //     redirect('login');
        // }
        $this->load->library('paypal_lib');
        $this->load->model('product');
        $this->load->model('product');
    }

    public function cancel()
    {
        $this->load->view('products/cancel');
    }

    public function success()
    {
        // Get the transaction data 
        // $paypalInfo1 = $this->input->get();
        $paypalInfo = $this->input->post();

        $productData = $paymentData = array();
        if (!empty($paypalInfo['item_number']) && !empty($paypalInfo['txn_id']) && !empty($paypalInfo['payment_gross']) && !empty($paypalInfo['mc_currency']) && !empty($paypalInfo['st'])) {
            $item_name = $paypalInfo['item_name'];
            $item_number = $paypalInfo['item_number'];
            $txn_id = $paypalInfo["txn_id"];
            $payment_amt = $paypalInfo["payment_gross"];
            $currency_code = $paypalInfo["mc_currency"];
            $status = $paypalInfo["payment_status"];

            // Get product info from the database 
            $productData = $this->product->getRow($item_number);

            // Check if transaction data exists with the same TXN ID 
            $paymentData = $this->payment->getPayment(array('txn_id' => $txn_id));
        }

        // Pass the transaction data to view 
        $data['product'] = $productData;
        $data['payment'] = $paymentData;
        $this->load->view('products/success', $data);
    }

    // 990508.

    public function ipn()
    {
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post();
        $paypalInfo = $this->input->get();
        print_r($paypalInfo);
        print_r($paypalInfo1);
        exit;

        if (!empty($paypalInfo)) {
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid 
            if ($ipnCheck) {
                // Check whether the transaction data is exists 
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"]));
                if (!$prevPayment) {
                    // Insert the transaction data in the database 
                    $data['user_id']    = $paypalInfo["custom"];
                    $data['product_id']    = $paypalInfo["item_number"];
                    $data['txn_id']    = $paypalInfo["txn_id"];
                    $data['payment_gross']    = $paypalInfo["mc_gross"];
                    $data['currency_code']    = $paypalInfo["mc_currency"];
                    $data['payer_name']    = trim($paypalInfo["first_name"] . ' ' . $paypalInfo["last_name"], ' ');
                    $data['payer_email']    = $paypalInfo["payer_email"];
                    $data['status'] = $paypalInfo["payment_status"];

                    $this->payment->insertTransaction($data);
                }
            }
        }
    }
}
