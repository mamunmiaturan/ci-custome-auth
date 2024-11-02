<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Function to register a user
    public function registerUser($data)
    {
        return $this->db->insert('users', $data); // Insert user data into 'users' table
    }

    public function getUserByEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }
}
