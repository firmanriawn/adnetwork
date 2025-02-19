<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seeder extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Hanya bisa diakses di environment development
		if (ENVIRONMENT !== 'development') {
			show_error('Seeder hanya bisa dijalankan di environment development');
		}
	}

	public function truncate_websites()
	{
		$this->load->database();
		
		// Nonaktifkan foreign key checks sementara
		$this->db->query('SET FOREIGN_KEY_CHECKS = 0');
		
		// Truncate table websites
		$this->db->truncate('websites');
		
		// Aktifkan kembali foreign key checks
		$this->db->query('SET FOREIGN_KEY_CHECKS = 1');
		
		echo "All website data has been deleted successfully!";
	}

	public function clean_websites() {
		$this->load->database();
		
		// Hapus data dengan batasan waktu tertentu
		// $this->db->where('created_at >', '2024-01-01');  // Hapus data setelah tanggal tertentu
		// $this->db->delete('websites');
		
		// Atau hapus berdasarkan batch tertentu
		$this->db->where('website_id >', 1000);
		$this->db->delete('websites');
		
		echo "Website data has been cleaned successfully!";
	}

	public function websites($count = 1000)
	{
		$this->load->library('../seeders/WebsiteSeeder');

		$start = microtime(true);

		$this->websiteseeder->run($count);

		$time = microtime(true) - $start;
		echo "Execution time: " . round($time, 2) . " seconds\n";
	}
}
