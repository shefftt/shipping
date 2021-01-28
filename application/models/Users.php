<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_user_name($user_id)
	{
		return $this->db->get_where('aauth_users', ['id' => $user_id])->row();
	}

} 

/* End of file Users.php */
/* Location: ./application/models/Users.php */
