<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserChefModel extends CI_Model
{
    public function loadChefForEvent()
    {
        $this->db->select('chef.id, chef.name, chef.portfolio, chef.rate_per_hour')
            ->from('chef')
            ->join('chef_cuisines', 'chef.id = chef_cuisines.chef_id', 'left')
            ->where(array('chef.city' => $this->input->POST('city'), 'chef.max_no_people_serve >=' => $this->input->POST('noOfPeople')))
            ->where_in('chef_cuisines.cuisines_id', $this->input->POST('cuisines'));
        $query = $this->db->get();

        if ($this->db->affected_rows()) {
            $data =  $query->result_array();

            // foreach ($data as $key1 => $value1) {
            //     foreach ($this->input->POST('cuisines') as $key2 => $value2) {
            //         $this->db->select('cuisines_id')->from('chef_cuisines')->where(array('chef_id'=>$value1,'cuisines_id'=> $value2));
            //         if ($this->db->affected_row()) {
            //             print_r($query->result_array());
            //         }else{

            //         }
            //     }
            // }
            // exit;

            $chefsId = array_column($data, 'id');
            $query = $this->db->select('id, chef_id, event_date, duration')->where_in('chef_id', $chefsId)->get('event');
            if ($this->db->affected_rows()) {
                $eventChefIdToDelete = [];
                foreach ($query->result_array() as $key => $value) {
                    $eventDateTime = $value['event_date'];      //time on which event is started 
                    $eventDuration = $value['duration'];        //till how much time event will run
                    $eventRestDateTime = date("Y-m-d H:i:s", strtotime("+2 hours $eventDateTime"));         //time to take rest after any event
                    $EventEndDateTime =  date("Y-m-d H:i:s", strtotime("+$eventDuration hours $eventRestDateTime"));
                    $userInputEventDateTime = str_replace("T", " ", $this->input->POST('datetime')) . ":00";
                    if ($userInputEventDateTime >= $EventEndDateTime) {
                    } else {
                        $eventChefIdToDelete[$key] = $value['chef_id'];
                    }
                }
                if ($eventChefIdToDelete) {
                    foreach ($eventChefIdToDelete as $key1 => $value1) {
                        foreach ($data as $key2 => $value2) {
                            if ($value1 == $value2['id']) {
                                $data[$key2] = '';
                            }
                        }
                    }
                }

                /* to remove any dublicasy from array */
                $temp = array_unique(array_column(array_filter($data), 'name'));
                $unique_arr = array_intersect_key(array_filter($data), $temp);


                return array(
                    'data' => $unique_arr,
                    'status' => 200
                );
            } else {
                return array(
                    'data' => $data,
                    'status' => 200
                );
            }
        } else {
            return array(
                'data' => 'error',
                'status' => 400
            );
        }
    }

    public function saveChefEvent()
    {
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'chef_id' => $this->input->POST('chef'),
            'name' => $this->input->POST('name'),
            'name' => $this->input->POST('pincode'),
            'no_of_people' => $this->input->POST('noOfPeople'),
            'event_date' => $this->input->POST('datetime'),
            'duration' => $this->input->POST('noOfHours'),
            'address' => $this->input->POST('address'),
            'country' => $this->input->POST('country'),
            'state' => $this->input->POST('State'),
            'city' => $this->input->POST('city'),
            'total_amount' => $this->input->POST('subTotal'),
            'sub_total' => $this->input->POST('grandTotal'),
            'tax_amount' => 18
        );

        /* inserting data in chef table */
        $this->db->insert('event', $data);

        /* checking if data is inserted or not */
        if ($this->db->affected_rows()) {
            /* returning success message */
            return array(
                'data' => 'Data inserted successfully',
                'status' => 200
            );
        } else {

            /* return faill message if chef is not created */
            return array(
                'data' => 'internal server error',
                'status' => 400
            );
        }
    }

    public function getAllUserChefEvent()
    {
        $this->db->select('event.address, event.event_date, event.no_of_people, event.duration, event.chef_id, chef.name')
            ->from('event')
            ->join('chef', 'event.chef_id = chef.id')
            ->where('event.user_id', $this->session->userdata('id'));

        $query = $this->db->get();

        /* checking if data is retreved or not */
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
}
