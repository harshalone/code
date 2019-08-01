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
    // all blog functions ======================
    public function add_list($data) {

        return $this->db->insert('newsletter_list', $data);
    }
    
    
    /* 
    public function get_all_articles($limit =10, $page = 0) { 
    	$offset = $page * $limit;
        $this->db->from('articles'); 
        $this->db->order_by("articleid", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    } 
    
    public function get_new_applications($limit =10, $page = 0) { 
    	$offset = $page * $limit;
        $this->db->from('articles'); 
        $this->db->where('status',1);
        $this->db->where('publish',0);
        $this->db->order_by("articleid", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    
    public function get_published_articles($limit =10, $page = 0) { 
    	$offset = $page * $limit;
        $this->db->from('articles'); 
        $this->db->where('status',1);
        $this->db->where('publish',1);
        $this->db->order_by("articleid", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    } 
    
    
    //get article details from article id
    public function get_article($postid) {  
		$this->db->where('articleid',$postid);   
		$query = $this->db->get('articles');
		$row   = $query->row();
		return $row;
    }
    //get article details from article uid
    public function get_article_from_uid($postid) {  
		$this->db->where('articleuid',$postid);   
		$query = $this->db->get('earticles');
		$row   = $query->row();
		return $row;
    }
    
    public function update($data, $articleid){
    	
    	$this->db->where('articleid', $articleid);  
	    $update   = $this->db->update('articles', $data); 
        return true;
    }
    
    public function get_articles($userid, $limit =10, $page = 0) { 
    	$offset = $page * $limit;
        $this->db->from('articles'); 
        $this->db->where('user_id', $userid);
        $this->db->order_by("articleid", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    */

} 
