<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIController extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('APIModel');
		//$this->load->model('BorrowModel');
	}

	public function index()
	{
		$response = array();
	}

	public function getCustomers()
	{
		$response = $this->APIModel->getCustomers();
		if ($response) {
			$this->output->set_content_type('application/json')
    					 ->set_output(json_encode($response));
		}
	}

	public function getCustomerById($id)
	{
		$response = $this->APIModel->getCustomer($id);
		if ($response) {
			$this->output->set_content_type('application/json')
    					 ->set_output(json_encode($response));
		}
	}

	public function insertCustomer()
	{
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($_POST) {
			$data['first_name'] = $this->input->post('txtFirstName');
			$data['last_name'] = $this->input->post('txtLastName');
			$data['address_type_id'] = $this->input->post('optAddressType');
			$data['address1'] = $this->input->post('txtAddress1');
			$data['address2'] = $this->input->post('txtAddress2');
			$data['city'] = $this->input->post('txtCity');
			$data['country'] = $this->input->post('txtCountry');
			$data['zip_code'] = $this->input->post('txtZipcode');
			$result = $this->APIModel->insertCustomer($data);
			if ($result) {
				$response = array(
					'success' => true
				);
			}
			else {
				$response = array(
					'success' => false
				);
			}
			$this->output->set_content_type('application/json')
    					 ->set_output(json_encode($response));
		}
	}

	public function insertBorrowBook()
	{
		$_POST = json_decode(file_get_contents('php://input'), true);
		if ($_POST) {
			$data['profile_id'] = $this->input->post('profile_id');
			$data['book_id'] = $this->input->post('book_id');
			$data['check_out_date'] = $this->input->post('check_out_date');
			$data['due_date'] = $this->input->post('due_date');
			$data['return_date'] = $this->input->post('return_date');
			$response = $this->APIModel->insertBorrowBook($data);
			if ($response) {
			$this->output->set_content_type('application/json')
    					 ->set_output(json_encode($response));
			}
		}
	}

	public function getAddressType()
	{

		$response = $this->APIModel->getAddressType();
		if ($response) {
			$this->output->set_content_type('application/json')
    					 ->set_output(json_encode($response));
		}
	}

	public function getExportData()
	{
		// select
		$this->output->set_content_type('application/json')
    					 ->set_output(json_encode($response));
	}

	public function getAllBookByCusID($id)
	{
		$response = $this->APIModel->getAllBookByCusID($id);
			if ($response) {
				$this->output->set_content_type('application/json')
	    					 ->set_output(json_encode($response));
			}
	}

	public function getBookAll()
	{
		$response = $this->APIModel->getBookAll();
		if ($response) {
			$this->output->set_content_type('application/json')
    					 ->set_output(json_encode($response));
		}
	}

	public function exportTypeJson($id)
	{
		$response = $this->APIModel->getTypeJson($id);
		if ($response) {
			 $this->output->set_content_type('application/json')
    					 ->set_output(json_encode($response));
    					 
    		
		}
	}

    public function exportTypeJsonBook($id)
	{
		$response = $this->APIModel->getTypeJsonBook($id);
		if ($response) {
			 $this->output->set_content_type('application/json')
    					 ->set_output(json_encode($response));
    					 
    		
		}
	}

}
