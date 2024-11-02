<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// Check if the request method is POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Set validation rules
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
			$this->form_validation->set_rules('password', 'Password', 'required');

			// Check if validation fails
			if ($this->form_validation->run() === FALSE) {
				// If validation fails, reload the login view with errors
				$this->load->view('auth/login');
			} else {
				// Get form input values
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				// Check user credentials
				$user = $this->Auth_model->getUserByEmail($email);
				if ($user && password_verify($password, $user->password)) {
					// Set session data
					$this->session->set_userdata('user_id', $user->id);
					$this->session->set_flashdata('success', 'Login successful!');
					redirect('auth/dashboard'); // Redirect to a dashboard or home page
				} else {
					// Set error message for invalid credentials
					$this->session->set_flashdata('error', 'Invalid email or password.');
					redirect('/'); // Redirect back to the login page
				}
			}
		} else {
			// Load the login view for GET request
			$this->load->view('auth/login');

		}
		// $this->load->view('auth/login');
	}

	public function register()
	{
		// Check if the request method is POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Set validation rules
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]');
			$this->form_validation->set_rules('phone', 'Phone No', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			$this->form_validation->set_rules('gender', 'Gender', 'required|trim'); // Uncomment this if needed
			$this->form_validation->set_rules('address', 'Address', 'required|trim');

			// Check if validation fails
			if ($this->form_validation->run() === FALSE) {
				// If validation fails, load the registration view with errors
				$this->load->view('auth/register');
			} else {
				// Get form input values
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$phone_no = $this->input->post('phone');
				$password = $this->input->post('password');
				$gender = $this->input->post('gender'); // Ensure this field exists in the form
				$address = $this->input->post('address');

				// Prepare data for insertion
				$data = array(
					'name' => $name,
					'email' => $email,
					'phone_no' => $phone_no,
					'password' => password_hash($password, PASSWORD_DEFAULT), // Hash password
					'gender' => $gender,
					'address' => $address,
				);

				// Insert user data
				if ($this->Auth_model->registerUser($data)) {
					$this->session->set_flashdata('success', 'Registration successful! Please login.');
					redirect('/'); // Redirect to login page
				} else {
					$this->session->set_flashdata('error', 'Registration failed. Please try again.');
					redirect('auth/register');
				}
			}
		} else {
			// Load the registration view for GET request
			$this->load->view('auth/register');
		}
	}
	public function dashboard()
	{
		$this->load->view('auth/dashboard');
	}
}
