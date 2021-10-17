<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validation extends CI_Model
{
    public function sign_up($data)                          //This function is used to insert new user with inactive status
    {
        if ($this->db->insert('project1', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login($data)
    {
        $query = NULL;
        if (strstr($data['EmailOrName'], '@')) {            //This method is to identify that user has use email in login 
            $this->db->select('id');
            $this->db->where(['email' => $data['EmailOrName'], 'password' => $data['pass'], 'status' => 1]);
            $query = $this->db->get('project1')->result_array();
            if ($query != NULL) {                           //This method will run when user is valid and active
                return $query[0]['id'];
            } else {                                        //This method will run when user is either inactive or in valid
                $this->db->where(['email' => $data['EmailOrName'], 'password' => $data['pass'], 'status' => 0]);
                $query = $this->db->get('project1')->num_rows();
                if ($query != NULL) {                       //This method will run when user is there but inactive
                    return "unverified";
                } else {                                       //This method will run when no user is found
                    return "unmatch";
                }
            }
        } else {                                            //This method will run when user has use name in login
            $this->db->select('id');
            $this->db->where(['name' => $data['EmailOrName'], 'password' => $data['pass'], 'status' => 1]);
            $query = $this->db->get('project1')->result_array();
            if ($query != NULL) {                           //This method will run when user is valid and active
                return $query[0]['id'];
            } else {                                        //This method will run when user is either inactive or in valid
                $this->db->where(['name' => $data['EmailOrName'], 'password' => $data['pass'], 'status' => 0]);
                $query = $this->db->get('project1')->num_rows();
                if ($query != NULL) {                       //This method will run when user is there but inactive
                    return "unverified";
                } else {                                       //This method will run when no user is found
                    return "unmatch";
                }
            }
        }
    }

    public function ValidateToken($t)               //This function is to validate that user has a rignt and valid token
    {
        $query = NULL;
        $this->db->where(array('token'=> $t, 'status' => 0));
        $this->db->update('project1', array('status' => 1));
        $query = $this->db->affected_rows();
        if ($query == 1) {
            return TRUE;
        } else {
            return False;
        }
    }

    public function ResetPasswordMail($data)
    {
        $query = NULL;
        $this->db->where(array('email'=> $data['email'], 'status' => 1));
        $this->db->update('project1', array('token' => $data['token']));
        $query = $this->db->affected_rows();
        if ($query == 1) {
            return TRUE;
        } else {
            return False;
        }
    }

    public function CheckUserToken($t)
    {
        $query = NULL;
        $this->db->select('email');
        $this->db->where(array('token'=> $t, 'status' => 1));
        $query = $this->db->get('project1')->result_array();
        if ($query != NULL) {
            return $query[0]['email'];
        }else{
            return FALSE;
        }
    }   
    public function SaveUserPassword($data)
    {
        $query = NULL;
        $this->db->where(array('email'=>$data['email']));
        $this->db->update('project1', array('password'=>$data['password']));
        $query = $this->db->affected_rows();
        if ($query == 1) {
            return TRUE;
        } else {
            return False;
        }
    } 
}
