<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website_model extends CI_Model
{
	private $table = 'websites';

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function get_all()
	{
		$this->db->select('websites.*, users.name as publisher, users.role');
		$this->db->from($this->table);
		$this->db->join('users', 'users.user_id = websites.user_id', 'left');
		return $this->db->get()->result();
	}

	public function get_by_id($id)
	{
		return $this->db->get_where($this->table, ['website_id' => $id])->row();
	}

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		return $this->db->update($this->table, $data, ['website_id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete($this->table, ['website_id' => $id]);
	}

	public function count_all() {
        return $this->db->count_all($this->table);
    }
    
    public function count_filtered($search, $keyword = null, $status = null, $is_verified = null) {
        $this->_get_datatables_query($search, $keyword, $status, $is_verified);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function get_datatables($start, $length, $search, $order, $keyword = null, $status = null, $is_verified = null)
    {
        $this->_get_datatables_query($search, $keyword, $status, $is_verified);

        if ($length != -1) {
            $this->db->limit($length, $start);
        }

        // Sorting
        $column_order = array('websites.website_id', 'websites.website_name', 'websites.domain', 'websites.keywords', 'users.name', 'websites.status', 'websites.is_verified');
        if (isset($order['column']) && isset($column_order[$order['column']])) {
            $this->db->order_by($column_order[$order['column']], $order['dir']);
        } else {
            $this->db->order_by('websites.website_id', 'desc');
        }

        return $this->db->get()->result();
    }
    
    private function _get_datatables_query($search, $keyword = null, $status = null, $is_verified = null) {
        $this->db->select('websites.*, users.name as publisher');
        $this->db->from($this->table);
        $this->db->join('users', 'users.user_id = websites.user_id', 'left');
        
        // Search
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('websites.website_name', $search);
            $this->db->or_like('websites.domain', $search);
            $this->db->or_like('websites.keywords', $search);
            $this->db->or_like('users.name', $search);
            $this->db->group_end();
        }
        
        // Filter keyword
        if (!empty($keyword)) {
            $this->db->like('websites.keywords', $keyword);
        }
        
        // Filter status
        if (!empty($status)) {
            $this->db->where('websites.status', $status);
        }
        
        // Filter verification
        if ($is_verified !== null && $is_verified !== '') {
            $this->db->where('websites.is_verified', $is_verified);
        }
    }
}
