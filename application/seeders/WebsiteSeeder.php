<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebsiteSeeder {
    
    private $ci;
    private $company_names = [
        'Tech Solutions', 'Digital Innovation', 'Web Masters', 'Code Factory', 
        'Data Systems', 'Cloud Services', 'Smart Tech', 'Digital Hub',
        'Tech Zone', 'Web Solutions', 'Data Hub', 'Innovation Labs'
    ];
    
    private $domains = [
        'example.com', 'website.com', 'webhost.com', 'domain.com',
        'hosting.com', 'techsite.com', 'webtech.com', 'siteweb.com'
    ];
    
    private $keywords_list = [
        'technology', 'web development', 'hosting', 'cloud', 'software',
        'digital', 'innovation', 'solutions', 'IT services', 'web design',
        'programming', 'tech', 'computer', 'internet', 'online'
    ];
    
    public function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->database();
    }
    
    private function random_date($start_date, $end_date) {
        $timestamp = mt_rand(strtotime($start_date), strtotime($end_date));
        return date('Y-m-d H:i:s', $timestamp);
    }
    
    private function random_element($array) {
        return $array[array_rand($array)];
    }
    
    public function run($count = 1000) {
        // Get existing user IDs
        $this->ci->db->select('user_id');
        $users = $this->ci->db->get('users')->result();
        $user_ids = array_map(function($user) {
            return $user->user_id;
        }, $users);
        
        if(empty($user_ids)) {
            die("No users found in database!");
        }
        
        // Prepare batch insert data
        $websites = [];
        $statuses = ['pending', 'active', 'inactive'];
        $batch_size = 100;
        
        for ($i = 0; $i < $count; $i++) {
            // Generate 3-5 random keywords
            $keywords = array_rand($this->keywords_list, rand(3, 5));
            $selected_keywords = array_map(function($key) {
                return $this->keywords_list[$key];
            }, $keywords);
            
            $company = $this->random_element($this->company_names);
            $domain = strtolower(str_replace(' ', '', $company)) . '.' . 
                     $this->random_element($this->domains);
            
            $websites[] = [
                'user_id' => $this->random_element($user_ids),
                'website_name' => $company,
                'domain' => $domain,
                'keywords' => implode(',', $selected_keywords),
                'description' => 'This is a sample website description for ' . $company,
                'status' => $this->random_element($statuses),
                'is_verified' => rand(0, 1),
                'created_at' => $this->random_date('2023-01-01', '2024-02-20'),
                'updated_at' => $this->random_date('2024-01-01', '2024-02-20')
            ];
            
            // Insert in batches
            if (($i + 1) % $batch_size === 0) {
                $this->ci->db->insert_batch('websites', $websites);
                $websites = [];
                echo "Inserted " . ($i + 1) . " records\n";
            }
        }
        
        // Insert remaining records
        if (!empty($websites)) {
            $this->ci->db->insert_batch('websites', $websites);
            echo "Inserted remaining records\n";
        }
        
        echo "Seeding completed! Total records: $count\n";
    }
} 
