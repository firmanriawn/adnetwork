<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Website_model $Website_model
 * @property CI_Form_validation $form_validation
 * @property User_model $User_model
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Output $output
 */

class Websites extends CI_Controller
{

	/**
	 * Constructor for the Websites controller
	 * 
	 * Initializes the controller and loads required dependencies:
	 * - Website_model for database operations on websites
	 * - form_validation library for input validation
	 * - User_model for publisher/user related operations
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Website_model');
		$this->load->library('form_validation');
		$this->load->model('User_model');
	}

	/**
	 * Display the main websites listing page
	 * 
	 * Shows a table of all websites with filtering and search capabilities.
	 * The table includes website details like name, domain, keywords, publisher info,
	 * status and verification status.
	 *
	 * @access public
	 * @return void
	 */
	public function index()
	{
		$data = array(
			'title' => 'Websites',
			'content' => 'admin/content/websites/index',
			'websites' => $this->Website_model->get_all() // get all data from model
		);

		// Load view
		$this->load->view('admin/layout/wrapper', $data);
	}

	/**
	 * Create a new website
	 * 
	 * Handles the creation of a new website.
	 * 
	 * @access public
	 * @return void
	 */

	public function create()
	{
		// Form validation
		$this->form_validation->set_rules('user_id', 'Publisher', 'required');
		$this->form_validation->set_rules('website_name', 'Website Name', 'required');
		$this->form_validation->set_rules('domain', 'Domain', 'required|valid_url');
		$this->form_validation->set_rules('keywords', 'Keywords', 'required');

		if ($this->form_validation->run() === FALSE) {
			if ($this->input->is_ajax_request()) {
				$response = [
					'success' => false,
					'errors' => $this->form_validation->error_array()
				];
				echo json_encode($response);
				exit;
			} else {
				$data = array(
					'title' => 'Add New Website',
					'content' => 'admin/content/websites/create',
					'users' => $this->User_model->get_publishers()
				);
				$this->load->view('admin/layout/wrapper', $data);
			}
		} else {
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'website_name' => $this->input->post('website_name'),
				'domain' => $this->input->post('domain'),
				'keywords' => $this->input->post('keywords'),
				'description' => $this->input->post('description'),
				'status' => 'pending',
				'created_at' => date('Y-m-d H:i:s')
			);

			$this->Website_model->create($data);

			if ($this->input->is_ajax_request()) {
				$response = [
					'success' => true,
					'message' => 'Website successfully added'
				];
				echo json_encode($response);
				exit;
			} else {
				$this->session->set_flashdata('success', 'Website successfully added');
				redirect('admin/websites');
			}
		}
	}

	/**
	 * Edit an existing website
	 * 
	 * Handles the editing of an existing website.
	 * 
	 * @access public
	 * @return void
	 */
	public function edit($id)
	{
		$this->form_validation->set_rules('website_name', 'Website Name', 'required');
		$this->form_validation->set_rules('domain', 'Domain', 'required|valid_url');
		$this->form_validation->set_rules('keywords', 'Keywords', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'title' => 'Edit Website',
				'content' => 'admin/content/websites/edit',
				'website' => $this->Website_model->get_by_id($id)
			);
			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$data = array(
				'website_name' => $this->input->post('website_name'),
				'domain' => $this->input->post('domain'),
				'keywords' => $this->input->post('keywords'),
				'description' => $this->input->post('description'),
				'updated_at' => date('Y-m-d H:i:s')
			);

			$this->Website_model->update($id, $data);
			$this->session->set_flashdata('success', 'Website successfully updated');
			redirect('admin/websites');
		}
	}

	/**
	 * Delete a website
	 * 
	 * Handles the deletion of a website.
	 * 
	 * @access public
	 * @return void
	 */
	public function delete($id)
	{
		try {
			if (!$id) {
				throw new Exception('Invalid website ID');
			}

			// Check if website exists
			$website = $this->Website_model->get_by_id($id);
			if (!$website) {
				throw new Exception('Website not found');
			}

			// Delete website
			$deleted = $this->Website_model->delete($id);
						

			if ($deleted) {
				$response = [
					'success' => true,
					'message' => 'Website successfully deleted'
				];
			} else {
				throw new Exception('Failed to delete website');
			}

		} catch (Exception $e) {
			$response = [
				'success' => false,
				'message' => $e->getMessage()
			];
		}

		// Return JSON response
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	/**
	 * Verify a website
	 * 
	 * Handles the verification of a website.
	 * 
	 * @access public
	 * @return void
	 */
	public function verify($id)
	{
		$data = array(
			'is_verified' => 1,
			'status' => 'active',
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->Website_model->update($id, $data);
		$this->session->set_flashdata('success', 'Website successfully verified');
		redirect('admin/websites');
	}

	/**
	 * Get data for DataTables
	 * 
	 * Handles the retrieval of data for DataTables.
	 * 
	 * @access public
	 * @return void
	 */
	public function get_data()
	{
		try {
			// Parameters dari DataTables
			$draw = $this->input->post('draw');
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$search = $this->input->post('search')['value'] ?? '';

			// Order
			$order = [];

			if ($this->input->post('order')) {
				$order = [
					'column' => $this->input->post('order')[0]['column'],
					'dir' => $this->input->post('order')[0]['dir']
				];
			}

			// Filters
			$keyword = $this->input->post('keyword');
			$status = $this->input->post('status');
			$is_verified = $this->input->post('is_verified');

			// Get data
			$websites = $this->Website_model->get_datatables($start, $length, $search, $order, $keyword, $status, $is_verified);
			$total = $this->Website_model->count_all();
			$filtered = $this->Website_model->count_filtered($search, $keyword, $status, $is_verified);

			// Format data
			$data = [];
			foreach ($websites as $web) {
				$row = [
					'website_id' => $web->website_id,
					'website_name' => htmlspecialchars($web->website_name),
					'domain' => htmlspecialchars($web->domain),
					'keywords' => htmlspecialchars($web->keywords),
					'publisher' => htmlspecialchars($web->publisher),
					'status' => $web->status,
					'is_verified' => $web->is_verified
				];
				$data[] = $row;
			}

			$response = [
				'draw' => intval($draw),
				'recordsTotal' => intval($total),
				'recordsFiltered' => intval($filtered),
				'data' => $data
			];

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));

		} catch (Exception $e) {
			log_message('error', 'DataTables Error: ' . $e->getMessage());

			$response = [
				'draw' => intval($draw ?? 1),
				'recordsTotal' => 0,
				'recordsFiltered' => 0,
				'data' => [],
				'error' => $e->getMessage()
			];

			$this->output
				->set_status_header(500)
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
	}

}
