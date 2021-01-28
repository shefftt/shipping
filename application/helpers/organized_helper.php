<?php

if (!function_exists('oil_change')) {

	function oil_change($id)
	{
		$CI = &get_instance();
		//	$distance = $CI->input->post('distance');
		//	$last_change = $CI->input->post('last_change');

		$total        = 0;
		$total_full   = 0;

		$car          = $CI->db->get_where('cars', ['id' => $id])->row();
		$last_change  = $car->last_change;
		$distance     = $car->distance;
		$oil_change   = $car->oil_change;
		$total        = $distance  - $last_change + 1000;

		$total_full = $oil_change - $total;
		/**
		 * اذا كانت الماسافه المقطوعه نااقص اخر مره تم فيها تغير زيت النتيجه دى اكبر من المسافه المسوح بيها لتغير اليزيت اظهر رساله
		 */
		if ($total  <= $oil_change) {
			echo '<span class="label label-success">
			متبقى من تغير الزيت 
			' . ($total - $oil_change)  . '
			</span>';
		} else {
			echo '<span class="label label-danger">مفروض تغير الزيت
			
			' . ($total - $oil_change)  . '
			</span>';
		}
	}
}



if (!function_exists('table_info')) {

	function table_info($table, $id)
	{
		$CI = &get_instance();
		return $CI->db->get_where($table, ['id' => $id])->row();
	}
}




if (!function_exists('stock_total')) {

	function stock_total($stock_id)
	{
		$CI = &get_instance();
		$qyt = 0;
		$stocks = $CI->db->get_where('stocks')->result();

		foreach ($stocks as $stock)
			$totals =  $CI->db->get_where("products_in_stock", ["stock_id" => $stock_id])->result();

		// $totals =  $CI->db->get_where("products", ["stock_id" =>$stock_id])->result();
		//	price
		foreach ($totals as $total) {
			$product_id =  $total->product_id;
			$price     = $CI->db->get_where('products', ['id' => $product_id])->row()->price;
			$current_qyt =  $total->current_qyt;

			$qyt += $current_qyt * $price;
		}
		//$qyt += $current_qyt;
		echo $qyt;
	}
}




if (!function_exists('stocks_total')) {

	function stocks_total()
	{
		$CI = &get_instance();
		$qyt = 0;
		$stocks = $CI->db->get_where('stocks')->result();

		foreach ($stocks as $stock)
			$totals =  $CI->db->get_where("products_in_stock")->result();

		// $totals =  $CI->db->get_where("products", ["stock_id" =>$stock_id])->result();
		//	price
		foreach ($totals as $total) {
			$product_id =  $total->product_id;
			$price     = $CI->db->get_where('products', ['id' => $product_id])->row()->price;
			$current_qyt =  $total->current_qyt;

			$qyt += $current_qyt * $price;
		}
		//$qyt += $current_qyt;
		echo $qyt;
	}
}



if (!function_exists('car_total')) {

	function car_total($car_id)
	{
		$totals = 0;
		$CI = &get_instance();
		$jobs =  $CI->db->get_where("jobs", ["car_id" => $car_id])->result();

		foreach ($jobs as $job) {
			$id =  $job->id;

			$total = $CI->db->query("select sum(sub_total) as sub_total FROM products_job WHERE status = 1 AND job_id =" . $id)->row()->sub_total;
			$totals += $total;
		}
		return $totals;
	}
}

if (!function_exists('job_total')) {

	function job_total($job_id)
	{
		$CI = &get_instance();
		echo $CI->db->query("select sum(sub_total) as sub_total FROM products_job WHERE status = 1 AND job_id =" . $job_id)->row()->sub_total;
	}
}
if (!function_exists('car_count')) {

	function car_count($car_type, $maintenance_type)
	{
		$CI = &get_instance();
		return $CI->db->query("select count(id) as id FROM jobs WHERE car_type_id= " . $car_type . " AND type= '" . $maintenance_type . "'")->row()->id;
	}
}



if (!function_exists('daf_number')) {

	function daf_number($car_id)
	{
		$CI = &get_instance();
		return sizeof($CI->db->get_where("jobs", ['form' => "داف", 'car_id' => $car_id])->result());
	}
}
if (!function_exists('saylo_number')) {

	function saylo_number($car_id)
	{
		$CI = &get_instance();
		return sizeof($CI->db->get_where("jobs", ['form' => "سايلو", 'car_id' => $car_id])->result());
		// 		$CI->db->get_where("jobs" ,['type' => "صيانة دورية", 'car_type_id' =>  "شاحنه"])->result();
		// 	return $CI->db->last_query();


	}
}


if (!function_exists('how_number')) {

	function how_number($car_id)
	{
		$CI = &get_instance();
		return sizeof($CI->db->get_where("jobs", ['company' => "هاو", 'car_id' => $car_id])->result());
		// 		$CI->db->get_where("jobs" ,['type' => "صيانة دورية", 'car_type_id' =>  "شاحنه"])->result();
		// 	return $CI->db->last_query();


	}
}



