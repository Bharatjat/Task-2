<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function viewAll()
    {
        // $this->db->select('id, name, type, skill, files, role, job_location');
        $this->db->order_by('id');
        $query = $this->db->get('user_details');

        /* id data inserted the if will run */
        if ($this->db->affected_rows()) {
            return array(
                'data' => $query->result_array(),
                'status' => 200
            );
        } else {
            return array(
                'data' => 'internal server error',
                'status' => 400
            );
        }
    }

    /* adding a new user */
    public function addNewUser()
    {
        /* getting data ready to insert in database */
        $data = array(
            'name' => $this->input->post('name'),
            'age' => $this->input->post('age'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'gender' => $this->input->post('Gender'),
            'postal_code' => $this->input->post('postalCode')
        );

        /* inserting data into database */
        $this->db->insert('user_details', $data);

        /* handeling response */
        if (($this->db->affected_rows()) == 1) {
            return array(
                'data' => 'Data inserted successfully',
                'status' => 200
            );
        } else {
            return array(
                'data' => 'internal server error',
                'status' => 400
            );
        }
    }

    /* search */
    public function searchUserDetail()
    {
        /* search valur is stored in a varibale */
        $search = $this->input->post('search');

        /* checking if search bar is empty or not */
        if (strlen($search) == 0) {

            /* return empty if search value is not present */
            return array(
                'data' => 'empty',
                'status' => 200
            );
        } else {

            $query = $this->db
                ->select()
                // ->like('id', $search)
                ->like('name', $search)
                ->or_like('age', $search)
                ->or_like('country', $search)
                ->or_like('state', $search)
                ->or_like('city', $search)
                ->or_like('gender', $search)
                ->or_like('postal_code', $search)
                ->get('user_details');

            /* handeling response */
            if (($this->db->affected_rows()) == 1) {
                return array(
                    'data' => $query->result_array(),
                    'status' => 200
                );
            }
        }
    }
}
