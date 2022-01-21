<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model
{
    public function getrows()
    {
        $query = $this->db->get('products');

        if ($this->db->affected_rows()) {
            /* returning success message */
            return array(
                'data' => $query->result_array(),
                'status' => 200
            );
        } else {

            /* return faill message if chef is not created */
            return array(
                'data' => 'internal server error or no data found!',
                'status' => 400
            );
        }
    }

    // public function success()
    // {

    //     $paypalInfo = $this->input->get();
    //     print_r($paypalInfo);
    //     exit;

    //     $data['user_id'] = $this->session->userdata('id');
    //     $data['item_number'] = $paypalInfo['item_number'];
    //     $data['txn_id'] = $paypalInfo["tx"];
    //     $data['payment_gross'] = $paypalInfo["amt"];
    //     $data['currency_code'] = $paypalInfo["cc"];
    //     $data['status'] = $paypalInfo["st"];

    //     /* inserting data into database */
    //     $this->db->insert('payments', $data);
    // }

    public function getrow($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->result_array()[0];
    }
}