if (!function_exists('trucks_number')) {
/**
 * Fetching data according to the type of maintenance
 *
 * @param int $maintenance_type Maintenance type is periodic and non-periodic
 * @param date $from_date 
 * @param date $to_date
 * @param int $car_type_id The car type from the table of car types
 * @return void
 */
	function trucks_number($from_date, $to_date, $car_type_id  , $maintenance_type)
	{
		
		$CI = &get_instance();
		return sizeof($CI->db->query("SELECT * FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "'  AND    type = '".$maintenance_type."' AND car_type_id = " . $car_type_id)->result());
	}
}


if (!function_exists('maintenance_times')) {
/**
 * Fetch the number of times the car entered maintenance
 *
 * @param int $company company or brand of car from brand table
 * @param date $from_date 
 * @param date $to_date
 * @param int $car_type_id The car type from the table of car types
 * @return void
 */
	function maintenance_times($from_date, $to_date, $car_id)
	{
		
		$CI = &get_instance();
		$result =  $CI->db->query("SELECT count(car_id) AS number  FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "' AND  car_id = ".$car_id)->row();
		return $result->number;
	}
}




if (!function_exists('small_car_number')) {

	function small_car_number($from_date, $to_date)
	{
		$CI = &get_instance();
		//	return sizeof($CI->db->get_where("jobs" ,['type' => "صيانة دورية", 'car_type_id' =>  "عربيه صغيره"])->result());
		return sizeof($CI->db->query("SELECT * FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "'  AND    type = 'صيانة دورية' AND car_type_id ='عربيه صغيره' ")->result());
	}
}


if (!function_exists('products_in_stock')) {

	function products_in_stock($product_id, $stock_id)
	{
		$CI = &get_instance();
		return $CI->db->query("SELECT sum(current_qyt) as current_qyt FROM products_in_stock WHERE product_id = " . $product_id . " AND stock_id = " . $stock_id)->row()->current_qyt;
	}
}



if (!function_exists('products_stocks')) {

	function products_stocks($product_id)
	{
		$CI = &get_instance();
		$qyt =  $CI->db->query("SELECT qyt  FROM products WHERE id = " . $product_id)->row()->qyt;
		// $CI->db->where('id', $product_id);
		// $CI->db->update('products' , ['qyt' => $qyt]);
		return $qyt;
	}
}





if (!function_exists('product')) {

	function product($product_id)
	{
		$CI = &get_instance();
		return $CI->db->get_where("products", ['id' => $product_id])->row();
	}
}

if (!function_exists('stock')) {

	function stock($id)
	{
		$CI = &get_instance();
		return $CI->db->get_where("stocks", ['id' => $id])->row();
	}
}



if (!function_exists('genarater_number')) {

	function genarater_number($from_date, $to_date)
	{
		$CI = &get_instance();
		//	return sizeof($CI->db->get_where("jobs" ,['type' => "صيانة دورية", 'car_type_id' =>"مولد"])->result());
		return sizeof($CI->db->query("SELECT * FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "'  AND    type = 'صيانة دورية' AND car_type_id ='مولد' ")->result());
	}
}





if (!function_exists('trucks_number_pub')) {

	function trucks_number_pub($from_date, $to_date)
	{
		$CI = &get_instance();
		//	return sizeof($CI->db->get_where("jobs" ,['type' => "صيانة عامة", 'car_type_id' =>  "شاحنه"        ])->result());
		return sizeof($CI->db->query("SELECT * FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "'  AND    type = 'صيانة عامة' AND car_type_id ='شاحنه' ")->result());
	}
}



if (!function_exists('small_car_number_pub')) {

	function small_car_number_pub($from_date, $to_date)
	{
		$CI = &get_instance();
		//return sizeof($CI->db->get_where("jobs" ,['type' => " صيانة عامة", 'car_type_id' =>  "عربيه صغيره"        ])->result());
		return sizeof($CI->db->query("SELECT * FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "'  AND    type = 'صيانة عامة' AND car_type_id ='عربيه صغيره' ")->result());
	}
}




if (!function_exists('trela_number_pub')) {

	function trela_number_pub($from_date, $to_date)
	{
		$CI = &get_instance();
		//return sizeof($CI->db->get_where("jobs" , ['type' => " صيانة عامة" , 'car_type_id' => "ترلا" ])->result());
		return sizeof($CI->db->query("SELECT * FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "'  AND    type = 'صيانة عامة' AND car_type_id ='ترلا' ")->result());
	}
}



if (!function_exists('cars_info')) {

	/*
     * داله جلب بيانات المستخدمه
     * @parm $id int اسم المستخدم
     */
	function cars_info($id)
	{
		$CI = &get_instance();
		return $CI->db->get_where("cars", ["id" => $id])->row();
	}
}


if (!function_exists('prod_info')) {

	/*
     * داله جلب بيانات المستخدمه
     * @parm $id int اسم المستخدم
     */
	function prod_info($product_id)
	{
		$CI = &get_instance();
		return $CI->db->get_where("products", ["id" => $product_id])->row();
	}
}



if (!function_exists('daily_report')) {

	function daily_report($car_id)
	{
		$CI = &get_instance();

		$date = new DateTime("now");

		$curr_date = $date->format('Y-m-d ');

		$CI->db->select('*');
		$CI->db->from('jobs');
		$CI->db->where('DATE(created_at)', $curr_date); //use date function
		$CI->db->where('car_id', $car_id); //use date function
		$query = $CI->db->get();
		return $query->row();
	}
}







if (!function_exists('get_categorys')) {

	function get_categorys($id)
	{
		$CI = &get_instance();
		return $CI->db->get_where("categorys", ["id" => $id])->row();
	}
}

if (!function_exists('get_stock')) {

	function get_stock($id)
	{
		$CI = &get_instance();
		return $CI->db->get_where("stocks", ["id" => $id])->row();
	}
}


if (!function_exists('get_shelve')) {

	function get_shelve($id)
	{
		$CI = &get_instance();
		return $CI->db->get_where("shelves", ["id" => $id])->row();
	}
}




if (!function_exists('replay_count')) {

	function replay_count($id)
	{
		$CI = &get_instance();
		$consultations =  $CI->db->get_where("consultations", ["consultation_id" => $id])->result();
		if (sizeof($consultations) < 1)
			echo "لايوجد رد";
		else
			echo sizeof($consultations) . "  رد";
	}
}




if (!function_exists('consultations_number')) {

	function consultations_number()
	{
		$CI = &get_instance();
		return sizeof($CI->db->get_where("consultations", ['consultation_id' => 0])->result());
	}
}

if (!function_exists('consultations_reply_number')) {

	function consultations_reply_number()
	{
		$CI = &get_instance();
		return sizeof($CI->db->get_where("consultations", ['consultation_id != ' => 0])->result());
	}
}

if (!function_exists('doctors_number')) {

	function doctors_number()
	{
		$CI = &get_instance();
		return sizeof($CI->db->get_where("aauth_users", ['level' => 'doctor'])->result());
	}
}

if (!function_exists('users_number')) {

	function users_number()
	{
		$CI = &get_instance();
		return sizeof($CI->db->get_where("aauth_users", ['level' => 'user'])->result());
	}
}


/**
 * جلب عدد المتابيعن للطبيب 
 */
if (!function_exists('number_of_follow')) {

	function number_of_follow($doctor_id)
	{
		$CI = &get_instance();
		return sizeof($CI->db->get_where("followers", ['doctor_id' => $doctor_id])->result());
	}
}


if (!function_exists('check_follow')) {

	function check_follow($user_id, $doctor_id)
	{
		$CI = &get_instance();


		$CI->db->where('user_id', $user_id);
		$CI->db->where('doctor_id', $doctor_id);
		$query = $CI->db->get('followers');
		return sizeof($query->result());
	}
}



/**
 * 
 * جلب عدد المنشورات الخاصة بالطبيب بحيث يتم ادخال اى دى الطبيب ويتم حساب عدد التودينات
 */

if (!function_exists('number_of_blog')) {

	function number_of_blog($doctor_id)
	{
		$CI = &get_instance();

		$CI->db->where('doctor_id', $doctor_id);
		$query = $CI->db->get('blog');
		return sizeof($query->result());
	}
}


if (!function_exists('login')) {

	function login()
	{
		$CI = &get_instance();
		return $CI->session->userdata('user');
	}
}


/**
 * عدد الردود بحيث يتم جلبه عن طريق اى دى الطبيب 
 */
if (!function_exists('number_of_replay')) {

	function number_of_replay($doctor_id)
	{
		$CI = &get_instance();

		$CI->db->where('consultation_id != ', 0);
		$CI->db->where('doctor_id', $doctor_id);
		$query = $CI->db->get('consultations');
		return sizeof($query->result());
	}
}
if (!function_exists('job_engineers')) {

	function job_engineers($id)
	{



		$CI = &get_instance();
		return $CI->db->get_where("egineers", ["id" => $id])->row();
	}
}

if (!function_exists('job_products')) {

	function job_products($id)
	{



		$CI = &get_instance();
		return $CI->db->get_where("products", ["id" => $id])->row();
	}
}

if (!function_exists('products_job_count')) {

	function products_job_count($id)
	{
		$CI = &get_instance();
		return $CI->db->query("SELECT count(id) as id FROM products_job WHERE status = 0 AND job_id = " . $id)->row()->id;
	}
}
