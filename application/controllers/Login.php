<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{

		parent::__construct();
	}

	public function index()
	{
	if ($this->session->userdata('user'))
			redirect('/admin');

		$data["title"] = "تسجيل الدخول";
		$this->load->view('login', $data);
	}

	function login_post()
	{

		$username    = $this->input->post('email');
		$password = $this->input->post('pass');
	
		
		$user = $this->db->get_where('users', ['username' => $username , 'password' => $password])->row();
		if(sizeof($user)){
		    $this->session->set_userdata('user', $user);
	    redirect('admin');
		}
		else{
		    $this->session->set_flashdata('login_error', 'عفوا كلمخ السر او اسم المستخدم خطاء الرجاء المحاوله مره اخرى');
	    redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url());
	}
}
