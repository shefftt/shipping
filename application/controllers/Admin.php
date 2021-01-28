<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('user'))
            redirect('/login');
    }

    public function index()
    {
        $data["jobs"] = $this->db->get_where('jobs', ['status' => 0])->result();
        $data["cars"] = $this->db->get('cars')->result();
        $data["egineers"] = $this->db->get('egineers')->result();
        $data["products"] = $this->db->get('products')->result();

        $data["title"] = "الورشه ";
        $data["page"] = "admin/job/open_job.php";


        $data["title"] = "المهام المفتوحه";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    // 	public function ahmedhmed()
    // 	{


    // // // 		$result =  $this->db->get_where('jobs' , ['car_id' => 3])->result();
    // // 		$result =  $this->db->query('SELECT car_id FROM jobs WHERE car_id =3')->result();
    // // 		echo "<pre>";
    // // 		print_r($result);
    // 		echo job_total(32);
    // 	}



    // /////////////////////////////////////////////////////////////// product start   //////////////////////////////////////////////////////////////////////////////////

    public function products()
    {
        $data["products"] = $this->db->get('products')->result();

        $data["title"] = " عرض المنتجات";
        $data["page"] = "admin/product/products_stocks.php";


        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    public function product_add()
    {
        $data["categorys"] = $this->db->get('categorys')->result();
        $data["shelves"]   = $this->db->get('shelves')->result();
        $data["stocks"]    = $this->db->get('stocks')->result();
        $data["units"]     = $this->db->get('units')->result();



        $data["title"] = "اضافة منتج";
        $data["page"] = "admin/product/product_add.php";


        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function product_add_post()
    {
        $code           =  $this->input->post('code');
        $name_form      =  $this->input->post('name');
        $category       =  $this->input->post('category');
        $price          =  $this->input->post('price');
        $stock_id       =  $this->input->post('stock_id');
        $shelve_id      =  $this->input->post('shelve_id');
        $product_qyt    = $qyt =  $this->input->post('qyt');
        $unit_id        =  $this->input->post('unit_id');




        $category_name =  $this->db->get_where('categorys', ['id' => $category])->row()->name;


        $name = $name_form . " " . $category_name;

        $this->db->insert('products', compact('name', 'qyt', 'code', 'unit_id', 'category', 'price', 'stock_id', 'shelve_id'));

        // after that get product_id and save qyt 
        $product_id = $this->db->insert_id();
        $stock_id   = $this->db->get_where('products', ['id' => $product_id])->row()->stock_id;
        $qyt        = $current_qyt = $this->input->post('qyt');
        $this->db->insert('products_in_stock', compact('product_id', 'stock_id', 'qyt', 'current_qyt'));



        redirect(base_url("admin/product_add"));
    }


    public function product_edit($id)
    {
        $data["product"] = $this->db->get_where('products', ['id' => $id])->row();
        $data["stocks"] = $this->db->get('stocks')->result();
        $data["shelves"] = $this->db->get('shelves')->result();
        $data["categorys"] = $this->db->get('categorys')->result();
        $data["units"] = $this->db->get('units')->result();

        $data["title"] = "تعديل منتج";
        $data["page"] = "admin/product/product_edit.php";


        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function product_edit_post()
    {
        $id          =  $this->input->post('id');
        $code        =  $this->input->post('code');
        $price       =  $this->input->post('price');
        $stock_id    =  $this->input->post('stock_id');
        $shelve_id   =  $this->input->post('shelve_id');
        $category    =  $this->input->post('category');
        $name        =  $this->input->post('name');
        $unit_id     =  $this->input->post('unit_id');
        $qyt         =  $this->input->post('qyt');


        // products `name`, `category`, `price`, `stock_id`, `shelve_id`
        $this->db->where('id', $id);
        $this->db->update('products', ['qyt' => $qyt, 'unit_id' => $unit_id, 'code' => $code, 'price' => $price, 'category' => $category, 'name' => $name, 'stock_id' => $stock_id, 'shelve_id' => $shelve_id]);


        // تغير المخازن فى المنتجات التى داخل المخازن

        $products_in_stock = $this->db->get_where('products_in_stock', ['product_id' => $id])->result();

        foreach ($products_in_stock as $product_in_stock) {
            $this->db->where('id', $product_in_stock->id);
            $this->db->update('products_in_stock', ['stock_id' => $stock_id]);
        }

        redirect(base_url("admin/products"));
    }


    public function product($id)
    {
        $data["product"] = $this->db->get_where('products', ['id' => $id])->row();
        $data["products_in_stock"] = $this->db->get_where('products_in_stock', ['stock_id' => $id])->result();



        $data["title"] = "عرض منتج";
        $data["page"] = "admin/product/product.php";


        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    // /////////////////////////////////////////////////////////////// product end   //////////////////////////////////////////////////////////////////////////////////




    // /////////////////////////////////////////////////////////////// stocks start   //////////////////////////////////////////////////////////////////////////////////

    public function stock_add()
    {

        $data["title"] = "اضافة مخزن";
        $data["page"] = "admin/stocks/stock_add.php";


        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function stock_add_post()
    {
        $name =  $this->input->post('name');
        $this->db->insert('stocks', compact('name'));
        redirect(base_url("admin/stock_add"));
    }

    public function stocks()
    {

        $data["stocks"] = $this->db->get('stocks')->result();
        $data["title"] = "عرض المخازن";
        $data["page"]  = "admin/stocks/index.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function stock($id)
    {

        $data["products"] = $this->db->get_where('products', ['stock_id' => $id])->result();
        $data["stock_id"] = $id;

        $data["title"]    = "عرض المخزن";
        $data["page"]     = "admin/stocks/stock.php";

        $data["sidebar"]  = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function out_of_stock()
    {
        if ($this->input->post('product_id') !== null) {
            $data['from'] = $from = $this->input->post('from');
            $data['to'] = $to     = $this->input->post('to');
            $data['product_id']   = $product_id = $this->input->post('product_id');
            if ($product_id == 0) {
                $data["products_job"] = $this->db->query("SELECT * FROM products_job WHERE created_at >= '$from' AND created_at <= '$to' AND status = 1 ORDER BY job_id DESC")->result();
            } else {
                $data["products_job"] = $this->db->query("SELECT * FROM products_job WHERE product_job = '$product_id' AND created_at >= '$from' AND created_at <= '$to' AND status = 1 ORDER BY job_id DESC")->result();
            }
        } else {
            // die('ahmed hmed');created_at between 
        }


        $data["products"] = $this->db->get('products')->result();
        $data["title"]    = "منصرفا لفتره";
        $data["page"]     = "admin/stocks/out_of_stock.php";

        $data["sidebar"]  = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function add_shelves()
    {
        $data["title"] = "اضافة رف";
        $data["page"] = "admin/stocks/shelve_add.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    public function add_shelves_post()
    {

        $name =  $this->input->post('name');

        $this->db->insert('shelves', compact('name'));
        redirect(base_url("admin/add_shelves"));
    }



    public function stock_qyt()
    {

        $data["stocks"]   = $this->db->get('stocks')->result();
        $data["products"] = $this->db->get('products')->result();
        $data["title"]    = "تقرير الكميات";
        $data["page"]     = "admin/report/stock_qyt.php";
        $data["sidebar"]  = "admin/sidebar.php";
        $this->load->view('template', $data);
    }



    ///////////////////////////////////////////////////////////////stock end//////////////////////////////

    public function products_in_add()
    {
        $data["stocks"]   = $this->db->get('stocks')->result();
        $data["products"] = $this->db->get('products')->result();


        $data["title"]    = "اضافة الى المخزن";
        $data["page"]     = "admin/product/products_in_stock.php";
        $data["sidebar"]  = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function products_in_add_post()
    {
        $product_id = $this->input->post('product_id');
        $products   = $this->db->get_where('products', ['id' => $product_id])->row();
        $stock_id   = $products->stock_id;
        $product_qyt   = $products->qyt;
        $total = 0;


        $qyt        = $current_qyt = $this->input->post('qyt');
        $this->db->insert('products_in_stock', compact('product_id', 'stock_id', 'qyt', 'current_qyt'));

        $total = $product_qyt + $qyt;
        $this->db->where('id', $product_id);
        $this->db->update('products', ['qyt' => $total]);

        redirect(base_url("admin/products_in_add"));
    }

    public function products_stocks()
    {

        $data["products"] = $this->db->get('products')->result();
        // $data["stock_id"] = $stock_id;

        $data["title"] = "عرض المنتجات";
        $data["page"] = "admin/product/products_stocks.php";


        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    /////////////////////////////////////////////////////////////car start //////////////////////////////

    public function car_add()
    {

        $data["brands"]  = $this->db->get('brands')->result();
        $data["shapes"]  = $this->db->get('car_shape')->result();
        $data["types"]   = $this->db->get('cars_type')->result();
        $data["cars"]    = $this->db->get('cars')->result();
        $data["title"]   = "اضافة مركبه";
        $data["page"]    = "admin/cars/car_add.php";

        $data["sidebar"] = "admin/sidebar.php";

        $this->load->view('template', $data);
    }

    public function car_add_post()
    {

        $chassis_no  = $this->input->post('chassis_no');
        $number      = $this->input->post('number');
        $driver_name = $this->input->post('driver_name');
        $oil_change  = $this->input->post('oil_change');
        $company     = $this->input->post('company');
        $form        = $this->input->post('form');
        $type        = $this->input->post('type');
        $distance    = $this->input->post('distance');
        $last_change = $this->input->post('last_change');


        $this->db->insert('cars', compact('number', 'chassis_no', 'driver_name', 'oil_change', 'company', 'form', 'type', 'distance', 'last_change'));

        redirect(base_url("admin/cars"));
    }

    public function cars()
    {
        $data["cars"]  = $this->db->get('cars')->result();
        $data["title"] = "عرض المركبات";
        $data["page"]  = "admin/cars/index.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }
    public function car($id)
    {
        $data["cars"] = $this->db->get_where('cars', ['id' => $id])->result();

        $data["title"] = "عرض المركبه";
        $data["page"] = "admin/cars/car.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    public function car_edit($id)
    {

        $data["brands"]  = $this->db->get('brands')->result();
        $data["shapes"]  = $this->db->get('car_shape')->result();
        $data["types"]   = $this->db->get('cars_type')->result();
        $data["car"] = $this->db->get_where('cars', ['id' => $id])->row();

        $data["title"] = "عرض المركبه";
        $data["page"] = "admin/cars/car_edit.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function car_edit_post()
    {
        $chassis_no          = $this->input->post('chassis_no');
        $id          = $this->input->post('id');
        $number      = $this->input->post('number');
        $driver_name = $this->input->post('driver_name');
        $oil_change  = $this->input->post('oil_change');
        $company     = $this->input->post('company');
        $form        = $this->input->post('form');
        $type        = $this->input->post('type');
        $last_change        = $this->input->post('last_change');
        $distance        = $this->input->post('distance');

        $this->db->where('id', $id);
        $this->db->update('cars', compact('number', 'chassis_no', 'distance', 'last_change', 'driver_name', 'oil_change', 'company', 'form', 'type'));
        redirect('/admin/cars');
    }

    public function car_jobs($id)
    {


        $data["jobs"] = $this->db->get_where('jobs', ['car_id' => $id])->result();
        $data["car"] = $this->db->get_where('cars', ['id' => $id])->row();

        $data["car_id"] = $id;

        $data["title"]    = "تفاصيل العربه";
        $data["page"]     = "admin/cars/car_jobs.php";

        $data["sidebar"]  = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    /////////////////////////////////////////// car_end ///////////////////////////////////////////
    //////////////////////////////////////////egineers start//////////////////////////////////////
    public function egineer_add()
    {


        $data["title"] = "اضافة مهندس";
        $data["page"] = "admin/egineers/egineer_add.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function egineer_add_post()
    {
        $name = $this->input->post('name');
        $created_at = $this->input->post('created_at');

        $this->db->insert('egineers', compact('name', 'created_at'));
        redirect(base_url("admin/egineer_add"));
    }


    public function egineers()
    {

        $data["egineers"] = $this->db->get('egineers')->result();


        $data["title"] = "عرض المهندسين";
        $data["page"] = "admin/egineers/index.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }
    //////////////////////////////////////////egineers end///////////////////////////////////////
    /////////////////////////////////////////start job//////////////////////////////////////////
    public function jobs()
    {
        //	$data["job_engineers"] = $this->db->get('job_engineers')->row();
        $data["jobs"] = $this->db->get_where('jobs', ['status' => 1])->result();
        $data["cars"] = $this->db->get('cars')->result();
        $data["egineers"] = $this->db->get('egineers')->result();
        $data["products"] = $this->db->get('products')->result();

        $data["title"] = "الورشه ";
        $data["page"] = "admin/job/show_report.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function job_add()
    {
        $data["cars"] = $this->db->get('cars')->result();
        $data["egineers"] = $this->db->get('egineers')->result();
        $products = $this->db->get('products')->result();

        $product_arry = "";
        foreach ($products as $product) {
            $product_arry .= '"' . $product->name . '",';
        }

        $data["product_arry"] = $product_arry;
        $data["title"] = "الورشه ";
        $data["page"] = "admin/job/job.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function job_post()
    {

        $engineer_id = $this->input->post('engineer_id');
        $product_job = $this->input->post('product_job');
        $price       = $this->input->post('price');
        $job_qyt     = $this->input->post('job_qyt');




        $car_id   = $this->input->post('car_id');
        $type     = $this->input->post('type');
        $problems = $this->input->post('problems');
        $job_number = $this->input->post('job_number');

        $car_type_id = $this->db->get_where('cars', ['id' => $car_id])->row()->type;
        $form        = $this->db->get_where('cars', ['id' => $car_id])->row()->form;
        $company     = $this->db->get_where('cars', ['id' => $car_id])->row()->company;
        $oil_change  = $this->db->get_where('cars', ['id' => $car_id])->row()->oil_change;





        $this->db->insert('jobs', compact('car_id', 'job_number', 'problems', 'type', 'car_type_id', 'form', 'company'));
        $job_id = $this->db->insert_id();


        $distance = $this->input->post('distance');
        $last_change = $this->input->post('last_change');

        /**
         * اذا كانت الصيانه دوريه
         *  1 - تحديث اخير تغير لرقم العداد
         */
        if ($type == "صيانة دورية") {
            $this->db->where('id', $car_id);
            $this->db->update('cars', ['distance' => $distance, 'last_change' => $distance]);
        } else {
            $this->db->where('id', $car_id);
            $this->db->update('cars', ['distance' => $distance]);
        }







        //	$this->db->insert('cars', compact('distance'));

        // ادخال الموظفين واسنادهم للجوب المعين بحيث يتم ادخال اى دى المهندس مع اى دى الجوب

        for ($i = 0; $i < sizeof($engineer_id); $i++) {
            $this->db->insert('job_engineers', ['job_id' => $job_id, 'engineer_id' => $engineer_id[$i]]);
        }

        for ($i = 0; $i < sizeof($job_qyt); $i++) {

            $sub_total  = $job_qyt[$i] * $price[$i];
            $this->db->insert('products_job', [
                'job_id'     => $job_id,
                'product_job' => $product_job[$i],
                'job_qyt'    => $job_qyt[$i],
                'price'      => $price[$i],
                'sub_total'  => $sub_total,
                'created_at'  => date('Y-m-d')
            ]);
        }


        redirect(base_url("admin/open_job"));
    }
    public function open_job()
    {

        $data["jobs"] = $this->db->get_where('jobs', ['status' => 0])->result();
        $data["cars"] = $this->db->get('cars')->result();
        $data["egineers"] = $this->db->get('egineers')->result();
        $data["products"] = $this->db->get('products')->result();

        $data["title"] = "الورشه ";
        $data["page"] = "admin/job/open_job.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function job_open_details($id)

    {
        $data["job_id"] = $id;
        //$product_job = $this->db->get_where('products_job', ['job_id' => $id])->row()->product_job;

        $data["jobs"]          = $this->db->get_where('jobs', ['id' => $id])->row();
        $data["cars"]          = $this->db->get('cars')->result();
        $data["job_engineers"] = $job_engineers = $this->db->get_where('job_engineers', ['job_id' => $id])->result();

        $data["products_job"]  = $this->db->get_where('products_job', ['job_id' => $id])->result();
        $data["products"]      = $this->db->get('products')->result();
        $data["stocks"]      = $this->db->get('products')->row();
        // $data["stocks"]      = $this->db->get_where('products',['id'=>$product_job])->row();


        $data["title"] = "الورشه ";
        $data["page"] = "admin/job/job_open_details.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function job_details($id)

    {
        $data["job_id"] = $id;
        $data["jobs"]          = $this->db->get_where('jobs', ['id' => $id])->row();
        $data["cars"]          = $this->db->get('cars')->result();
        $data["job_engineers"] = $job_engineers = $this->db->get_where('job_engineers', ['job_id' => $id])->result();

        $data["products_job"]  = $this->db->get_where('products_job', ['job_id' => $id])->result();
        $data["products"]      = $this->db->get('products')->result();

        $data["title"] = "الورشه ";
        $data["page"] = "admin/job/job_open_details.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    public function delete_product_job($id)
    {
        $products_job = $this->db->get_where('products_job', ['id' => $id])->row();
        if ($products_job->status == 0) {

            $this->db->where('id', $id);
            $this->db->delete('products_job');
        } else {
            $this->session->set_flashdata('stock_message', 'عفوا لقد تم تصديق المنتج مسبقا من المخزن');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function job_edit($job_id)
    {
        $data["job"] = $job         = $this->db->get_where('jobs', ['id' => $job_id])->row();
        $data["cars"] = $this->db->get('cars')->result();



        $data["title"] = "تعديل مهمه ";
        $data["page"] = "admin/job/job_edit.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function job_edit_post()
    {
        $id          = $this->input->post('job_id');
        $car_id      = $this->input->post('car_id');
        $type        = $this->input->post('type');
        $problems    = $this->input->post('problems');

        $this->db->where('id', $id);
        $this->db->update('jobs', [
            "car_id"   => $car_id,
            "type"     => $type,
            "problems" => $problems
        ]);
        http: //192.168.1.1/shipping/admin/job_edit/3
        redirect(base_url('admin/job_open_details/' . $id));
    }

    public function agree()
    {

        $product_id        = $this->input->post('product_id');
        $stock_id          = $this->db->get_where('products', ['id' => $product_id])->row()->stock_id;
        $job_qyt           = $this->input->post('job_qyt');
        $products_job_id   = $this->input->post('products_job_id');

        // التاكد من الكميه فى المخزن
        $qyt = $this->db->get_where('products', ['id' => $product_id])->row()->qyt;

        /**
         * اذا كانت الكميه تساوى المطلوب 
         * 1 - الخصم من الكميه 
         * 2 - تحديث حاله المنتج بانه تم الصرف
         * 3 - اظهار رساله بانه تم الصرف بنجاح
         * 4 - اعادده التوجيهه
         */
        if ($qyt >= $job_qyt) {
            $current_qyt = $qyt - $job_qyt;
            $this->db->where('id', $product_id);
            $this->db->update('products', ['qyt' => $current_qyt]);

            $this->db->where('id', $products_job_id);
            $this->db->update('products_job', ['status' => 1, 'stock_id' => $stock_id]);
            $this->session->set_flashdata('stock_qyt', 'تم صرف المنتج بنجاح');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            /**
             * اذا كانت الكميه اقل من المطلوب 
             * 1 - عرض رساله عتفيد بعدم توفر الكميه
             * 2 - اعاده التوجيهه
             */
            $this->session->set_flashdata('stock_qyt_errorr', ' عفوا الكميه اقل من المطلوب الكميه المتوفره هى : ' . $qyt);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }



    public function utpdate_job_status($id)
    {
        $job_total = car_total($id);
        $date_out = date('Y-m-d');

        $this->db->where("id", $id);
        $this->db->update("jobs", ['status' => 1, 'date_out' => $date_out, 'job_total' => $job_total]);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function new_product_in_job($id)
    {
        $data["job_id"] = $id;
        $data["jobs"] = $this->db->get_where('jobs', ['id' => $id])->result();
        $products = $this->db->get('products')->result();

        $product_arry = "";
        foreach ($products as $product) {
            $product_arry .= '"' . $product->name . '",';
        }

        $data["product_arry"] = $product_arry;
        $data["product_arry"] = $product_arry;
        $data["title"] = "اضافة اسبير جديد الى المهمه";
        $data["page"] = "admin/job/new_product_in_job.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function new_product_in_job_post()
    {

        $product_job = $this->input->post('product_job');
        $job_id      = $this->input->post('job_id');
        $price       = $this->input->post('price');
        $job_qyt     = $this->input->post('job_qyt');
        $created_at     = date('Y-m-d');


        //	$job_id = $this->db->insert_id();

        for ($i = 0; $i < sizeof($job_qyt); $i++) {

            $sub_total  = $job_qyt[$i] * $price[$i];

            $this->db->insert('products_job', [
                'job_id'     => $job_id,
                'product_job' => $product_job[$i],
                'job_qyt'    => $job_qyt[$i],
                'price'      => $price[$i],
                'sub_total'  => $sub_total,
                'created_at'  => $created_at,
            ]);
        }
        redirect('admin/job_open_details/' . $job_id);
    }



    public function new_engineer_in_job($id)
    {
        $data["job_id"] = $id;
        $data["egineers"] = $this->db->get('egineers')->result();

        $data["title"] = "اضافة فني جديد الى المهمه";
        $data["page"] = "admin/job/new_engineer_in_job.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function new_engineer_in_job_post()
    {

        $engineer_id = $this->input->post('engineer_id');
        $job_id   = $this->input->post('job_id');


        // ادخال الموظفين واسنادهم للجوب المعين بحيث يتم ادخال اى دى المهندس مع اى دى الجوب

        for ($i = 0; $i < sizeof($engineer_id); $i++) {
            $this->db->insert('job_engineers', ['job_id' => $job_id, 'engineer_id' => $engineer_id[$i]]);
        }
        redirect(base_url("admin/open_job"));
    }

    public function categories()
    {

        $data["categorys"] = $this->db->get('categorys')->result();
        $data["title"] = "عرض التصنيفات";
        $data["page"] = "admin/categories/index.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }
    public function category($id)
    {

        $category = $this->db->get_where('categorys', ['id' => $id])->row();

        $data["products"] = $this->db->get_where('products', ['category' => $category->id])->result();

        $data["title"] = "عرض التصنيفات";
        $data["page"] = "admin/categories/products_category.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function add_category()
    {
        $data["title"] = "اضافة تصنيف";
        $data["page"] = "admin/categories/add_category.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    public function add_category_post()
    {

        $name =  $this->input->post('name');

        $this->db->insert('categorys', compact('name'));
        redirect(base_url("admin/categories"));
    }


    public function units()
    {

        $data["units"] = $this->db->get('units')->result();
        $data["title"] = "عرض التصنيفات";
        $data["page"] = "admin/units/index.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function add_unit()
    {
        $data["title"] = "اضافة تصنيف";
        $data["page"] = "admin/units/add_unit.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function add_unit_post()
    {

        $name =  $this->input->post('name');

        $this->db->insert('units', compact('name'));
        redirect(base_url("admin/units"));
    }

    public function edit_unit($id)
    {
        $data["unit"] = $this->db->get_where('units', ['id' => $id])->row();
        $data["title"] = "تعديل تصنيف";
        $data["page"] = "admin/units/edit_unit.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function edit_unit_post()
    {

        $id   =  $this->input->post('id');
        $name =  $this->input->post('name');

        $this->db->where('id', $id);
        $this->db->update('units', ['name' => $name]);
        redirect(base_url("admin/units"));
    }

    public function cars_shape()
    {

        $data["cars_shape"] = $this->db->get('car_shape')->result();
        $data["title"] = "عرض التصنيفات";
        $data["page"] = "admin/cars_shape/index.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function add_shape()
    {
        $data["title"] = "اضافة تصنيف";
        $data["page"] = "admin/cars_shape/add_shape.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    public function add_shape_post()
    {
        $name =  $this->input->post('name');

        $this->db->insert('car_shape', compact('name'));
        redirect(base_url("admin/cars_shape"));
    }



    public function brands()
    {

        $data["brands"] = $this->db->get('brands')->result();
        $data["title"] = "عرض التصنيفات";
        $data["page"] = "admin/brands/index.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function brand($id)
    {
        $data["title"] = "عرض ماركه";
        $data["page"] = "admin/brands/brand.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }
    public function add_brand()
    {
        $data["title"] = "اضافة تصنيف";
        $data["page"] = "admin/brands/add_brand.php";
        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    public function add_brand_post()
    {
        $name =  $this->input->post('name');

        $this->db->insert('brands', compact('name'));
        redirect(base_url("admin/brands"));
    }

    public function get_drug()
    {
        $name = $this->input->post('name');
        $pro  = $this->db->get_where('products', ['name' => $name])->row();
        if (isset($pro) && $pro->name > 0) {
            echo '<tr>
				<td scope="row">1</td>
				<td>' . $pro->name . '</td>
				<td>
					<input type="text" name="qyt[]" value="1">
					<input type="hidden" name="pro_id[]" value="' . $pro->id . '">
					<input type="hidden" name="price[]" value="' . $pro->price . '">
				</td>
				
			</tr>';
        } else {
            echo "No";
        }
    }



    ////////////////////////////////////////end job////////////////////////////////////////////
    public function daily_report()
    {
        if ($this->input->post('start_date') !== null) {
            $curr_date = date($this->input->post('start_date'));
        } else {
            $date = new DateTime("now");

            $curr_date = $date->format('Y-m-d');
        }
        $from_date = date_format(date_create(date('Y-m-d')), "Y-m-d H:i:s");

        // die($from_date);


        $data["curr_date"] = $curr_date;
        $data["jobs"] = $this->db->get_where('jobs', ["DATE(created_at)" => $curr_date])->result();
        // $data["old_jobs"] = $old_jobs = $this->db->get_where('jobs', ["DATE(created_at) < " => $curr_date , 'status' => 0])->result();
        $data["old_jobs"] = $old_jobs = $this->db->query("SELECT * FROM jobs WHERE created_at <  '" . $from_date . "' AND status = 0")->result();
       

        $data["title"] = "التقرير اليومي  ";
        $data["page"] = "admin/report/daily_report.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    public function monthly_report()
    {
        if ($this->input->post('from') !== NULL) {
            $from = $this->input->post('from');
            $to   = $this->input->post('to');
        } else {
            // $from = "1/1/2020";
            $from = date('Y-m-d');
            $to = date('Y-m-d');
        }



        $data["jobs"] = $this->db->get_where('jobs')->result();



        $data['from_date'] = $from_date = date_format(date_create(date($from)), "Y-m-d H:i:s");
        $data['to_date'] = $to_date = date_format(date_create(date($to) . ' 23:59:59.999'), "Y-m-d H:i:s");

        // echo "<pre>";
        // print_r(maintenance_times($from_date, $to_date, 2));
        // die;

        ///////////////////////عرض /////////////////////////////////
        $data["types"] = $this->db->get("cars_type")->result();
        /////////////////////////////////////////////////////////////
        // $data['trucks_number']        = trucks_number($from_date, $to_date);
        $data['small_car_number']     = small_car_number($from_date, $to_date);
        $data['genarater_number']     = genarater_number($from_date, $to_date);
        $data['trucks_number_pub']    = trucks_number_pub($from_date, $to_date);
        $data['small_car_number_pub'] = small_car_number_pub($from_date, $to_date);
        $data['trela_number_pub']     = trela_number_pub($from_date, $to_date);

        $data['job_dav'] = $result =  $this->db->query("SELECT * FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "'  AND    form = 'داف'   group by car_id")->result();


        //	$data["job_saylo"] = $this->db->group_by("car_id")->get_where('jobs' , ['form'=>"سايلو"])->result();
        $data['job_saylo'] = $result =  $this->db->query("SELECT * FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "'  AND    form = 'سايلو'   group by car_id")->result();

        //	$data["job_how"] = $this->db->group_by("car_id")->get_where('jobs' , ['company'=>"هاو"])->result();
        $data['job_how'] = $result =  $this->db->query("SELECT * FROM jobs where created_at between '" . $from_date . "' AND   '" . $to_date  . "'  AND    company = 'هاو'   group by car_id")->result();


        $data["HOWO_cars"] = $this->db->get_where('cars', ['company' => '1'])->result();
        $data["DAF_cars"] = $this->db->get_where('cars', ['company' => '2'])->result();
        $data["SAYLO_cars"] = $this->db->get_where('cars', ['form' => '2'])->result();

        $data["title"] = " التقرير لفترة  ";
        $data["page"] = "admin/report/monthly_report.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }


    public function car_report()
    {

        $data['from'] =  $from = $this->input->post('from');
        $data['to'] =  $to   = $this->input->post('to');
        $car_id   = $this->input->post('car_id');

        $data["cars"] = $this->db->get_where('cars')->result();




        $data['from_date'] = $from_date = date_format(date_create(date($from)), "Y-m-d H:i:s");
        $data['to_date'] = $to_date = date_format(date_create(date($to) . ' 23:59:59.999'), "Y-m-d H:i:s");

        if (isset($from)) {
            $data["jobs"] = $this->db->query("SELECT * FROM jobs WHERE car_id = '" . $car_id . "' AND  created_at between '" . $from_date . "' AND   '" . $to_date  . "'")->result();
        }

        $data["title"] = "تقرير فتره لوحده";
        $data["page"] = "admin/report/car_report.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }




    public function part_number()
    {
        $part_number = $this->input->post('part_number');

        $products  = $this->db->get_where('products', ['name' => $part_number])->result();

        $i = 1;
        $product_info = "";
        foreach ($products as $product) :
            $product_info .= '	<tr>
							<td>
							' . $product->name . '
							</td>
							<td>
							<div class="col-md-4">
								<input type="text"class="form-control input-md" name="job_qyt[]" value="1">
								</div>
								<input type="hidden" name="product_job[]" value="	' . $product->id . '">
								<input type="hidden" name="price[]" value="	' . $product->price . '">
							</td>
						</tr>';

        endforeach;
        echo $product_info;
    }


    public function stock_report($id)
    {

        $data["job_id"]        = $id;
        $data["jobs"]          = $job =  $this->db->get_where('jobs', ['id' => $id])->row();
        $data["car"]          = $this->db->get_where('cars', ['id' => $job->car_id])->row();

        $data["products_job"]  = $this->db->get_where('products_job', ['job_id' => $job->id])->result();

        $data["title"] = "اذن صرف ";
        $data["page"] = "admin/stocks/stock_report.php";

        $data["sidebar"] = "admin/sidebar.php";
        $this->load->view('template', $data);
    }

    public function redirect_to_relase()
    {
        $id = $this->input->post('id');
        return redirect(base_url() . "/admin/stock_report/" . $id);
    }
}
