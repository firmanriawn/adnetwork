<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keyword_model extends CI_Model
{
    private $table = 'keywords';

    /**
     * Constructor for Keyword_model
     * 
     * Initializes the model and loads the database connection.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Retrieves all keywords from the database
     * 
     * This function selects all keywords from the keywords table
     * and orders them by the creation date in descending order.
     * 
     * @return array Returns an array of keyword objects
     */
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Retrieves and processes data for the keywords table
     * 
     * This function handles the data processing and retrieval for the keywords table
     * and returns it in a JSON format for DataTables.
     */
    public function get_datatables($start, $length, $search, $order)
    {
        $this->_get_datatables_query($search);

        if($length != -1) {
            $this->db->limit($length, $start);
        }

        // Sorting
        $column_order = ['keyword_id', 'keyword_name', 'created_at', 'updated_at'];
        if (isset($order['column']) && isset($column_order[$order['column']])) {
            $this->db->order_by($column_order[$order['column']], $order['dir']);
        } else {
            $this->db->order_by('created_at', 'DESC');
        }

        return $this->db->get()->result();
    }

    /**
     * Retrieves and processes data for the keywords table
     * 
     * This function handles the data processing and retrieval for the keywords table
     * and returns it in a JSON format for DataTables.
     */
    private function _get_datatables_query($search)
    {
        $this->db->from($this->table);

        if(!empty($search)) {
            $this->db->group_start();
            $this->db->like('keyword_name', $search);
            $this->db->group_end();
        }
    }

    /**
     * Counts the number of filtered keywords based on the search criteria
     * 
     * This function uses the _get_datatables_query method to filter the keywords
     * and then counts the number of results.
     * 
     * @param string $search The search criteria
     * @return int Returns the number of filtered keywords
     */
    public function count_filtered($search)
    {
        $this->_get_datatables_query($search);
        return $this->db->count_all_results();
    }

    /**
     * Counts all keywords in the database
     * 
     * This function counts all keywords from the keywords table.
     * 
     * @return int Returns the total number of keywords
     */
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    /**
     * Retrieves a keyword by its ID
     * 
     * This function retrieves a keyword from the keywords table
     * based on the provided ID.
	 * 
	 * @param int $id The ID of the keyword to retrieve
	 * @return object Returns a keyword object
     */
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['keyword_id' => $id])->row();
    }

    /**
     * Creates a new keyword
     * 
     * This function inserts a new keyword into the keywords table
     * and sets the creation date.
     * 
     * @param array $data The keyword data
     * @return bool Returns true if the keyword was created successfully, false otherwise
     */
    public function create($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('keywords', $data);
    }

    /**
     * Updates an existing keyword
     * 
     * This function updates an existing keyword in the keywords table
     * and sets the update date.
     * 
     * @param int $id The ID of the keyword to update
     * @param array $data The keyword data
     * @return bool Returns true if the keyword was updated successfully, false otherwise
     */
    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('keyword_id', $id);
        return $this->db->update('keywords', $data);
    }

    /**
     * Deletes a keyword by its ID
     * 
     * This function deletes a keyword from the keywords table
     * based on the provided ID.
     * 
	 * @param int $id The ID of the keyword to delete
	 * @return bool Returns true if the keyword was deleted successfully, false otherwise
     */
    public function delete($id)
    {
        return $this->db->delete($this->table, ['keyword_id' => $id]);
    }
} 
