<?php

defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{

	// function __construct()
	// {

	// 	parent::__construct();
	// 	if (!$this->aauth->is_loggedin())
	// 		redirect('login');
	// 	elseif ($this->aauth->get_user()->level !== static::class) {
	// 		redirect(base_url() . 'index.php/' . $this->aauth->get_user()->level);
	// 	}
	// }

	public function index()
	{

		$this->db->from('consultations');
		$this->db->where("consultation_id", 0);
		$this->db->order_by("id desc");
		$query = $this->db->get();
		$data["consultations"]  =  $query->result();


		$data["doctors"] = $this->db->get_where('aauth_users', ['level' => 'doctor'])->result();

		$data["title"] = "الصفحه الرئسيه";
		$data["page"] = "main.php";
		$this->load->view('home/template', $data);
	}

	public function doctors()
	{
		$data["doctors"] = $this->db->get_where('aauth_users', ['level' => 'doctor'])->result();
		$data["title"] = "عرض كافه الاطباء";
		$data["page"] = "doctors.php";
		$this->load->view('home/template', $data);
	}


	public function doctor($doctor_id)
	{
		
		$data["doctor"] = $doctor = $this->db->get_where('aauth_users', ['level' => 'doctor', 'id' => $doctor_id])->row();
		if(isset($doctor->id) AND $doctor->id > 0){
			
			
		$this->db->where('consultation_id = ', 0);
		$this->db->where('doctor_id', $doctor_id);
		$data["consultations"] = $this->db->get('consultations')->result();
			
					$data["doctor_id"] = $doctor_id;
			
					$data["categorys"] = $this->db->get_where('categorys')->result();
					$data["title"] = "الصفحه الشخصيه ل " . $doctor->name;
					$data["page"] = "doctor.php";
					$this->load->view('home/template', $data);
		}
		else{
			
		redirect($_SERVER['HTTP_REFERER']);
		}
	}


	public function ask_doctor($doctor_id)
	{
		if (!$this->aauth->is_loggedin())
			redirect(base_url() . "login");
		$data["doctor"] = $doctor = $this->db->get_where('aauth_users', ['level' => 'doctor', 'id' => $doctor_id])->row();
		$data["doctor_id"] = $doctor->id;

		$data["categorys"] = $this->db->get_where('categorys')->result();
		$data["title"] = "اسائل الطبيب " . $doctor->name;
		$data["page"] = "ask_doctor.php";
		$this->load->view('home/template', $data);
	}

	public function post_ask_doctor()
	{
		if (!$this->aauth->is_loggedin())
			redirect(base_url() . "login");
		// `id`, `user_id`, `doctor_id`, `body`, `category_id`
		$user_id     = $this->aauth->get_user()->id;
		$doctor_id   = $this->input->post('doctor_id');
		$body        = strip_tags($this->input->post('body'));
		$category_id = $this->input->post('category_id');

		$data = ['user_id' => $user_id, 'doctor_id' => $doctor_id, 'body' => $body, 'category_id' => $category_id];
		$this->db->insert('consultations', $data);
		redirect('/');
	}

	public function consultations()
	{

		if (!$this->aauth->is_loggedin())
			redirect(base_url() . "login");
		$data["categorys"] = $this->db->get_where('categorys')->result();
		$data["title"] = "استشاره جديده";
		$data["page"] = "consultations.php";
		$this->load->view('home/template', $data);
	}

	public function post_ask()
	{
		if (!$this->aauth->is_loggedin())
			redirect(base_url() . "login");
		// `id`, `user_id`, `doctor_id`, `body`, `category_id`
		$user_id = $this->aauth->get_user()->id;
		$doctor_id = 0;
		$body = strip_tags($this->input->post('body'));
		$category_id = $this->input->post('category_id');

		$data = ['user_id' => $user_id, 'doctor_id' => $doctor_id, 'body' => $body, 'category_id' => $category_id];
		$this->db->insert('consultations', $data);
		redirect('/');
	}


	public function consultation($id)
	{

		$data["consultation"] = $this->db->get_where('consultations', ['id' => $id ,'consultation_id' => 0])->row();
		$data["comments"] = $this->db->get_where('consultations', ['consultation_id' => $id])->result();

		$data["title"] = "استشاره جديده";
		$data["page"] = "consultation.php";
		$this->load->view('home/template', $data);
	}



	public function post_add_comment()
	{
		// `id`, `user_id`, `doctor_id`, `body`, `category_id`
		$user_id         = $this->aauth->get_user()->id;
		$doctor_id       = $this->aauth->get_user()->id;
		$consultation_id = $this->input->post('consultation_id');
		$body            = strip_tags($this->input->post('body'));


		$data = ['user_id' => $user_id, 'doctor_id' => $doctor_id, 'body' => $body, 'consultation_id' => $consultation_id];
		$this->db->insert('consultations', $data);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function about()
	{

		$data["title"] = "من نحن";
		$data["page"] = "about.php";
		$this->load->view('home/template', $data);
	}



	public function registration()
	{
		$data["title"] = "تسجيل";
		$data["page"] = "registration.php";
		$this->load->view('home/template', $data);
	}

	public function post_registration()
	{

		$name     = $this->input->post('name');
		$pass     = $this->input->post('password');
		$level    = 'user';
		$email    = $this->input->post('email');

		$user_id = $this->aauth->create_user($email, $pass);


		$this->db->where("id", $user_id);
		if ($this->db->update("aauth_users", [
			'name'      => $name,
			'level'     => $level,
			'email'     => $email
		])) {
			$this->aauth->login_fast($user_id);
			redirect('/');
		} else
			redirect($_SERVER['HTTP_REFERER']);
	}

	public function profile()
	{

		if (!$this->aauth->is_loggedin())
			redirect(base_url() . "login");

		$data["title"] = "الملف الشخصى - " . $this->aauth->get_user()->name;
		if ($this->aauth->get_user()->level == "user") {
		 	
			$data["consultations"] = $this->db->get_where('consultations', ['user_id' => $this->aauth->get_user()->id])->result();
			$data["page"] = "profile/user.php";
		} else
			{
				
		$this->db->where('consultation_id = ', 0);
		$this->db->where('doctor_id', $this->aauth->get_user()->id);
		$data["consultations"] = $this->db->get('consultations')->result();

		echo $this->db->last_query();;
		// die;
		
		
				$data["doctor"]  = $this->aauth->get_user();
			
				$data["page"] = "profile/doctor.php";
			}


		$this->load->view('home/template', $data);
	}



	/**
	 * اضافة تدوينه هى خاصيه خاصة بالدكاتره فقط يمكن للطبيب اضافة تدوينه بحيث يتم ادخال 
	 * doctor_id 
	 * blog body 
	 * 
	 */

	 public function post_add_blog()
	 {

		// blog `body`, `doctor_id`

		$doctor_id = $this->aauth->get_user()->id;
		$body     = $this->input->post('body');

		$this->db->insert("blog", [
			'doctor_id'      => $doctor_id,
			'body'     => $body
		]);
		redirect($_SERVER['HTTP_REFERER']);

	 }







	

	/**
	 * متابعه الطبيب يتم ادخال بيانات المستخدم وبيانات الطبيب داخل جدول المتابعه 
	 * تقبل الداله
	 * @param int $doctor_id 
	 * @return bool
	 */

	public function follow_me($doctor_id)
	{
		if (! isset($this->aauth->get_user()->id)) {
			
		redirect(base_url()."login");
		}
		$user_id = $this->aauth->get_user()->id;
		
		$this->db->insert('followers' , ['user_id' => $user_id , 'doctor_id' => $doctor_id]);
		
		redirect($_SERVER['HTTP_REFERER']);
	}






	/**
	 * متابعه الطبيب يتم ادخال بيانات المستخدم وبيانات الطبيب داخل جدول المتابعه 
	 * تقبل الداله
	 * @param int $doctor_id 
	 * @return bool
	 */

	public function un_follow_me($doctor_id)
	{
		$user_id = $this->aauth->get_user()->id;
		

		$this->db->where('user_id', $user_id);
		$this->db->where('doctor_id', $doctor_id);
		$query = $this->db->get('followers');
		$isFollow =  sizeof($query->result());
		$follower =  $query->row();


		if($isFollow > 0)
		{
			$this->db->where('id', $follower->id);
			$this->db->delete('followers'); 
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
}
