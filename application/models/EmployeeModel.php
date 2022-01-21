<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeModel extends CI_Model
{
    public function viewAll()
    {
        /* this is the query to featch all the data of he login user */
        $this->db->select('id, name, type, skill, files, role, job_location');
        $this->db->order_by('id');
        $query = $this->db->get_where(
            'employee',
            array(
                'user_id' => $this->session->userdata('id')
            )
        );

        /* if the query return any data then it go in if but if query does not return any data then it go in else */
        if ($this->db->affected_rows()) {

            /* storing query data in a variable in array formate */
            $query = $query->result_array();

            /* this variable is to store process datatable data in it  */
            $result = array();

            /* this variable is to give indexing in the data it start with 1 */
            $i = 1;


            /* processing query data in result variable */
            foreach ($query as $key => $value) {

                $button = "<a class='btn btn-info item-fill' data='" . $value["id"] . "'>Fill details</a>";
                if (!empty($value['files'])) {
                    $temp = [''];
                    $files = null;
                    $temp = explode(", ", $value['files']);
                    foreach ($temp as $k => $v) {
                        $files .= "$k <a href='" . base_url("assets/images/$v") . "' target=\"_blank\"> " . $v . "</a> <br> ";
                    }
                }

                $result['data'][$key] = array(
                    $i++,
                    $value['name'],
                    $value['type'],
                    $value['role'],
                    $value['skill'],
                    $files,
                    $value['job_location'],
                    $button
                );
                $temp = [''];
                $files = null;
            }

            /* returning processed data */
            return $result;
        } else {
            return false;
        }
    }

    public function fillDetails($data)
    {
        /* taking id in a variable on which update will he done */
        $id = $this->input->POST('id');

        /* this is an update query  */
        $this->db->where(array('id' => $id));
        $this->db->update('employee', $data);

        if (($this->db->affected_rows()) > 0) {
            return true;
        } else {
            return false;
        }
    }


    /* this function is to add a new employee */
    public function addEmployee()
    {
        /* taking input from user input form and storing it in a variable */
        $data = array(
            'name' => $this->input->POST('name', true),
            'user_id' => $this->session->userdata('id')
        );

        $this->db->insert('employee', $data);
        if (($this->db->affected_rows()) == 1) {
            return TRUE;
        } else {
            return False;
        }
    }

    public function selectedEmployeeDetails()
    {
        /* taking id from user to perform view operation */
        $id = $this->input->POST('id', true);

        $query = $this->db->get_where(
            'employee',
            array(
                'id' => $id,
                'user_id' => $this->session->userdata('id')
            )
        );
        if ($this->db->affected_rows()) {

            /* this is to return all data in array formate */
            return $query->result_array()['0'];
        } else {

            /* if some thing went wrong then it will return false */
            return false;
        }
    }
}
