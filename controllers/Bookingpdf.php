<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookingpdf extends CI_Controller {

	// public function index() 
	// {	
	// 	$this->load->library('fpdf_gen');		
	// 	$this->fpdf->SetFont('Arial','B',16);
	// 	$this->fpdf->Cell(40,10,'Hello World!');		
	// 	echo $this->fpdf->Output('hello_world.pdf','D');
	// }
	public function pdf($id) 
	{	
	   $this->load->library('fpdf_gen');		
		// $this->fpdf->SetFont('Arial','B',16);
		// $this->fpdf->Cell(40,10,'Hello World!');		
		// echo $this->fpdf->Output('hello_world.pdf','D');


		$booking_id = base64_decode($id);
		
		$data['booking_result'] = $this->booking_model->get_where('booking',array('booking_id'=>$booking_id));
		
		$data['booking_details_result'] = $this->booking_model->get_where_result('booking_details',array('booking_id'=>$booking_id));
		//$data['page_name'] = 'bookingpdf';



		$this->load->view('bookingpdf',$data);

		// $this->load->library('fpdf_gen');		
		// $this->fpdf->SetFont('Arial','B',16);
		// $this->fpdf->Cell(40,10,'Hello World!');		
		// echo $this->fpdf->Output('hello_world.pdf','D');
	}
}
