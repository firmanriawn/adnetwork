<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Keyword_model $Keyword_model
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_DB_mysqli_driver $db
 */

class Keywords extends CI_Controller
{
    /**
     * Constructor for Keywords controller
     * 
     * Initializes the controller and loads required dependencies:
     * - Loads the Keyword_model for database operations
     * - Checks user authentication (if needed)
     * - Sets up any required configurations
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keyword_model');
    }

    /**
     * Displays the keywords management page
     * 
     * This function loads the keywords management page view
     * and passes the necessary data to it.
     */
    public function index()
    {
        $data = [
            'title' => 'Keywords',
            'content' => 'admin/content/keywords/index'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    /**
     * Retrieves and processes data for the keywords table
     * 
     * This function handles the data processing and retrieval for the keywords table
     * and returns it in a JSON format for DataTables.
     */
    public function get_data()
    {
        try {
            $draw = intval($this->input->post('draw'));
            $start = intval($this->input->post('start'));
            $length = intval($this->input->post('length'));
            $search = $this->input->post('search')['value'] ?? '';
            $order = $this->input->post('order')[0] ?? ['column' => 0, 'dir' => 'desc'];

            // Debug log
            log_message('debug', 'DataTables request parameters: ' . print_r([
                'draw' => $draw,
                'start' => $start,
                'length' => $length,
                'search' => $search,
                'order' => $order
            ], true));

            $keywords = $this->Keyword_model->get_datatables($start, $length, $search, $order);
            $total = $this->Keyword_model->count_all();
            $filtered = $this->Keyword_model->count_filtered($search);

            // Debug log
            log_message('debug', 'DataTables response data: ' . print_r([
                'total' => $total,
                'filtered' => $filtered,
                'keywords' => $keywords
            ], true));

            $data = [];
            foreach ($keywords as $keyword) {
                $data[] = [
                    'keyword_id' => $keyword->keyword_id,
                    'keyword_name' => $keyword->keyword_name,
                    'created_at' => date('d M Y H:i', strtotime($keyword->created_at)),
                    'updated_at' => $keyword->updated_at ? date('d M Y H:i', strtotime($keyword->updated_at)) : '-'
                ];
            }

            $response = [
                'draw' => $draw,
                'recordsTotal' => intval($total),
                'recordsFiltered' => intval($filtered),
                'data' => $data
            ];

            echo json_encode($response);

        } catch (Exception $e) {
            log_message('error', 'Keywords get_data error: ' . $e->getMessage());
            $response = [
                'draw' => $draw ?? 0,
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => $e->getMessage()
            ];
            echo json_encode($response);
        }
    }

    /**
     * Displays the form for adding a new keyword
     * 
     * This function handles the form submission for adding a new keyword
     * and returns a JSON response indicating success or failure.
     */
    public function create()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('keyword_name', 'Keyword Name', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $response = [
                    'success' => false,
                    'errors' => $this->form_validation->error_array()
                ];
            } else {
                $data = [
                    'keyword_name' => $this->input->post('keyword_name')
                ];

                // Debug log
                log_message('debug', 'Attempting to create keyword: ' . print_r($data, true));
                
                $result = $this->Keyword_model->create($data);
                
                // Debug log
                log_message('debug', 'Create result: ' . ($result ? 'success' : 'failed'));
                
                if ($result) {
                    $response = [
                        'success' => true,
                        'message' => 'Keyword successfully added'
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Failed to add keyword: ' . $this->db->error()['message']
                    ];
                }
            }

            echo json_encode($response);
        } else {
            $data = [
                'title' => 'Add New Keyword',
                'content' => 'admin/content/keywords/create'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        }
    }

    /**
     * Edit Keyword
     * 
     * This function handles both the display of the edit form and
     * the form submission for updating an existing keyword.
     * For form submissions via AJAX, it returns a JSON response
     * indicating success or failure.
     * 
     * @param int $id The ID of the keyword to edit
     * @return mixed Returns JSON response for AJAX requests, loads view otherwise
     */

    public function edit($id)
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('keyword_name', 'Keyword Name', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $response = [
                    'success' => false,
                    'errors' => $this->form_validation->error_array()
                ];
            } else {
                $data = [
                    'keyword_name' => $this->input->post('keyword_name')
                ];

                if ($this->Keyword_model->update($id, $data)) {
                    $response = [
                        'success' => true,
                        'message' => 'Keyword successfully updated'
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Failed to update keyword'
                    ];
                }
            }

            echo json_encode($response);
        } else {
            $keyword = $this->Keyword_model->get_by_id($id);
            if (!$keyword) show_404();

            $data = [
                'title' => 'Edit Keyword',
                'content' => 'admin/content/keywords/edit',
                'keyword' => $keyword
            ];
            $this->load->view('admin/layout/wrapper', $data);
        }
    }

    /**
     * Handles the deletion of a keyword.
     * For form submissions via AJAX, it returns a JSON response
     * indicating success or failure.
     * For non-AJAX requests, it shows a 404 error.
     * 
     * @param int $id The ID of the keyword to delete
     * @return mixed Returns JSON response for AJAX requests, shows 404 otherwise
     */
    public function delete($id)
    {
        if ($this->input->is_ajax_request()) {
            if ($this->Keyword_model->delete($id)) {
                $response = [
                    'success' => true,
                    'message' => 'Keyword successfully deleted'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Failed to delete keyword'
                ];
            }
            echo json_encode($response);
        } else {
            show_404();
        }
    }
} 
