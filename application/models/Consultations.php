<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultations extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_consultations()
	{
		return $this->db->get('consultations')->result();
	}

}

/* End of file Consultations.php */
/* Location: ./application/models/Consultations.php */