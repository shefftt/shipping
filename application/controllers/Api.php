<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

	 public function __construct() {
        parent:: __construct();
        $this->load->library("pagination");
    }


	public function get_drug()
	{
		$drug_id = $this->input->post('drug_id');
		$drugs  = $this->db->get_where('drugs' , ['id' => $drug_id])->row();
		if (isset($drugs) && $drugs->id > 0) 
		{
			echo '<tr>
                    <td scope="row">1</td>
                    <td>'.$drugs->trade_name.'</td>
                    <td>
                        <input type="text" name="qyt[]" value="1">
                        <input type="hidden" name="drug_id[]" value="'.$drugs->id.'">
                        <input type="hidden" name="price[]" value="'.$drugs->selling_price.'">
                    </td>
                    <td>
                        <label for="">'.$drugs->selling_price.'</label>
                    </td>
                    <td>
                        <label for="">'.$drugs->selling_price.'</label>

                    </td>
                </tr>';
		}
		else
		{
			echo "No";
		}
		
		
	}
	
	
	public function get_invoice_info()
	{
		$invoice_id = $this->input->post('invoice_id');
		$invoice_info = "";
// 		invoice_details `id`, `invoice_id`, `drug_id`, `qyt`, `price`, `sub_total`
		
		$invoice_details  = $this->db->get_where('invoice_details' , ['invoice_id' => 3])->result();
		
		$i = 1;
		foreach ($invoice_details as $invoice):
		    $invoice_info .= '<tr>
                    <td scope="row">'.$i++.'</td>
                    <td scope="row">'.$this->db->get_where('drugs' , ['id' => $invoice->drug_id])->row()->trade_name.'</td>
                    <td>'.$invoice->qyt.'</td>
                    <td>'.$invoice->price.'</td>
                    <td>'.$invoice->sub_total.'</td>
                </tr>';
		endforeach;	
		echo $invoice_info.'dddddddddddddddddddddddddd';
	}

	public function ahmedhmed()
	{

		 $config = array();
        // $config["base_url"] = base_url() . "api/ahmedhmed";
		 $config["base_url"] = base_url() . "authors";
        $config["total_rows"] = $this->db->count_all(' invoices');
        $config["per_page"] = 1;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();
        // //////////////////////////////////////

		$this->db->limit($config["per_page"], $page);
        $query = $this->db->get('invoices');

        $get_authors =  $query->result();
        // //////////////////////////////////////

        $data['authors'] = $get_authors;

        $this->load->view('hey', $data);
	}

	public function ahmed()
	{
		
	}
}
