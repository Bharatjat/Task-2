<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChefModel extends CI_Model
{
    public function getLevel()
    {
        $this->db->order_by('id');
        $query = $this->db->get('chef_levels');
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

    public function getAllChefData()
    {
        // echo "<pre>";
        // $q = $this->db->query('SELECT cuisines_id FROM chef_cuisines, chef where chef.id = chef_cuisines.chef_id');
        // print_r($q->result_array());
        // exit;
        $this->db->select('id, name, total_experience, address, portfolio');
        $query = $this->db->get('chef');
        if ($this->db->affected_rows()) {

            $data = $query->result_array();

            foreach ($data as $key1 => $value1) {
                $data[$key1]['cuisines_name'] = '';
                $q = $this->db->select('cuisines_id')
                    ->get_where('chef_cuisines', array('chef_id' => $value1['id']));

                foreach ($q->result_array() as $key2 => $value2) {
                    $q = $this->db->select('name')
                        ->get_where('cuisine', array('id' => $value2['cuisines_id']));
                    $data[$key1]['cuisines_name'] .= $q->result_array()[0]['name'] . ', ';
                }
            }
            return array(
                'data' => $data,
                'status' => 200
            );
        } else {
            return array(
                'data' => 'internal server error',
                'status' => 400
            );
        }
    }

    public function viewData()
    {
        // echo "<pre>";
        $id = $this->input->GET('id');
        $query = $this->db->get_where('chef', array('id' => $id));

        if ($this->db->affected_rows()) {
            $data = $query->result_array()[0];

            // qualification
            $query = $this->db->query("SELECT qualifications.id FROM chef_qualifications, qualifications 
                        where chef_qualifications.chef_id = $id AND qualifications.id = chef_qualifications.qualifications_id");

            if ($query->result_array()) {
                $data['qualifications'] = $query->result_array()[0]['id'];
            }

            // cuisine
            $query = $this->db->query("SELECT cuisines_id FROM chef_cuisines WHERE chef_id = $id");

            if ($query->result_array()) {
                foreach ($query->result_array() as $key => $value) {
                    $data['cuisine_id'][$key] = $value['cuisines_id'];
                }
            }
            return array(
                'data' => $data,
                'status' => 200
            );
        } else {
            return array(
                'data' => 'internal server error',
                'status' => 400
            );
        }
    }

    public function getCuisines()
    {
        $this->db->order_by('id');
        $query = $this->db->get('cuisine');
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

    public function maxNoPeopleServe()
    {
        $id = $this->input->post('id');
        $this->db->where(array('chef_level_id' => $id));
        $query = $this->db->get('people_ranges');
        if ($this->db->affected_rows()) {
            return array(
                'data' => $query->result_array()[0]['max'],
                'status' => 200
            );
        } else {
            return array(
                'data' => 'internal server error',
                'status' => 400
            );
        }
    }

    public function getqualifications()
    {
        $this->db->order_by('id');
        $query = $this->db->get('qualifications');
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

    public function saveChef($uploadedName)
    {
        /* all chef table data is stored in this array */
        $chefData = array(
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('Gender'),
            'is_vaccinated' => $this->input->post('vaccinated'),
            'dob' => $this->input->post('dob'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'rate_per_hour' => $this->input->post('ratePerHour'),
            'total_experience' => $this->input->post('totalExperience'),
            'level_id' => $this->input->post('level'),
            'max_no_people_serve' => $this->input->post('maxNoPeopleServe'),
            'facebook_link' => $this->input->post('facebookLink'),
            'twitter_link' => $this->input->post('twitterLink'),
            'linkedin_link' => $this->input->post('linkedinLink'),
            'youtube_link' => $this->input->post('youtubeLink'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('State'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'description' => $this->input->post('discription')
        );

        /* setting chef language_spoken if user has selected any language's */
        if (!empty($this->input->POST('languages'))) {
            $chefData['language_spoken'] = implode(", ", $this->input->POST('languages'));
        }

        /* if profile pic is set then pushing it in chefData array */
        if (!empty($uploadedName['profile_pic'])) {
            $chefData['profile_pic'] = $uploadedName['profile_pic'];
        }

        /* if portfolio is set then pushing it in chefData array */
        if (!empty($uploadedName['portfolio'])) {
            $chefData['portfolio'] = $uploadedName['portfolio'];
        }

        /* inserting data in chef table */
        $this->db->insert('chef', $chefData);

        /* checking if data is inserted or not */
        if ($this->db->affected_rows()) {

            /* taking inserted chef id in a variable */
            $chefid = $this->db->insert_id();

            /* taking chef qualification inn an array along with chef id */
            $chefQualification = array(
                "chef_id" => $chefid,
                "qualifications_id" => $this->input->POST('qualifications')
            );

            /* storing chef qualification in chef_qualifications table */
            $this->db->insert('chef_qualifications', $chefQualification);

            /* this is to store chef cuisin data */
            foreach ($this->input->POST('cuisines') as $value) {

                /* this variable is to chef and cuisin relational values */
                $chefCusinData = array();

                /* setting chef and cuisin data in chefCuisinData array */
                $chefCusinData = array(
                    'chef_id' => $chefid,
                    'cuisines_id' => $value
                );

                /* inserting chef cuisin data in chef_cuisines table */
                $this->db->insert('chef_cuisines', $chefCusinData);
            }

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
}
