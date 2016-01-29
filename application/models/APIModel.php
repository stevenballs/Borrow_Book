<?php
class APIModel extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getCustomers()
	{
		$query = $this->db->select('*')
						->from('profile')
						->get();
		$result = $query->result_array();
		if ($result) {
			return $result;
		}
		return false;
	}

	public function getCustomer($id)
	{
		$query = $this->db->select('*')
						->from('profile')
						->where('id', $id)
						->get();
		$result = $query->result_array();
		if ($result) {
			return $result;
		}
		return false;
	}

	public function insertCustomer($data)
	{
		$customer['first_name'] = $data['first_name'];
		$customer['last_name'] = $data['last_name'];

		if ($this->db->insert("profile", $customer) === true) {
			$fk_profile_id = $this->db->insert_id();
			$address['address_type_id'] = $data['address_type_id'];
			$address['profile_id'] = $fk_profile_id;
			$address['address1'] = $data['address1'];
			$address['address2'] = $data['address2'];
			$address['city'] = $data['city'];
			$address['country'] = $data['country'];
			$address['zip_code'] = $data['zip_code'];
			$this->db->insert("address", $address);
			return true;
		}
		return false;
	}

	public function insertBorrowBook($data)
	{
		$customer['profile_id'] = $data['profile_id'];
		$customer['book_id'] = $data['book_id'];
		$customer['check_out_date'] = $data['check_out_date'];
		$customer['due_date'] = $data['due_date'];
		$customer['return_date'] = $data['return_date'];
		if ($this->db->insert("borrow", $customer) === true) {
				$query = $this->db->select('*')
						->from('borrow')
						->join('book ', 'borrow.book_id = book.id')
						->join('profile ', 'borrow.profile_id = profile.id')
						->where('profile_id', $customer['profile_id'])
						->get();
			$result = $query->result_array();
			if ($result) {
				return $result;
			}
		}
		return false;
	}



	public function getAddressType()
	{
		$query = $this->db->select('*')
						->from('address_type')
						->get();
		$result = $query->result_array();
		if ($result) {
			return $result;
		}
		return false;
	}

	public function getAllBookByCusID($id)
	{

		$query = $this->db->select('*')
						->from('borrow')
						->join('book ', 'borrow.book_id = book.id')
						->join('profile ', 'borrow.profile_id = profile.id')
						->where('profile_id', $id)
						->get();
		$result = $query->result_array();
		if ($result) {
			return $result;
		}
		return false;
	}

	public function getBookAll()
	{
		$query = $this->db->select('*')
						->from('book')
						->get();
		$result = $query->result_array();
		if ($result) {
			return $result;
		}
		return false;
	}

	public function getTypeJson($id){

		if($id == 1){
			$query = $this->db->select('borrow.profile_id,first_name ,last_name ,address1,address2')
						->from('borrow')
						->join('profile','profile.id = borrow.profile_id')
						->join('address', 'address.profile_id = profile.id')
						->get();
			$result = $query->result_array();
			if ($result) {
				return $result;
			}
		
		}
		else if($id == 2){
			$query = $this->db->select('address1,address2,city,country,zip_code')
							->from('address')
							->get();
			$result = $query->result_array();
			if ($result) {
				return $result;
			}
		}
		else if($id == 3){
						$query = $this->db->select('title,author')
							->from('book')
							->get();
			$result = $query->result_array();
			if ($result) {
				return $result;
			}
		}
		else{
			return false;
		}
	}

	public function getTypeJsonBook($id)
	{
		if($id == 1){
			$query = $this->db->select('book.id,book.title,book.author')
						->from('borrow')
						->join('book', 'borrow.book_id = book.id')
						->where('borrow.profile_id',$id)
						->get();
			$result = $query->result_array();
			if ($result) {
				return $result;
			}
		
		}

	}
}
