<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		// $this->session->sess_destroy();
		// die(	);
		$this->load->view("index");
	}

	public function register()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]|matches[confirm_password]|md5");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|min_length[8]");

		if ($this->form_validation->run() === FALSE)
		{
			$errors = validation_errors();
			// var_dump($errors);
			// die();
			$this->session->set_flashdata("register_error", $errors);
            redirect('/users/index');
		}
		else {
			$this->load->model('Log_Reg');
			$this->Log_Reg->register_user($this->input->post());

			$success_message = "<p class='success'>You have registered successfully!</p>";
			$this->session->set_flashdata("register_success", $success_message);
			redirect('/users/index');
		}
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$this->load->model('Log_Reg');
		$user = $this->Log_Reg->login_user($email);

		if ($user && $user['password'] == $password)
		{
			$user_info = array(
				'user_id' => $user['id'],
				'user_name' => $user['first_name'] . " " . $user['last_name'],
				'user_email' => $user['email'],
				'is_logged_in' => TRUE
			);
			$this->session->set_userdata('user_info', $user_info);
			redirect("/users/profile");
		}
		else {
			$this->session->set_flashdata("login_error", "Invalid email or password!");
			redirect("/users/index");
		}
	}

	public function profile()
    {
        if($this->session->userdata('user_info')['is_logged_in'] === TRUE)
        {
        	$array['user'] = $this->session->userdata('user_info');
        	// var_dump($array['user']);
        	// die();
        	$this->load->view("logged_in", $array);
        }
        else {
            echo "Failed to log in";
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("/users/index");
    }
}

// End of main controller