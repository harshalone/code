<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * User_model class.
 * 
 * @extends CI_Model
 */
class Newsletter_model extends CI_Model {

    
    public function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper('string');
    }  
	
    // all newsletter model functions ======================

	
    public function add_list($data) {

        return $this->db->insert('newsletter_list', $data);
    }
	
	public function update_list($data, $list_id) {

        $this->db->where('list_id', $list_id);  
	    $update   = $this->db->update('newsletter_list', $data); 
        return true;
    }
	
	public function delete_list($list_id) {

        $this->db->where('list_id', $list_id);   
		$this->db->delete('newsletter_list');
        return true;
    }
	
	public function get_list($limit =10, $page = 0) { 
    	$offset = $page * $limit;
        $this->db->from('newsletter_list'); 
        $this->db->order_by("listid", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    
    public function add_newsletter_campaign($data) {

        return $this->db->insert('newsletter_campaign', $data);
    }
	
    public function update_newsletter_campaign($data, $campaign_id){
    	
    	$this->db->where('campaignid', $campaign_id);  
	    $update   = $this->db->update('newsletter_campaign', $data); 
        return true;
    }
	
	public function delete_newsletter_campaign($campaign_id) {

        $this->db->where('campaignid', $campaign_id);   
		$this->db->delete('newsletter_campaign');
        return true;
    }
	
	public function get_newsletter_campaign($limit =10, $page = 0) { 
    	$offset = $page * $limit;
        $this->db->from('newsletter_campaign'); 
        $this->db->order_by("campaignid", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
	
	public function user_to_list($userid, $list_id, $status) {
		$data = array(
				'user_id' => $userid,
				'list_id' => $list_id,
				'status'  => $status,
				'subscribe_date_time' => $date_time,
				'unsubscribe_date_time' => $date_time
		); 
        return $this->db->insert('list_user', $data);
    }
	
	public function get_user_of_list($limit =20, $page = 0) { 
    	$offset = $page * $limit;
        $this->db->from('list_user'); 
		$this->db->join('users', 'userd.id = list_user.user_id');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
	 
} 
