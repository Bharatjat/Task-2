<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    /* this function take a subject name and check if it is there in db 
    if it is there then it return all information about that subject */
    public function search()
    {
        /* taking input from user search bar and storing it in a variable */
        $searchValue = $this->input->POST('searchvalue', true);

        $query = $this->db->query("SELECT * FROM `subjects` WHERE `name` = $searchValue");
        if ($this->db->affected_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    /* this function does not take any input but return all active record from the database */
    public function View_all()
    {
        $this->db->select('id, name, description, time_allocated, room_no');
        $this->db->order_by('id');
        $query = $this->db->get_where(
            'subjects',
            array(
                'status' => '1',
                'user_id' => $this->session->userdata('id')
            )
        );
        if ($this->db->affected_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    /* this is a delete function it take subject id and change its status from 1(active) to 0(unactive) */
    public function Delete()
    {
        /* taking id from user to perform delete operation */
        $id = $this->input->POST('id', true);

        $this->db->where(array('id' => $id, 'status' => 1));
        $this->db->update(
            'subjects',
            array(
                'status' => 0,
                'user_id' => $this->session->userdata('id')
            )
        );

        if (($this->db->affected_rows()) == 1) {
            return TRUE;
        } else {
            return False;
        }
    }

    /* this function check if new inserting record is unique if so then save or to return a message */
    public function addSubject()
    {
        /* getting all user input value in a array */
        $data = array(
            'name' => $this->input->POST('subjectName'),
            'user_id' => $this->session->userdata('id'),
            'description' => $this->input->post('discription'),
            'time_allocated' => $this->input->post('time'),
            'number_of_student' => $this->input->post('noOfStudent'),
            'room_no' => $this->input->post('roomNo')
        );

        /* checkig if subject is unique and if not then return a message */
        $this->db->get_where(
            'subjects',
            array(
                'name' => $data['name'],
                'status' => 1
            )
        );
        /* if subject is not unique then message will be send from if condition */
        if ($this->db->affected_rows()) {
            return "This subject is already taken.";
        } else {

            /* if subject is not unique then it will be store in database 
            and its response will be return to ghe controller */
            $this->db->insert('subjects', $data);
            if (($this->db->affected_rows()) == 1) {
                return TRUE;
            } else {
                return False;
            }
        }
    }

    /* this function return selected id all information  */
    public function viewSelectedData()
    {
        /* taking id from user to perform view operation */
        $id = $this->input->POST('id', true);

        $this->db->select('*');
        $query = $this->db->get_where(
            'subjects',
            array(
                'id' => $id,
                'user_id' => $this->session->userdata('id')
            )
        );
        if ($this->db->affected_rows()) {

            /* this is to return all data in array formate */
            return $query->result_array();
        } else {

            /* if some thing went wrong then it will return false */
            return false;
        }
    }

    /* this function is to update subject details and check if subject is unique or not */
    public function updateSelectedData()
    {
        /* getting all user input value in a array */
        $id = $this->input->POST('subjectId');

        /* storing all input data in a array */
        $data = array(
            'name' => $this->input->post('subjectName'),
            'description' => $this->input->post('discription'),
            'time_allocated' => $this->input->post('time'),
            'number_of_student' => $this->input->post('noOfStudent'),
            'room_no' => $this->input->post('roomNo')
        );


        /* checkig if subject is unique and if not then return a message */
        $this->db->select('id');
        $query = $this->db->get_where(
            'subjects',
            array(
                'name' => $data['name'],
                'status' => 1,
                'user_id' => $this->session->userdata('id')
            )
        );

        /* checking if subject is unique or is matched with its old name */
        if ($query->result_array()['0']['id'] == $id) {
            $this->db->where(array('id' => $id));
            $this->db->update('subjects', $data);
            if (($this->db->affected_rows()) > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return "This subject is already taken.";
        }
    }

    /* this function is to send data by taking input of id for download purpose */
    public function getDataById($ids)
    {
        $returnData = array();      //return data is stored in this variable
        $temp =array();             //its for tempary data which we get from database

        /* getting data from database */
        foreach ($ids as $id) {
            $query = $this->db->get_where('subjects',array('id' => $id));
            array_push($temp,$query->result_array());
        };

        /* formating data in a particular array formate */
        for ($i=0; $i < sizeof($ids); $i++) { 
            array_push($returnData,$temp[$i][0]);
        }

        /* return data in array formate */
        return $returnData;
    }
}
