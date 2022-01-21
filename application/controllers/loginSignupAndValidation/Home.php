<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	
	/* this is to set initial value of token variable to null*/
	public $token = NULL;

	/* load login page */
	public function login()
	{
		$this->load->view('loginSignup/login');
	}

	/* load signup page */
	public function signUp()
	{
		$this->load->view('loginSignup/signUp');
	}

	/* this function is to logout user by deleting user session and redirecting it to dashbord */
    public function logout()
    {
        $this->session->unset_userdata('id');
        redirect('login');
    }

	/* validate user on signup time */
	public function validationUserRegistration()
	{
		$this->form_validation->set_rules('name', 'username', 'required|is_unique[user.name]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
		$this->form_validation->set_message('is_unique', 'the %s is already taken');
		$this->form_validation->set_message('required', '%s is required');
		if ($this->form_validation->run() == false) {
			$this->load->view('loginSignup/sign_up');
		} else {
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$now = date('Y-m-d H:i:s');
			$token = bin2hex(random_bytes(15));
			$data = array(
				"name" => $this->input->post('name', TRUE),
				"email" => $this->input->post('email', TRUE),
				"password" => $this->input->post('pass', TRUE),
				"address" => $this->input->post('address', TRUE),
				"gender" => $this->input->post('gender', TRUE),
				"token" => $token,
				"created_at" => $now
			);
			$this->load->model('Validation');
			$response = $this->Validation->sign_up($data);
			if ($response == TRUE) {
				$to = $this->input->post('email', TRUE);
				$from = 'Bjat123bk@gmail.com';
				$subject = 'This is a account verification mail';
				$emailContent = "To verify your account <br> click <a href=\"http://localhost/ci/ci1/Activate_User?token=$token\">hear</a> ";

				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '60';
				$config['smtp_user']    = 'bjat123bk@gmail.com';    //Important
				$config['smtp_pass']    = 'bharatsing';  //Important
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'html'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not 

				$this->email->initialize($config);
				$this->email->set_mailtype("html");
				$this->email->from($from);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($emailContent);
				if ($this->email->send()) {
					$this->session->set_flashdata('email_send_success', 'Verifie your account <br> check email to verification');
				} else {
					echo "something went wrong email not send";
				}
				redirect('login');
			} else {
				$error['sign_up_error'] = 'Something went wrong';
				$this->load->view('loginSignup/signup', $error);
			}
		}
	}

	/* validate user on login time */
	public function validationUserLogin()
	{
		$data = array(
			"EmailOrName" => $this->input->post('NameOrEmail', TRUE),
			"pass" => $this->input->post('pass', TRUE)
		);
		$this->load->model('Validation');
		$response = $this->Validation->login($data);
		if (is_numeric($response)) {
			$this->session->set_userdata('id', $response);
			$this->load->view('optionPage');
		} else {
			if ($response == 'unverified') {
				$this->session->set_flashdata('Email_unverified', '!Check your mail and verifiy your account.');
				$error['unverified'] = '!Check your mail and verifiy your account.';
				$this->load->view('loginSignup/login', $error);
			} elseif ($response == 'unmatch') {
				$this->session->set_flashdata('Email_unmatch', '!Wrong crediential');
				$error['unmatch'] = '!Wrong crediential';
				$this->load->view('loginSignup/login', $error);
			}
		}
	}

	/* activate user when varification link is been clicked */
	public function ActivateUser()
	{
		$t = $this->input->get('token', TRUE);
		$this->load->model('Validation');
		$response = $this->Validation->ValidateToken($t);
		if ($response == TRUE) {
			redirect('login');
		} else {
			echo "<error> something went wrong or email is envalid.</error>";
		}
	}

	/* load forget password page */
	public function ForgetPass()
	{
		$this->load->view('forgetCreatPassword/ForgetPassword');
	}

	/* sending reset password link to user mail */
	public function ResetPasswordMail()
	{
		$token = bin2hex(random_bytes(15));
		$data = array(
			'email' => $this->input->post('Email', TRUE),
			'token' => $token
		);
		$this->load->model('Validation');
		$response = $this->Validation->ResetPasswordMail($data);
		if ($response == TRUE) {
			$to = $this->input->post('Email', TRUE);
			$from = 'Bjat123bk@gmail.com';
			$subject = 'This is a account password changing mail';
			$emailContent = "To change your account password <br> click <a href=\"http://localhost/ci/ci1/Create_New_Password?token=$token\">hear</a> ";

			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '60';
			$config['smtp_user']    = 'bjat123bk@gmail.com';    //Important
			$config['smtp_pass']    = 'bharatsing';  //Important
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not 

			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->from($from);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($emailContent);
			if ($this->email->send()) {
				echo "email send successfully";
			} else {
				echo "something went wrong email not send";
			}
		} else {
		}
	}

	/* creating new password  */
	public function CreateNewPassword()
	{
		$t = $this->input->get('token', TRUE);
		$this->load->model('Validation');
		$response = $this->Validation->CheckUserToken($t);
		if ($response != FALSE) {
			$data = array('UserEmail' => $response);
			$this->load->view('forgetCreatPassword/CreateNewPassword',$data);
		} else {
			echo "Something went wrong";
		}
	}

	public function SaveNewPassword()
	{
		$data = array(
			'email' => $this->input->post('Email', TRUE),
			'password' => $this->input->post('password', TRUE)
		);
		$this->load->model('Validation');
		$response = $this->Validation->SaveUserPassword($data);
		if ($response == TRUE) {
			redirect('login');
		}else{
			echo "Something went wrong";
		}
	}
}
