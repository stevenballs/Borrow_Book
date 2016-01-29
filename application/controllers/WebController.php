<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebController extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Home');
	}

	public function addCustomer()
	{
		$this->load->view('Add_Customer');
	}

	public function addBorrowBook()
	{
		$this->load->view('Add_Borrow');
	}

	public function exportJson()
	{
		$this->load->view('Export_Json');
	}
}
